<?php

namespace App\Http\Controllers\Pages\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\topic;
use App\Models\task;
use App\Models\TopicTask;
use App\Models\Result;

class TrajectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page="trajectory")
    {
        if (Auth::guard('teacher')->check())
            return redirect()->back();
        
        if (!Auth::guard('student')->check())        
            return redirect()->route("entrance_test");
        

        // узнаем ученик уже прошел входную диагностику или нет
        $entrance_topic = Topic::where("type", "Входная диагностика")->first();
        $task_from_entrance = TopicTask::where("id_topic", $entrance_topic->topic_id)->first();
        $result = Result::where("id_student", Auth::guard('student')->user()->id)
                            ->where("id_task", $task_from_entrance->id_task)->first();        

        if(!$result)
            return redirect()->route("entrance_test");


        return view('my_verstka.home_trajectory', ['page' => $page]);
        
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

        // Result::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    // public function show(Result $result)
    // {
    //     return view('posts.show', compact('post'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    // public function edit(Result $result)
    // {
    //     return view('posts.edit', compact('post'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    // public function update(Request $request, Result $result)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     $result->update($request->all());
    //     return redirect()->route('posts.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // // Удаление поста
    // public function destroy(Result $result)
    // {
    //     $result->delete();
    //     return redirect()->route('posts.index');
    // }
}
