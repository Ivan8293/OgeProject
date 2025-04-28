<?php

namespace App\Http\Controllers\Pages\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class KIMsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page=null)
    {
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
    public function create($topic_id=null, $page="KIM")
    {
        if ($topic_id)
        {
            return view('my_verstka.topic');
        }
        else
        {
            return view('my_verstka.topic');
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
