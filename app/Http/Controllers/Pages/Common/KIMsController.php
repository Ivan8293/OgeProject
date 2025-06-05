<?php

namespace App\Http\Controllers\Pages\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\TopicTask;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class KIMsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page="KIMs")
    {
        if (!Auth::guard('student')->check() && !Auth::guard('teacher')->check())
        {
            return redirect()->route("need_registration");
        } 


        $KIMs = Topic::where('type', 'КИМ')->get();

        if ($page && $KIMs)
        {
            return view('my_verstka.home_KIMs', ['page' => $page, 'KIMs' => $KIMs]);
        }
        else if ($KIMs && !$page)
        {
            return view('my_verstka.home_KIMs', ['KIMs' => $KIMs]);
        }
        else
        {
            return view('my_verstka.home_KIMs');
        }
    }

    // Отображение формы создания поста
    public function create($topic_id=null, $page="KIMs")
    {
        if ($topic_id)
        {
            $task_id_arr = TopicTask::where("id_topic", $topic_id)->pluck("id_task");
            $tasks = Task::whereIn("task_id", $task_id_arr)->get();
            $kims = Topic::where("topic_id", $topic_id)->first();

            //отсортируем данные
            //$tasks = $tasks->sortBy('task_oge_id')->values();
            $tasks = $tasks->sort(function ($a, $b) {
                // Если $a->task_oge_id null, то $a идет раньше
                if (is_null($a->task_oge_id) && !is_null($b->task_oge_id)) {
                    return -1;
                }
                // Если $b->task_oge_id null, то $b идет раньше
                if (!is_null($a->task_oge_id) && is_null($b->task_oge_id)) {
                    return 1;
                }
                // Если оба null или оба не null - сортируем по возрастанию
                return $a->task_oge_id <=> $b->task_oge_id;
            })->values();


            return view('my_verstka.kim', ["page" => $page, "tasks" => $tasks, "kims"=> $kims]);
        }
        else
        {
            return view('my_verstka.kim');
        }

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

    //     Homework::create($request->all());
    //     return redirect()->route('posts.index');
    // }
    // /**
    //  * Display the specified resource.
    //  */
    // // Отображение конкретного поста
    // public function show(Homework $homework)
    // {
    //     return view('posts.show', compact('post'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // // Отображение формы редактирования поста
    // public function edit(Homework $homework)
    // {
    //     return view('posts.edit', compact('post'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // // Обновление поста
    // public function update(Request $request, Homework $homework)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     $homework->update($request->all());
    //     return redirect()->route('posts.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // // Удаление поста
    // public function destroy(Homework $homework)
    // {
    //     $homework->delete();
    //     return redirect()->route('posts.index');
    // }    
}
