<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;
use App\Models\task;
use App\Models\User_sub_topic;
use App\Models\Sub_topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function GetBusinessCard()
    {
        return view('businessCard');
    }

    public function GetTopics()
    {
        //костыль
        // нам нужно при вызове любого шаблона кроме страницы визитки
        // удалять в сессии данные о темах
        // и добалять заново, чтобы мы могли в родительском шаблоне
        // взять данные из сессии и поместить их в левое меню
        // а то я хз как передать данные в родительский шаблон ¯\_(ツ)_/¯
        // поэтому в каждом методе, который вызивает шаблон надо вставить 
        // метод вот этот IndexController::TopicsToSession();

        IndexController::TopicsToSession();

        $topics = topic::select('id', 'name')->get();
        $sub_topics = Sub_topic::select('id', 'name', 'description', 'youtube_link_theory', 'topic_id')->get();

        // $data = topic::join('sub_topics', 'topics.id', '=', 'topic_id')
        //     ->select('topics.id', 'topics.name', 'sub_topics.id', 'sub_topics.name', 'sub_topics.description', 
        //     'sub_topics.youtube_link_theory', 'sub_topics.topic_id')
        //     ->get();



        return view('topics')->with(['topics_data' => $topics, 'sub_topics_data' => $sub_topics]);
    }

    public function GetTopic($id)
    {
        IndexController::TopicsToSession();

        // Добавим в БД инфу о том, что пользователь начал проходить данную подтему
        if(Auth::check())
        {
            User_sub_topic::firstOrCreate(
            [
                'user_id' => Auth::id(), 
                'sub_topic_id' => $id
            ],
            [
                'user_id' => Auth::id(),
                'sub_topic_id' => $id
            ]);
        }


        $sub_topic = Sub_topic::select('id', 'name', 'description', 'youtube_link_theory')->where('id', $id)->first();        
        return view('topic')->with(['sub_topic' => $sub_topic]);
    }

    public function GetTasks($id)
    {
        IndexController::TopicsToSession();
        // еще надо узнать номер topic к которому относятся данные задачи
        $topic_id = Sub_topic::select('topic_id')->where('id', $id)->first();
        $topic_id = $topic_id->topic_id;

        $tasks = task::select('tasks.id', 'youtube_link', 'task', 'sub_topic_id', 'answer')->where('sub_topic_id', $id)->get();
        return view('tasks')->with(['tasks' => $tasks, 'sub_topic_id' => $id, 'topic_id' => $topic_id]);
    }

    public function personal_account()
    {
        IndexController::TopicsToSession();
        
        $user_data = Auth::user();
        return view('personal_account')->with(['user_data' => $user_data]);
    }

    public function statistics()
    {
        IndexController::TopicsToSession();

        // возмем данные по ответам и правильным ответам ученика
        $stat_data = User_sub_topic::join('sub_topics', 'sub_topic_id', '=', 'sub_topics.id')
            ->select('name', 'right_answer_count', 'answer_count', 'sub_topic_id')
            ->where('user_id', Auth::id())->get();
        //узнаем сколько у нас всего подтем
        $sub_topic_count = DB::table('sub_topics')->count();

        $user_data = Auth::user();
        return view('statistics')->with(['stat_data' => $stat_data, 'sub_topic_count' => $sub_topic_count]);
    }

    static public function TopicsToSession()
    {
        session()->forget('topics_data');
        session()->forget('sub_topics_data');

        $topics = topic::all();
        $sub_topics = Sub_topic::all();

        session()->put('topics_data', $topics);
        session()->put('sub_topics_data', $sub_topics);
    }  
}
