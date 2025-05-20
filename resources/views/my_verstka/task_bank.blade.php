@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/task_bank.css">
@endsection


@section("main_content")
<body>
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
            <div class="test_controls">
                    <button class="end_button">Продолжить</button>
                    
            </div>
    </header>
    <main>
        <div class="main_wrapper"> 
    <form>
        @php
            $i = 1;
        @endphp

        @foreach($tasks as $task)
            @if($loop->first)
                @php
                    $i++;
                    continue;
                @endphp
            @endif
            <div class="task-card">
                <label class="task-checkbox">
                    <input type="checkbox" name="selected_tasks[]" value="{{ $task->task_id }}">
                </label>
                <div class="task-content">
                    <p>Задание {{ $i-1 }}</p>
                    <img src="{{ $task->text }}" alt=""><br>
                    <input type="hidden" name="answer_{{ $task->task_id }}" value="{{ $task->answer }}">
                    <!--<div class="answer-row">
                        <input type="text" name="student_answer_{{ $task->task_id }}" placeholder="Введите ответ... ">
                        <input type="button" name="submit_answer" value="Ответить"> 
                    </div> -->
                </div>
            </div>
            @php    
                $i++; 
            @endphp       
        @endforeach
        <button class="end_button">Продолжить</button>
    </form>
</div>

</main>
</body>
@endsection