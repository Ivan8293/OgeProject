<?php

namespace App\Http\Controllers\Pages\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Result;
use App\Models\TopicTask;
use App\Models\Topic;

class StatisticsController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index($page=null)
    {
        $userId = auth()->id();

        $dailyActivity = DB::table('user_activity')
        ->where('user_id', $userId)
        ->where('active_date', now()->toDateString())
        ->sum('active_time');

        $weeklyActivity = DB::table('user_activity')
        ->where('user_id', $userId)
        ->whereBetween('active_date', [now()->startOfWeek(), now()->endOfWeek()])
        ->sum('active_time');

        $monthlyActivity = DB::table('user_activity')
        ->where('user_id', $userId)
        ->whereMonth('active_date', now()->month)
        ->whereYear('active_date', now()->year)
        ->sum('active_time');

        
        $results = Result::where("id_student", $userId)->get();  

        $topics = Topic::with('tasks')->get();
        $tasksByTopic = $topics->mapWithKeys(function ($topic) {
            return [$topic->topic_id => $topic->tasks];
        });
        
        $topic_levels = [];
        foreach ($tasksByTopic as $topicId => $tasks) {
            
            foreach ($tasks as $task) {
                
            }
        }

        
        

        if ($page)
            return view('my_verstka.home_statistics', ['page' => $page]);
        else
            return view('my_verstka.home_statistics');
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

        // Result::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    // Отображение конкретного поста
    // public function show(Result $result)
    // {
    //     return view('posts.show', compact('post'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // Отображение формы редактирования поста
    // public function edit(Result $result)
    // {
    //     return view('posts.edit', compact('post'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // Обновление поста
    // public function update(Request $request, Result $result)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     $result->update($request->all());
    //     return redirect()->route('posts.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // // Удаление поста
    // public function destroy(Result $result)
    // {
    //     $result->delete();
    //     return redirect()->route('posts.index');
    // }
}
