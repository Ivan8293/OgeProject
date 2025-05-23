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

    public function create($task_oge_id=null, $page="tasks_bank")
    {
        if ($task_oge_id)
        {
            $tasks = Task::where("task_oge_id", $task_oge_id)->get();

            $tasksOge = TaskOge::where("id", $task_oge_id)->first();
            
            return view("my_verstka.task_bank", ["page" => $page, "tasks" => $tasks, "taskoge" => $tasksOge]);
        }
        else
        {
            return view("my_verstka.task_bank", ["page" => $page]);
        }        
    }
    
    public function index_results($page=null)
    {   

        return view("my_verstka.tasks_result");
    
    }
    
    // public function index_tasks_entrance($page=null)
    // {   

    //     return view("my_verstka.tasks_entrance");
    
    // }
}
