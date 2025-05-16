<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\teacherClass;
use App\Models\ClassGroup;
use App\Models\StudentClass;

class TeacherClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page=null)
    {
        $teacher = Auth::guard('teacher')->user();

        if ($teacher) 
        {
            $classes_tmp = teacherClass::where('id_teacher', $teacher->id)->get();
            
            $classes_id = [];
            foreach ($classes_tmp as $teacherClass) {                
                $classes_id[] = $teacherClass->teacher_class_id;
            }

            $classes = ClassGroup::whereIn('class_id', $classes_id)->get();

            // Добавим количество учеников для каждого класса
            foreach ($classes as $class) {
                $studentCount = StudentClass::where('class_id', $class->class_id)
                                ->count();

                // Добавим новое свойство к модели
                $class->student_count = $studentCount;
            }

            $data = [
                'classes' => $classes,
                'page' => $page ?? 'classes'
            ];

            return view('my_verstka.home_classes', $data);
        }
        else
        {
            return view('my_verstka.home_classes');
        }
    
    }

    // Отображение формы создания поста
    public function create()
    {
        return view('forms.class.class_add_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        if ($teacher)
        {
            $request->validate([
                'name' => 'required'            
            ]);
    
            $class = ClassGroup::create([
                'number' => $request->number,
                'name' => $request->name
            ]);
    
            teacherClass::create([
                'id_teacher' => $teacher->id,
                'id_class' => $class->class_id
            ]);            
        }


        return redirect()->route('teacher');        
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    public function edit($id)
    {


        $class = ClassGroup::where('class_id', $id)->first();

        return view('forms.class.class_edit_form', ['class' => $class]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'number' => 'required',
        ]);

        $class = ClassGroup::where('class_id', $request->id)->first();

        $class->update([

            'name' => $request->name,
            'number' => $request->number
        ]);

        return redirect()->route('teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Удаление поста
    public function destroy($id)
    {
        $class = ClassGroup::where('class_id', $id)->first();

        $class->delete();
        return redirect()->route('teacher');
    }
}
