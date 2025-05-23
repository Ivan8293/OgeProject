<?php

namespace App\Http\Controllers\Pages\Common;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TopicController;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\TaskOge;


class TopicsController extends Controller
{
// этот файл под сомнением




    /**
     * Display a listing of the resource.
     */
    public function index($page=null)
    {
        $topics = Topic::with('taskOge')->where('type', 'Учебная тема')->get();

        if ($page && $topics)
        {
            return view('my_verstka.home_topics', ['page' => $page, 'topics' => $topics]);
        }
        else if ($topics && !$page)
        {
            return view('my_verstka.home_topics', ['topics' => $topics]);
        }
        else
        {
            return view('my_verstka.home_topics');
        }
    }

    


    // Отображение формы создания поста
    public function create()
    {
        return view('posts.create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     Task::create($request->all());
    //     return redirect()->route('posts.index');
    // }
    // /**
    //  * Display the specified resource.
    //  */
    // // Отображение конкретного поста
    // public function show(Task $task)
    // {
    //     return view('posts.show', compact('post'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // // Отображение формы редактирования поста
    // public function edit(Task $task)
    // {
    //     return view('posts.edit', compact('post'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // // Обновление поста
    // public function update(Request $request, Task $task)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     $task->update($request->all());
    //     return redirect()->route('posts.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // // Удаление поста
    // public function destroy(Task $task)
    // {
    //     $task->delete();
    //     return redirect()->route('posts.index');
    // }
}
