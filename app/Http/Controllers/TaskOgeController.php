<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskOge;
use App\Models\Task;

class TaskOgeController extends Controller
{
    public function index($page=null)
    {

        $tasksOge = TaskOge::all();
    

        return view("my_verstka.home_tasks_bank", ["page" => $page, "tasksOge" => $tasksOge]);
    
    }

    public function create($number=null, $page="tasks_bank")
    {
        if ($number)
        {
            $tasks = Task::where("task_oge_id", $number)->get();

            $tasksOge = TaskOge::where("id", $number)->first();
            return view("my_verstka.task_bank", ["page" => $page, "tasks" => $tasks, "taskoge" => $tasksOge]);
        }
        else
        {
            return view("my_verstka.task_bank", ["page" => $page]);
        }        
    }
}
