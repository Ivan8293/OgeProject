@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="">
@endsection


@section("main_content")    

    @isset($tasksOge)    
        @foreach($tasksOge as $taskOge)
            {{ $taskOge->name }}<br>
            {{ $taskOge->task_number }}<br>
            {{ $taskOge->math_section }}<br>
            {{ $taskOge->subject }}<br>
        @endforeach
    @endisset

@endsection