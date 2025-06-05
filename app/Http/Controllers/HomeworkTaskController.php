<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeworkTask;
use App\Models\task;
use App\Models\topic;
use App\Models\Homework;


class HomeworkTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($homework_id)
    {
        $tasks_tmp = HomeworkTask::where('id_homework', $homework_id)->pluck('id_task');
        $tasks = Task::whereIn('task_id', $tasks_tmp)->get();
        $homework = Homework::where("homework_id", $homework_id)->first();

    

        return view('my_verstka.tasks', ['tasks' => $tasks, 'homework_id' => $homework_id, 'homework' => $homework, 'is_homework' => true]);
    }

    // Отображение формы создания поста
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'level' => 'required',
        ]);

        $topic_id = Session::get("homework")["topic_id"];
        $tasks_id = Session::get("homework")["tasks_id"];

        $name = $request->name;
        $description = $request->description;
        $level = $request->level;

        $homework = Homework::create([
            'id_teacher' => Auth::guard("teacher")->user()->id,  
            'id_topic' => $topic_id,
            'name' => $name,
            'description' => $description,
            'level' => $level,
        ]);

        foreach($tasks_id as $task_id)
        {
            HomeworkTask::create([
                'id_homework' => $homework->homework_id, 
                'id_task' => $task_id,
                'mark' => 1,
                'number' => 1,
            ]);
        }
        

        //Домашку сделали, очищаем сессию
        Session::forget("homework");
        
        return redirect()->route('homeworks');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show(HomeworkTask $homeworkTask)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit(HomeworkTask $homeworkTask)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request, HomeworkTask $homeworkTask)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $homeworkTask->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy(HomeworkTask $homeworkTask)
    {
        $homeworkTask->delete();
        return redirect()->route('posts.index');
    }
}
