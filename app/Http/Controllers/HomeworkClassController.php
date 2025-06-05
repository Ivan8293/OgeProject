<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassHomework;
use App\Models\Homework;
use App\Models\HomeworkTask;

use function PHPSTORM_META\map;

class HomeworkClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classHomework = ClassHomework::all();
        // return view('posts.index', compact('posts'));
    }

    // Отображение формы создания поста
    public function create()
    {
        return view('posts.create');
    }

    public function add_to_class($class_id,  $homework_id)
    {
        // Проверяем, существует ли запись с такими class_id и homework_id
        $exists = ClassHomework::where('id_class', $class_id)
            ->where('id_homework', $homework_id)
            ->exists();

        if(!$exists)
        {
            // Если нет, создаём новую запись
            ClassHomework::create([
                'id_homework' => $homework_id,
                'id_class' => $class_id,  
                'create_date' => now()              
            ]);
        }
        else
            return redirect()->back();

        return view('my_verstka.forms.add_homework_deadline', ['class_id' => $class_id, 'homework_id' => $homework_id]);
    }

    public function update_deadline(Request $request)
    {
        
        // $request->validate([
        //     'date' => 'required'
        // ]);

        $class_id = $request->class_id;
        $homework_id = $request->homework_id;

        $class_homework = ClassHomework::where("id_class", $class_id)->where("id_homework", $homework_id)->first();

        $class_homework->update([
            'finish_date' => $request->date,
        ]);

        return redirect()->route("class.students", ['id' => $class_id]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show(ClassHomework $classHomework)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit(ClassHomework $classHomework)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request, ClassHomework $classHomework)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $classHomework->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy(ClassHomework $classHomework)
    {
        $classHomework->delete();
        return redirect()->route('posts.index');
    }
}
