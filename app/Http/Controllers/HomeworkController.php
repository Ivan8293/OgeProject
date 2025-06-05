<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\topic;
use App\Models\task;
use App\Models\TaskOge;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($class_id=null, $page="homeworks")
    {
        $teacherId = Auth::guard('teacher')->id();
        
        $homeworks = Homework::where("id_teacher", $teacherId)->get();
        return view('my_verstka.home_homeworks', [
            'page' => $page, 
            'teacher_id' =>$teacherId, 
            "class_id" => $class_id, 
            "homeworks" => $homeworks
        ]);   
    }

    // Отображение формы создания поста
    public function create_homework()
    {
        $topics = Topic::with('taskOge')->where('type', 'Учебная тема')->get();
        return view("my_verstka.home_topics", ['is_homework' => true, 'topics' => $topics]);
    }

    public function choose_homework_taks($topic_id)
    {
        // только выбрали тему, начнем составление дз в сессии
        // сначала удалим страные данные
        Session::forget("homework");
        $homework = [
            "topic_id" => $topic_id,
            "tasks_id" => []
        ];
        Session::put("homework", $homework);

        // затем вызываем следующий шаблон
        $tasksOge = TaskOge::all();
        return view("my_verstka.home_tasks_bank", ["page" => "tasks_bank", "tasksOge" => $tasksOge, 'is_homework' => true]);
    }

    public function back_to_tasks_bank(Request $request)
    {
        $selected_tasks = $request->input('selected_tasks', []);

        $homework = Session::get("homework");
        foreach ($selected_tasks as $selected_task)
        {
            if (!in_array($selected_task, $homework["tasks_id"]))
            {
                array_push($homework["tasks_id"], $selected_task);
            }
        }        
        Session::put("homework", $homework);

        $tasksOge = TaskOge::all();   
        return view("my_verstka.home_tasks_bank", ["page" => "tasks_bank", "tasksOge" => $tasksOge, 'is_homework' => true]);
    }

    public function set_homework_params()
    {
        $topic_id = Session::get("homework")["topic_id"];
        $tasks_id = Session::get("homework")["tasks_id"];        

        $tasks = Task::whereIn('task_id', $tasks_id)->get();
        $topic = Topic::where("topic_id", $topic_id)->first();


        return view("my_verstka.homework_params", ["topic" => $topic, "tasks" => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Homework::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show(Homework $homework)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit(Homework $homework)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request, Homework $homework)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $homework->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy(Homework $homework)
    {
        $homework->delete();
        return redirect()->route('posts.index');
    }
}
