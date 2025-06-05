<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TopicTask;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($topic_id)
    {
        $tasks_tmp = TopicTask::where('id_topic', $topic_id)->pluck('id_task');
        $tasks = Task::whereIn('task_id', $tasks_tmp)->get();
        $topic = Topic::where("topic_id", $topic_id)->first();

        
        if (Auth::guard("student")->check())
        {
            
        }

        return view('my_verstka.tasks', ['tasks' => $tasks, 'topic_id' => $topic_id, 'topic' => $topic]);
    }

    public function indexBank($page=null)
    {
        // $task = Task::all();
        if ($page)
            return view('my_verstka.home_tasks_bank', ['page' => $page]);
        else
            return view('my_verstka.home_tasks_bank');
    }

    public function indexEntranceTasks($page=null)
    {
        
        $topic = Topic::where('type', 'Входная диагностика')->first();
        $tasks_tmp = TopicTask::where('id_topic', $topic->topic_id)->pluck('id_task');
        $tasks = Task::whereIn('task_id', $tasks_tmp)->get();

        return view('my_verstka.tasks_entrance', ['tasks' => $tasks, 'topic_id' => $topic->topic_id, 'topic' => $topic]);
        
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
            'title' => 'required',
            'content' => 'required',
        ]);

        Task::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show(Task $task)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit(Task $task)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $task->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('posts.index');
    }
}
