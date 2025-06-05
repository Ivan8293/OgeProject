<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AnswerController extends Controller
{
    public function check(Request $request)
    {
        $taskId = $request->input('task_id');
        \Log::info("Начало проверки задания, task_id = {$taskId}");

        if (!$taskId) {
            \Log::warning('Нет ID задания в запросе');
            return back()->with('evaluation_result', ['error' => 'Нет ID задания']);
        }

        $task = task::find($taskId);
        if (!$task) {
            \Log::warning("Задание с ID {$taskId} не найдено");
            return back()->with('evaluation_result', ['error' => 'Задание не найдено', 'task_id' => $taskId]);
        }

        if ($request->hasFile('answer_image')) {
            $uploadedFile = $request->file('answer_image');

            \Log::info("Файл получен: " . $uploadedFile->getClientOriginalName());

            if (!$uploadedFile->isValid()) {
                \Log::warning("Ошибка загрузки файла для задания {$taskId}");
                return back()->with('evaluation_result', ['error' => 'Ошибка загрузки файла', 'task_id' => $taskId]);
            }

            // Путь к изображению задания
            $taskImagePath = public_path($task->text);
            if (!file_exists($taskImagePath)) {
                \Log::warning("Изображение задания не найдено по пути {$taskImagePath}");
                return back()->with('evaluation_result', ['error' => 'Изображение задания не найдено', 'task_id' => $taskId]);
            }

            // Создаём директорию storage/app/image, если нет
            $destinationPath = storage_path('app/image/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
                \Log::info("Создана папка для изображений: {$destinationPath}");
            }

            // Сохраняем загруженный файл туда с уникальным именем
            $filename = uniqid('solution_') . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move($destinationPath, $filename);
            $solutionPathForPython = $destinationPath . $filename;

            \Log::info("Файл решения сохранён в: {$solutionPathForPython}");

            if (!file_exists($solutionPathForPython)) {
                \Log::error("Файл решения не найден по пути: {$solutionPathForPython}");
                return back()->with('evaluation_result', ['error' => 'Файл решения не найден', 'task_id' => $taskId]);
            }

            $pythonScript = base_path('scripts/ocr_and_evaluate.py');
            $pythonExecutable = base_path('python_env/Scripts/python.exe');

            \Log::info("Запуск Python-скрипта: {$pythonExecutable} {$pythonScript} {$solutionPathForPython} {$taskImagePath}");

            $process = new Process([
                $pythonExecutable,
                $pythonScript,
                $solutionPathForPython,
                $taskImagePath
            ]);
            try {
                $process->run();

                if (!$process->isSuccessful()) {
                    \Log::error("Python-скрипт завершился с ошибкой: " . $process->getErrorOutput());
                    throw new ProcessFailedException($process);
                }

                $output = $process->getOutput();
                \Log::info("Вывод Python-скрипта: " . $output);

                $cleanOutput = trim($output);
                $result = json_decode($cleanOutput, true);

                if ($result === null) {
                    \Log::error("Ошибка JSON: " . json_last_error_msg());
                    return back()->with('evaluation_result', [
                        'error' => 'Некорректный JSON: ' . json_last_error_msg(),
                        'raw_output' => $cleanOutput,
                        'task_id' => $taskId
                    ]);
                }

                $result['task_id'] = $taskId;
                \Log::info("Результат проверки: " . json_encode($result));
                return back()->with('evaluation_result', $result);

            } catch (\Exception $e) {
                \Log::error("Ошибка при выполнении Python-скрипта: " . $e->getMessage());
                return back()->with('evaluation_result', [
                    'error' => 'Ошибка при обработке: ' . $e->getMessage(),
                    'task_id' => $taskId
                ]);
            } finally {
                // Удаляем временный файл решения
                if (file_exists($solutionPathForPython)) {
                    try {
                        unlink($solutionPathForPython);
                        \Log::info("Временный файл решения удалён: {$solutionPathForPython}");
                    } catch (\Exception $e) {
                        \Log::warning("Не удалось удалить временный файл: {$solutionPathForPython} — " . $e->getMessage());
                    }
                }
            }
        }

        // Проверка текстового ответа, если файл не загружен
        $studentAnswer = $request->input('student_answer_' . $taskId);
        \Log::info("Проверка текстового ответа для задания {$taskId}: {$studentAnswer}");

        if ($studentAnswer !== null) {
            $correctAnswer = $task->answer;

            $isCorrect = trim(mb_strtolower($studentAnswer)) === trim(mb_strtolower($correctAnswer));
            $score = $isCorrect ? 1 : 0;
            $comment = $isCorrect ? 'Ответ правильный' : 'Ответ неверный';

            \Log::info("Результат проверки текстового ответа: score={$score}, comment={$comment}");

            return back()->with('evaluation_result', [
                'score' => $score,
                'comment' => $comment,
                'task_id' => $taskId
            ]);
        }

        \Log::warning("Нет данных для проверки (ни файла, ни текстового ответа) для задания {$taskId}");

        return back()->with('evaluation_result', ['error' => 'Нет ответа для проверки', 'task_id' => $taskId]);
    }
}
