@extends("my_verstka.home")

@section("child_link")
    
    <link rel="stylesheet" href="/css/new_styles/task_entrance.css">


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
                        {{$topic->name}}
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    {{ $topic->description }}
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

                

                <!-- <form action="">
                    <button type="submit" class="add_button">                    
                        Завершить
                    </button>
                </form> -->
                
                @foreach($tasks as $task)  
                    <form id="task_form">
                        @csrf

                        <p>Задание {{ $i }}</p>
                        <div class="task_img_wrapper">
                            <img class="task_img" src="{{ $task->text }}" alt=""><br>
                        </div>
                        

                        <input class="" type="hidden" name="answer_{{ $task->task_id }}" value="{{ $task->answer }}">
                        
                        <div class="answer-row">                            
                            <input type="text" name="student_answer_{{ $task->task_id }}" placeholder="Введите ответ... ">
                            
                            

                        </div>

                        

                        @php    
                            $i++; 
                        @endphp  
                    </form>     

                @endforeach
                <div class="results_wrapper">
                    <div class="score-block-left">
                        <h2>Задачи</h2>
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
                        
                    </div>
                    <div class="score-block">
                        <h2>Поздравляем! для вас составлена программа обучения</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Набранные баллы</th>
                                    <th>Проценты</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="first back">
                                    <td>Числа, степени и корни</td>
                                    <td>4/6</td>
                                    <td>66.7%</td>
                                </tr>
                                <tr class="back">
                                    <td>Алгебраические выражения, уравнения и неравенства</td>
                                    <td>6/6</td>
                                    <td>100%</td>
                                </tr>
                                <tr class="back">
                                    <td>Текстовые задачи</td>
                                    <td>4/6</td>
                                    <td>66.7%</td>
                                </tr>
                                <tr class="back">
                                    <td>Функции</td>
                                    <td>3/6</td>
                                    <td>50%</td>
                                </tr>
                                <tr class="back">
                                    <td>Практико-ориентированные задачи</td>
                                    <td>6/6</td>
                                    <td class="green">100%</td>
                                </tr>
                                <tr class="back">
                                    <td>Треугольники</td>
                                    <td>2/6</td>
                                    <td>33.3%</td>
                                </tr>
                                <tr class="back">
                                    <td>Четырехугольники и многоугольники</td>
                                    <td>5/6</td>
                                    <td>83.3%</td>
                                </tr>
                                <tr class="back">
                                    <td>Окружности и круг</td>
                                    <td>1/6</td>
                                    <td>16.7%</td>
                                </tr>

                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="button-container-last">
                    <button class="action-button plus">
                        Далее
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
@endsection

