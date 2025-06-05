<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\teacherClass;
use App\Models\ClassGroup;
use App\Models\StudentClass;
use App\Models\ClassHomework;
use App\Models\Homework;
use App\Models\HomeworkTask;
use App\Models\Result;
use App\Models\Task;
use App\Models\Student;

class TeacherClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page="classes")
    {
        $teacher = Auth::guard('teacher')->user();

        if ($teacher) 
        {
            $classes_tmp = teacherClass::where('id_teacher', $teacher->id)->get();
            
            $classes_id = [];
            foreach ($classes_tmp as $teacherClass) {                
                $classes_id[] = $teacherClass->teacher_class_id;
            }

            $classes = ClassGroup::whereIn('class_id', $classes_id)->get();

            // Добавим количество учеников для каждого класса
            foreach ($classes as $class) {
                $studentCount = StudentClass::where('class_id', $class->class_id)
                                ->count();

                // Добавим новое свойство к модели
                $class->student_count = $studentCount;
            }

            $data = [
                'classes' => $classes,
                'page' => $page ?? 'classes'
            ];

            return view('my_verstka.home_classes', $data);
        }
        else
        {
            return view('my_verstka.home_classes');
        }
    
    }

    // Отображение формы создания поста
    public function create()
    {
        return view('my_verstka.forms.add_class');
    }
    public function showHomework($homework_id, $student_id, $class_id)
    {   
        $homework = Homework::where('homework_id', $homework_id)->first();

        $display_name = StudentClass::where("student_id", $student_id)->where("class_id", $class_id)->first()->display_name; 

        // получить список задач из домашки
        $tasks = HomeworkTask::where("id_homework", $homework_id)->get();        
        $tasks_id = $tasks->pluck("id_task");

        //получим сами записи задач
        // Преобразуем в массив для использования в запросе
        $tasks_id_array = $tasks_id->toArray();

        $tasksFromDb = Task::whereIn('task_id', $tasks_id_array)
            ->orderByRaw('FIELD(task_id, ' . implode(',', $tasks_id_array) . ')')
            ->get();
        
        // посмотреть результаты задач из Result
        // Получаем результаты по условию: id_task в списке и id_student = $student_id
        $results = Result::whereIn('id_task', $tasks_id)
            ->where('id_student', $student_id)
            ->get()
            ->keyBy('id_task');

        // Формируем коллекцию, где для каждого id_task либо запись, либо null
        $finalResults = $tasks_id->map(function($taskId) use ($results) {
            return $results->get($taskId, null);
        });

        
        $data = [];
        for ($i = 0; $i < $tasks->count(); $i++)
        {
            array_push($data, [
                'task' => $tasksFromDb[$i],
                'result' => $finalResults[$i],
            ]);
        }
              
        

        return view('my_verstka.showHomework', ['data' => $data, 'homework' => $homework, 'student_name' => $display_name]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        if (!$teacher)
            return redirect()->route("login");

        $request->validate([
            'name' => 'required'
        ]);

        $class = ClassGroup::create([
            'name' => $request->name
        ]);

        teacherClass::create([
            'id_teacher' => $teacher->id,
            'id_class' => $class->class_id
        ]);            
        


        return redirect()->route('teacher');        
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function showStudents($id, $page="classes")
    {
        // Получаем название класса
        $class = ClassGroup::find($id);

        // Получаем учеников класса
        $students = StudentClass::
            join('students', 'student_class.student_id', '=', 'students.id')
            ->where('student_class.class_id', $id)
            ->select('students.id', 'students.name', 'students.email', 'student_class.display_name')
            ->get();
        $homeworks = ClassHomework::where('id_class', $id)->get();

        return view('my_verstka.class_student', [
            'students' => $students,
            'class' => $class,
            'homeworks' => $homeworks,
            'page' => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit($id)
    {
        $class = ClassGroup::where('class_id', $id)->first();

        return view('my_verstka.forms.edit_class', ['class' => $class]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $class = ClassGroup::where('class_id', $request->id)->first();
        
        $class->update([
            'name' => $request->name,
        ]);

        return redirect()->route('teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy($id)
    {
        teacherClass::where("id_class", $id)->delete();

        $class = ClassGroup::where('class_id', $id)->first();
        $class->delete();        

        return redirect()->route('teacher');
    }
}
