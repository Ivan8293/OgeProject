<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page="homeworks", $from_teacher=null)
    {
        $teacherId = Auth::guard('teacher')->id();
        
        $homeworks = Homework::where("id_teacher", $teacherId)->get();
        return view('my_verstka.home_homeworks', ['page' => $page, "from_teacher" => $from_teacher, "homeworks" => $homeworks]);   
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
