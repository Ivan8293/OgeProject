<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="/css/new_styles/task_style.css">
    <title>task</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/task_slider.js"></script>
    <script src="/ajax_js/ajax_app.js"></script>
    
    
</head>
<body>

    <header class="task_header ">
        <div class="header_left ">
            <div class="header_left_top ">
                <h2 class="second_h">
                    Урок 1. Уравнения
                </h2>
            </div>
            <div class="header_left_bottom ">

                @for ($j = 0; $j < count($tasks); $j++)
                    @if ($j == 0)
                        <div id="{{ 'indicator_' . $tasks[$j]->task_id }}" class="task_indicator next"></div>
                    @else
                        <div id="{{ 'indicator_' . $tasks[$j]->task_id }}" class="task_indicator next"></div>
                    @endif
                @endfor

            </div>            
        </div>
        <div class="header_right ">
            <a id="add_class_button" href="{{ route('open_topic', ['topic_id' => $topic_id]) }}">
                <div class="add_button" >
                    <div class="add_button_text"><span class="krest">&times;</span> ЗАКРЫТЬ ТЕСТ</div>                    
                </div>
            </a>
        </div>
    </header>
    <main class="task_main">

    {{! $i = 1 }}
    @foreach ($tasks as $task)
        <div class="task tasks">
            <div class="task_top">
                <div class="task_question_number">
                    ЗАДАЧА <span class="current_task_num"> &nbsp;{{ $i }}&nbsp; </span> ИЗ {{ count($tasks) }}
                    {{ ! $i++; }}
                </div>
                <div class="task_img_wrapper">
                    <img class="task_img" src="/img/tasks/{{ $task->video }}" alt="">
                </div>
            </div>
            <div class="task_bottom">
                
                    <form id="task_form">
                        @csrf

                        <div class="task_description">
                            Введите числовой ответ
                        </div>
                        <div id="{{ 'right_result_' . $task->task_id }}" class="right_result">
                            Задача решена верно!
                        </div>
                        <div id="{{ 'wrong_result_' . $task->task_id }}" class="wrong_result">
                            К сожалению, задача решена неверно
                        </div>
                        <div class="task_input">     

                            <input id="{{ 'answer_' . $task->task_id }}" type="text" name="answer" class="task_input_text">   
                            <input id="{{ 'task_id_' . $task->task_id }}" type="hidden" name="task_id" value="{{ $task->task_id }}"> 
                            <input id="{{ 'student_id_' . Auth::guard('student')->user()->id }}" type="hidden" name="student_id" value="{{ Auth::guard('student')->user()->id }}">

                        </div>
                        <div class="task_navigation">
                            <div class="task_back_button back_button">
                                <
                            </div>
                            
                            <button name="submit_button" type="submit" id="{{ 'submit_' . $task->task_id }}" class="task_enter_button">Ответить</button>

                            <div class="task_next_button next_button">
                                >
                            </div>
                        </div>

                    </form>
                
            </div>
        </div>
    @endforeach


    </main>
</body>
</html>