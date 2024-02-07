<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\User_sub_topic;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function AnswerCheck(Request $request)
    {
        $user_id = Auth::id();
        $result = false;

        // получили данные из формы
        $id = $request->task_id;
        $pupil_answer = trim($request->answer);        

        // получим правильный ответ из базы данных
        $answer = task::select('answer')->where('id', $id)->first();

        if ($pupil_answer == $answer->answer)  
            $result = true;  
        
        if (Auth::check())
        {
            // запишем в БД инфу о всех решенных задачах по данной теме и о 
            // количестве правильно решенных задач

            // узнаем id подтемы по которой решаем задачи
            $sub_topic_id = task::select('sub_topic_id')->where('id', $id)->first();
            $sub_topic_id = $sub_topic_id->sub_topic_id;

            $current_data = User_sub_topic::select('right_answer_count', 'answer_count')
                ->where('user_id', $user_id )->where('sub_topic_id', $sub_topic_id)->first();

            $current_right_answ = $current_data->right_answer_count;
            $current_answ = $current_data->answer_count;

            $current_answ++;
            $answ_count = $current_answ;
            $right_answ_count = $current_right_answ;
            if ($result == true)
                $right_answ_count++;

            User_sub_topic::where('user_id', $user_id)->where('sub_topic_id', $sub_topic_id)
                ->update(['right_answer_count' => $right_answ_count, 'answer_count' => $answ_count]);
        }


        return response()->json(['result' => $result, 'id' => $id]);
    }
}
