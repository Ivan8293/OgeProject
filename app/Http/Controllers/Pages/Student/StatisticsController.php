<?php

namespace App\Http\Controllers\Pages\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Result;
use App\Models\TopicTask;
use App\Models\Topic;
use App\Models\UserActivity;
use Faker\Provider\UserAgent;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;


class StatisticsController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index($page="statistics")
    {
        if (!Auth::guard('student')->check() && !Auth::guard('teacher')->check())
        {
            return redirect()->route("entrance_test");
        } 

        // узнаем ученик уже прошел входную диагностику или нет
        $entrance_topic = Topic::where("type", "Входная диагностика")->first();
        $task_from_entrance = TopicTask::where("id_topic", $entrance_topic->topic_id)->first();
        $result = Result::where("id_student", Auth::guard('student')->user()->id)
                            ->where("id_task", $task_from_entrance->id_task)->first();        

        if(!$result)
            return redirect()->route("entrance_test");


        
        $userId = auth()->id();

        // работа с темами и процентов успешности прохождения темы

        $results = Result::where("id_student", $userId)->get(); 
        
        $topic_task = TopicTask::all();

        $topics = Topic::where("type", "Учебная тема")->with('tasks')->get();
        $tasksByTopic = $topics->mapWithKeys(function ($topic) {
            return [$topic->topic_id => $topic->tasks];
        });
        
        $topic_levels = [];
        foreach ($tasksByTopic as $topicId => $tasks) {            
            // узнать количество всех задач по теме
            $allCount = $topic_task->where('id_topic', $topicId)       
                    ->pluck('id_task')                  
                    ->unique()                         
                    ->count(); 


            // узнать количество решенных задач по теме
            $resultIds = $results->pluck('id_task')->unique();
            
            // Фильтруем tasks, оставляя только те, у которых id есть в $resultIds
            $solvedCount = $tasks->filter(function($task) use ($resultIds) {
                return $resultIds->contains($task->task_id);
            })->count();
            

            // узанть количестов правильно решенных задач по теме
            // Получаем уникальные id_task из result, где поле result равно 1
            $resultIds = $results->where('result', 1)
                                ->pluck('id_task')
                                ->unique();

            // Фильтруем tasks, оставляя только те, у которых id есть в $resultIds
            $rightCount = $tasks->filter(function($task) use ($resultIds) {
                return $resultIds->contains($task->task_id);
            })->count();

            // // добавляем переменные в массив
            // array_push($topic_levels, [$topicId => [$all_count, $solvedCount, $RightCount]]);

            // высчитываем процент владения темой по формуле
            $k = $solvedCount / $allCount;
            $p = $rightCount / $allCount;

            $procent = round(($k * $p + ((1 - $k) * $k)) * 100, 2);
            $topic_levels[$topicId] = $procent;    
        }
        asort($topic_levels);
        
    

        
        //работа с активным временем пользоватля
        // $dailyActivity = DB::table('user_activity')
        // ->where('user_id', $userId)
        // ->where('active_date', now()->toDateString())
        // ->sum('active_time');

        // $weeklyActivity = DB::table('user_activity')
        // ->where('user_id', $userId)
        // ->whereBetween('active_date', [now()->startOfWeek(), now()->endOfWeek()])
        // ->sum('active_time');

        // $monthlyActivity = DB::table('user_activity')
        // ->where('user_id', $userId)
        // ->whereMonth('active_date', now()->month)
        // ->whereYear('active_date', now()->year)
        // ->sum('active_time');

        $user_activity = UserActivity::where("user_id", $userId)
            ->orderBy('active_date') // на всякий случай сортируем
            ->get(['active_date', 'active_time']);

        // Группируем по году и номеру недели
        $weeks = $user_activity->groupBy(function ($item) {
            $date = new \DateTime($item->active_date);
            $year = $date->format('o'); // год по ISO
            $week = $date->format('W'); // номер недели
            return $year . '-W' . $week;
        });

        $weeksArray = $weeks->map(function (Collection $itemsInWeek, $weekKey) {
            // Получаем год и номер недели из ключа
            [$year, $week] = explode('-W', $weekKey);

            // Создаём объект даты для понедельника этой недели (ISO-8601)
            $monday = new \DateTime();
            $monday->setISODate((int)$year, (int)$week);

            // Создаём ассоциативный массив с датами из базы для быстрого поиска active_time
            $dateToTime = $itemsInWeek->mapWithKeys(function ($item) {
                return [$item->active_date => $item->active_time];
            });

            $weekData = [];

            // Формируем массив из 7 дней недели с ключами-датами
            for ($i = 0; $i < 7; $i++) {
                $currentDate = clone $monday;
                $currentDate->modify("+{$i} days");
                $currentDateStr = $currentDate->format('Y-m-d');

                // Если дата есть в базе — ставим active_time, иначе 0
                $weekData[$currentDateStr] = $dateToTime->get($currentDateStr, 0);
            }

            return $weekData;
        })->values()->all();



        


        

        if ($page)
            return view('my_verstka.home_statistics', [
                'page' => $page, 
                'topic_levels' => $topic_levels, 
                'topics' => $topics,
                'weeks_array' => $weeksArray,
            ]);
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
