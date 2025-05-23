@extends("my_verstka.home")

@section("child_link")
    
    <link rel="stylesheet" href="/css/new_styles/task_bank.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <title>task</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/task_slider.js"></script>
    <script src="/ajax_js/ajax_app.js"></script>

    <script src="/js/active_time_request.js"></script>
@endsection


@section("main_content")  
<body>
    <header class="topic_header ">
            <div class="header_left ">
                <div class="header_left_top ">
                    <h2 class="second_h">
                        {{ $topic->name }}
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    
                </div>
            </div>
            <div class="header_right ">
                <!-- <a id="add_class_button" href="">
                    <div class="add_button" >
                        <div class="add_button_text"><span class="krest">&times;</span> ЗАКРЫТЬ ТЕСТ</div>                    
                    </div>
                </a> -->
            </div>
    </header>
    <main>
        <div class="main_wrapper">
            <form>
                @php
                    $i = 1
                @endphp

                @foreach($tasks as $task)  
                    <form id="task_form">
                        @csrf

                        <p>Задание {{ $i }}</p>
                        <div class="task_img_wrapper">
                            <img class="task_img" src="{{ $task->text }}" alt=""><br>
                        </div>
                        

                        <input class="" type="hidden" name="answer_{{ $task->task_id }}" value="{{ $task->answer }}">
                        
                        <div class="answer-row">

                            <input class="right_answer" type="text" name="student_answer_{{ $task->task_id }}" placeholder="Введите ответ... ">

                            <input type="button" name="submit_answer" value="Ответить"> 

                        </div>

                        @php    
                            $i++; 
                        @endphp  
                    </form>     

                @endforeach
                
            </form>
        </div>
    </main>
</body>
@endsection

