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
                        Линейные уравнения
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    Отработаем решение самых простых уравнений. Данная теория является базовой, и может встретиться при решение даже геометрических задач
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
                                    <iframe width="504" height="283" src="{{ $task->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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

                <form action="">
                    <button type="submit" class="add_button">                    
                        Завершить
                    </button>
                </form>

                <div class="score-block">
                    <h2>Уровень владения разделом "Алгебраические выражения, уравнения и неравенства" вырос до 68%</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Номер</th>
                                <th>Ваш ответ</th>
                                <th>Верный ответ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="first back">
                                <td>1</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr class="back">
                                <td>2</td>
                                <td>-4.1</td>
                                <td>-4.1</td>
                            </tr>
                            <tr class="back">
                                <td>3</td>
                                <td>0</td>
                                <td>-1</td>
                            </tr>
                            <tr class="back">
                                <td>4</td>
                                <td>8.3</td>
                                <td>8.3</td>
                            </tr>
                            <tr class="back">
                                <td>5</td>
                                <td>-2.5</td>
                                <td>-5</td>
                            </tr>
                            <tr class="back">
                                <td>6</td>
                                <td>6</td>
                                <td>6</td>
                            </tr>
                            <tr class="back">
                                <td>7</td>
                                <td>-3.3</td>
                                <td>-3.3</td>
                            </tr>
                            <tr class="back">
                                <td>8</td>
                                <td>4.4</td>
                                <td>1</td>
                            </tr>
                            <tr class="back">
                                <td>9</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr class="back">
                                <td>10</td>
                                <td>2</td>
                                <td>2</td>
                            </tr>
                            <tr class="back">
                                <td>11</td>
                                <td>10</td>
                                <td>10</td>
                            </tr>
                            <tr class="back">
                                <td>12</td>
                                <td>-3.6</td>
                                <td>-5</td>
                            </tr>
                            <tr class="back">
                                <td>13</td>
                                <td>1.1</td>
                                <td>1.1</td>
                            </tr>
                            <tr class="back">
                                <td>14</td>
                                <td>5.5</td>
                                <td>3</td>
                            </tr>
                            <tr class="back">
                                <td>15</td>
                                <td>-8.8</td>
                                <td>-8.8</td>
                            </tr>
                            <tr class="back">
                                <td>16</td>
                                <td>7</td>
                                <td>7</td>
                            </tr>
                            <tr class="back">
                                <td>17</td>
                                <td>8.8</td>
                                <td>6.6</td>
                            </tr>
                            <tr class="back">
                                <td>18</td>
                                <td>-6</td>
                                <td>-6</td>
                            </tr>
                            <tr class="back">
                                <td>19</td>
                                <td>0</td>
                                <td>10</td>
                            </tr>
                            <tr class="back last">
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

