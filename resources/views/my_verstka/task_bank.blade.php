@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/task_bank.css">
@endsection


@section("main_content")
    <header class="topic_header ">
            <div class="header_left ">
                <div class="header_left_top ">
                    <h2 class="second_h">
                        Прототипы {{ $taskoge->task_number }} задания
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    {{ $taskoge->name }}
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
    <form>
        @php
            $i = 1
        @endphp

        @foreach($tasks as $task)  

            <p>Номер {{ $i }}.</p>
            <img src="{{ $task->text }}" alt=""><br>
            <input type="hidden" name="answer_{{ $task->task_id }}" value="{{ $task->answer }}">
            <input type="text" name="student_answer_{{ $task->task_id }}" placeholder="Введите ответ: "><br> 
            <input type="button" name="submit_answer" value="Ответить"> 
            @php    
                $i++; 
            @endphp       

        @endforeach
        
    </form>
@endsection