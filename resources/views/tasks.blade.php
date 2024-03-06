@extends("parent")
@section("content")
    <div class="main">
        <div class="task_check_container">
            <div class="task_check_wrapper">
                {{! $count = 1}}
                @foreach($tasks as $task)                   
                        @auth
                            <div id="task_check_{{$task->id}}" class="task_check">
                                <p>{{$count}}</p>
                            </div>
                        @else
                            @if($count <= 3)
                                <div id="task_check_{{$task->id}}" class="task_check">
                                    <p>{{$count}}</p>
                                </div>
                            @endif
                        @endauth
                    {{! $count++}}
                @endforeach
            </div>
        </div>
        <div class="task_wrapper">
            {{! $iter = 1}}
            @foreach($tasks as $task)
                <div class="tasks">
                    <div class="tasks_wrapper">
                        @auth
                            <div class="task_part">
                                <form id="task_form">
                                    @csrf
                                    <h2>Задание номер {{$iter}}</h2>
                                    <div class="task_img_wrapper">
                                        <img src="\tasks\topic{{$topic_id}}\sub_topic{{$sub_topic_id}}\{{$task->task}}"><br>
                                    </div>
                                    @if(isset($task->description))
                                        <p>{{ $task->description }}</p>
                                    @endif
                                    <div class="input-block-wrapper">
                                        <input class="task_input" type="text" name="answer" id="answer_{{$task->id}}" placeholder="Ответ">
                                        <input type="hidden" name="task_id" id="task_id_{{$task->id}}" value="{{$task->id}}">
                                        <button class="task_submit" type="submit" name="enter_task" id="enter_task_{{$task->id}}">Ок</button><br>
                                    </div>                                    
                                </form>
                            </div>
                            <div class="task_video_part">
                                <div id="task_video_{{$task->id}}" style="display: none">
                                    <iframe style="border-radius: 10px;" width="448" height="252" src="{{$task->youtube_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                                <div id="right_answer_{{$task->id}}" style="display: none; color: green">
                                    <p>Задача решена верно!</p>
                                </div>
                                <div id="false_answer_{{$task->id}}" style="display: none; color: black">
                                    <p>К сожалению, ответ неверный. Вы можете решить задачу еще раз или посмотреть наш видео разбор</p>
                                </div>            
                            </div>
                        @else
                            @if($iter <= 3)
                                <div class="task_part">
                                    <form id="task_form">
                                        @csrf
                                        <h2>Задание номер {{$iter}}</h2>
                                        <div class="task_img_wrapper">
                                            <img src="\tasks\topic{{$topic_id}}\sub_topic{{$sub_topic_id}}\{{$task->task}}"><br>
                                        </div>
                                        @if(isset($task->description))
                                            <p>{{ $task->description }}</p>
                                        @endif
                                        <div class="input-block-wrapper">
                                            <input class="task_input" type="text" name="answer" id="answer_{{$task->id}}" placeholder="Ответ">
                                            <input type="hidden" name="task_id" id="task_id_{{$task->id}}" value="{{$task->id}}">
                                            <button class="task_submit" type="submit" name="enter_task" id="enter_task_{{$task->id}}">Ок</button><br>
                                        </div>
                                        
                                        @if($iter == 3)
                                            <span>Зарегистрируйтесь, чтобы получить доступ ко всем практическим заданиям</span>
                                        @endif
                                    </form>
                                </div>
                                <div class="task_video_part">
                                    <div id="task_video_{{$task->id}}" style="display: none">
                                        <iframe style="border-radius: 10px;" width="448" height="252" src="{{$task->youtube_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                    <div id="right_answer_{{$task->id}}" style="display: none; color: green">
                                        <p>Задача решена верно!</p>
                                    </div>
                                    <div id="false_answer_{{$task->id}}" style="display: none; color: black">
                                        <p>К сожалению, ответ неверный. Вы можете решить задачу еще раз или посмотреть наш видео разбор</p>
                                    </div>            
                                </div>
                            @endif
                        @endauth

                    </div>
                    <button class="back_button" id="back_button_{{$task->id}}">Назад</button>
                    @auth
                        <button class="next_button" id="next_button_{{$task->id}}">Далее</button>
                    @else
                        @if ($iter == 3)
                            <button disabled class="next_button" id="next_button_{{$task->id}}">Далее</button>
                        @else
                            <button class="next_button" id="next_button_{{$task->id}}">Далее</button>
                        @endif
                    @endauth

                    {{! $iter++}}
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="\ajax_js\ajax_app.js"></script>
    <script src="\js/task_slider.js"></script>
@endsection

