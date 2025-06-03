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
                        Иррациональные выражения
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    Изучение свойств и преобразований иррациональных выражений, примеры и задачи.
                </div>
            </div>
            <div class="header_right ">
                <form action="">
                    <button type="submit" class="add_button">                    
                        Завершить
                    </button>
                </form>
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
                            @if ($i == 1)
                                <input style="border: 2px solid rgb(30, 196, 30)" type="text" name="student_answer_{{ $task->task_id }}" placeholder="Введите ответ... ">
                            @elseif ($i == 2)
                                <input style="border: 2px solid rgb(196, 30, 30)" type="text" name="student_answer_{{ $task->task_id }}" placeholder="Введите ответ... ">
                            @else
                                <input type="text" name="student_answer_{{ $task->task_id }}" placeholder="Введите ответ... ">
                            @endif
                            <input type="button" name="submit_answer" value="Ответить"> 

                        </div>
                        @if ($i == 1)
                            <div class="info">
                                <div class="info_text">
                                    Задача решена верно!
                                </div>
                            </div>
                        @elseif ($i == 2)
                            <div class="info">
                                <div class="video"> 
                                    <iframe src="https://vkvideo.ru/video_ext.php?oid=-225856037&id=456239017&hd=2&hash=a6206a3ee3a366b4" width="504" height="283" allow="autoplay; encrypted-media; fullscreen; picture-in-picture; screen-wake-lock;" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="info_text">
                                    Задача решена неверно<br> Правильный ответ: <b>-0.9</b><br> Вы можете посмотреть видео-разбор
                                    <button type="submit" class="close_button">                    
                                        Скрыть
                                    </button>
                                </div>
                            </div>
                        

                        @endif
                        

                        @php    
                            $i++; 
                        @endphp  
                    </form>     

                @endforeach

                <!-- <form action="">
                    <button type="submit" class="add_button">                    
                        Завершить
                    </button>
                </form> -->

                <div class="score-block">
                    <h2>Уровень владения разделом "Числа, степени и корни" вырос до 68%</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Номер</th>
                                <th>Ваш ответ</th>
                                <th>Верный ответ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="first right">
                                <td>1</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr class="right">
                                <td>2</td>
                                <td>-4.1</td>
                                <td>-4.1</td>
                            </tr>
                            <tr class="wrong">
                                <td>3</td>
                                <td>0</td>
                                <td>-1</td>
                            </tr>
                            <tr class="right">
                                <td>4</td>
                                <td>8.3</td>
                                <td>8.3</td>
                            </tr>
                            <tr class="wrong">
                                <td>5</td>
                                <td>-2.5</td>
                                <td>-5</td>
                            </tr>
                            <tr class="right">
                                <td>6</td>
                                <td>6</td>
                                <td>6</td>
                            </tr>
                            <tr class="right">
                                <td>7</td>
                                <td>-3.3</td>
                                <td>-3.3</td>
                            </tr>
                            <tr class="wrong">
                                <td>8</td>
                                <td>4.4</td>
                                <td>1</td>
                            </tr>
                            <tr class="right">
                                <td>9</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr class="right">
                                <td>10</td>
                                <td>2</td>
                                <td>2</td>
                            </tr>
                            <tr class="right">
                                <td>11</td>
                                <td>10</td>
                                <td>10</td>
                            </tr>
                            <tr class="wrong">
                                <td>12</td>
                                <td>-3.6</td>
                                <td>-5</td>
                            </tr>
                            <tr class="right">
                                <td>13</td>
                                <td>1.1</td>
                                <td>1.1</td>
                            </tr>
                            <tr class="wrong">
                                <td>14</td>
                                <td>5.5</td>
                                <td>3</td>
                            </tr>
                            <tr class="right">
                                <td>15</td>
                                <td>-8.8</td>
                                <td>-8.8</td>
                            </tr>
                            <tr class="right">
                                <td>16</td>
                                <td>7</td>
                                <td>7</td>
                            </tr>
                            <tr class="wrong">
                                <td>17</td>
                                <td>8.8</td>
                                <td>6.6</td>
                            </tr>
                            <tr class="right">
                                <td>18</td>
                                <td>-6</td>
                                <td>-6</td>
                            </tr>
                            <tr class="wrong">
                                <td>19</td>
                                <td>0</td>
                                <td>10</td>
                            </tr>
                            <tr class="right last">
                                <td>20</td>
                                <td>-2,2</td>
                                <td>-2.2</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="button-container">
                        <button class="action-button plus">
                            Далее
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </main>
</body>
@endsection

