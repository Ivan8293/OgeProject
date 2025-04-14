<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function guest_index()
    {
        return view("main");
    }

    public function teacher_index()
    {
        return view("teacher");
    }

    public function student_index()
    {
        return view("student");
    }
}