@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/task_bank.css">
@endsection


@section("main_content")
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