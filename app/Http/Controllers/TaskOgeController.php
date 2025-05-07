<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskOge;

class TaskOgeController extends Controller
{
    public function index($page=null)
    {

        $tasksOge = TaskOge::all();
    

        return view("my_verstka.home_tasks_bank", ["page" => $page, "tasksOge" => $tasksOge]);
    
    }
}
