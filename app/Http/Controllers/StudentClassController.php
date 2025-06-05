<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ClassGroup;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function index($class_id)
    {
        if (!$class_id)
            return redirect()->back();

        $class = ClassGroup::where("class_id", $class_id)->first();
        return view("my_verstka.forms.add_student", ['class' => $class]);
    }


    public function add(Request $request)
    {
        $request->validate([
            'login' => 'required'
        ]);

        $student = Student::where("login", $request->login)->first();

        if (!$student)
            return redirect()->route("add_student");

        $id_student = $student->id;
        $id_class = $request->class_id;

        $display_name = trim($request->surname) . " " . trim($request->name);
        
        // Проверяем, существует ли запись с такими id_class и id_student
        $exists = StudentClass::where('class_id', $id_class)
            ->where('student_id', $id_student)
            ->exists();

        if (!$exists) {
            // Если нет, создаём новую запись
            StudentClass::create([
                'class_id' => $id_class,
                'student_id' => $id_student,
                'display_name' => $display_name,
            ]);
        }
        else
            return redirect()->back();       


        return redirect()->route('class.students', ['id' => $id_class]);  
    }
}
