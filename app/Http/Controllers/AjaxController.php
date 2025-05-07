<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function AnswerCheck(Request $request)
    {        
        
        $result = false;

        // получили данные из формы
        $student_id = $request->student_id;
        $task_id = $request->task_id;
        $student_answer = trim($request->answer);        

        // получим правильный ответ из базы данных
        $answer = task::select('answer')->where('task_id', $task_id)->first();

        if ($student_answer == $answer->answer)
        {
            $result = true; 
        }

        

        // записываем результаты в бд
        try
        {
            Result::create([
                'id_student' => $student_id,
                'id_task' => $task_id,
                'solve_date' => now()->toDateString(),
                'mark' => 1,
                'result' => $result
            ]);
        }
        catch(\Exception $e)
        {
            $result = $e->getMessage();
        }
        
        


        return response()->json(['result' => $result, 'task_id' => $task_id]);
    }
}
