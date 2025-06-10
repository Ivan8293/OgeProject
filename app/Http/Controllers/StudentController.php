<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        // return view('posts.index', compact('posts'));
    }

    public function index_entrance_test()
    {
        // /** @var Authenticatable&\Illuminate\Contracts\Auth\MustVerifyEmail|null $student */
        // $student = Auth::guard("student")->user();
        // $student->sendEmailVerificationNotification();

        return view("my_verstka.home_entrance_test");
    }
    

    public function need_registration_index()
    {
        return view("my_verstka.need_registration");
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

        Student::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show(Student $student)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit(Student $student)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $student->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('posts.index');
    }
}
