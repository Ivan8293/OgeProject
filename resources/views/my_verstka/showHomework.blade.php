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
                        {{ $homework->name }}
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    {{ $student_name }}
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

                @foreach($data as $item)  
                    <form id="task_form">
                        @csrf

                        <p>Задание {{ $i }}. <span class="score_text">(3 балла)</span> </p>
                        <div class="task_img_wrapper">
                            <img class="task_img" src="{{ $item['task']->text }}" alt=""><br>
                        </div>

                        

                        <input class="" type="hidden" name="answer_{{ $item['task']->task_id }}" value="{{ $item['task']->answer }}">
                        
                        <div class="answer-row">

                            @if ($item['result'] != null && $item['result']->result == 1)
                                <input style="border: 2px solid rgb(27, 240, 8);" readonly="true" class="" type="text" name="student_answer_{{ $item['task']->task_id }}" value="{{ $item['result']->student_answer }}">
                                
                            @elseif ($item['result'] != null && $item['result']->result == 0)
                                <input style="border: 2px solid rgb(255, 191, 191);" readonly="true" class="" type="text" name="student_answer_{{ $item['task']->task_id }}" value="{{ $item['result']->student_answer }}">
                                
                            @elseif ($item['result'] == null)
                                <input readonly="true" class="" type="text" name="student_answer_{{ $item['task']->task_id }}">        
                                                
                            @endif

                            
                        </div>
                        <div class="result_info_block">
                            @if ($item['result'] != null && $item['result']->result == 1)
                                <div class="">Верно</div>
                                

                            @elseif ($item['result'] != null && $item['result']->result == 0)
                                <div class="">Неверно</div>
                                <div>
                                    Ответ: <span class="answer_text">{{ $item['task']->answer }}</span>
                                </div>
                                

                            @elseif ($item['result'] == null)
                                <div>Не выполнено</div> 
                                <div>
                                    Ответ: <span class="answer_text">{{ $item['task']->answer }}</span>
                                </div>
                                

                            @endif     
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

