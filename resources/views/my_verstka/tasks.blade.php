<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/new_styles/task_style.css">
    <title>task</title>
    <script src="/js/task_slider.js"></script>
    
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
                <div class="task_indicator right"></div>
                <div class="task_indicator right"></div>
                <div class="task_indicator wrong"></div>
                <div class="task_indicator right"></div>
                <div class="task_indicator wrong"></div>
                <div class="task_indicator right"></div>
                <div class="task_indicator right"></div>
                <div class="task_indicator wrong"></div>
                <div class="task_indicator right"></div>
                <div class="task_indicator current"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
                <div class="task_indicator next"></div>
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

    @foreach ($tasks as $task)
        <div class="task tasks">
            <div class="task_top">
                <div class="task_question_number">
                    ЗАДАЧА <span class="current_task_num"> {{ $task->answer }} </span> ИЗ {{ count($tasks) }}
                </div>
                <div class="task_img_wrapper">
                    <img class="task_img" src="/img/tasks/{{ $task->video }}" alt="">
                </div>
            </div>
            <div class="task_bottom">
                <div class="task_description">
                    Введите числовой ответ
                </div>
                <div class="task_input">
                    <form action="">
                        <input type="text" class="task_input_text">
                    </form>
                </div>
                <div class="task_navigation">
                    <div class="task_back_button back_button">
                        <
                    </div>
                    <div class="task_enter_button ">
                        Ответить
                    </div>
                    <div class="task_next_button next_button">
                        >
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    </main>
</body>
</html>