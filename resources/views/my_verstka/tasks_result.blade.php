@extends("my_verstka.home")

@section("child_link")
    
    <link rel="stylesheet" href="/css/new_styles/task_kim.css">


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
                        Вариант 1
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    Демонстрационный вариант ОГЭ 2025 года
                </div>
            </div>
            <!-- <div class="header_right ">
                <form action="">
                    <button type="submit" class="add_button">                    
                        Завершить
                    </button>
                </form>
            </div> -->
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

                <div class="score-block">
                    <h2>Результаты экзамена</h2>
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
                            <tr class="right">
                                <td>3</td>
                                <td>-1</td>
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
                            <tr class="wrong">
                                <td>10</td>
                                <td>2</td>
                                <td>-2</td>
                            </tr>
                            <tr class="wrong">
                                <td>11</td>
                                <td>10</td>
                                <td>0</td>
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
                            <tr class="wrong last">
                                <td>20</td>
                                <td>-2.2</td>
                                <td>-3.6</td>
                            </tr>
                            <tr class="wrong last">
                                <td>21</td>
                                <td>43</td>
                                <td>20</td>
                            </tr>
                            <tr class="empty last">
                                <td>22</td>
                                <td>Не решено</td>
                                <td>-2.2</td>
                            </tr>
                            <tr class="empty last">
                                <td>23</td>
                                <td>Не решено</td>
                                <td>0.5</td>
                            </tr>
                            <tr class="empty last">
                                <td>24</td>
                                <td>Не решено</td>
                                <td>3.5</td>
                            </tr>
                            <tr class="empty last">
                                <td>25</td>
                                <td>Не решено</td>
                                <td>10</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text_result">
                        Вы решили 11 заданий. Набрано 11 первичных баллов. Это соответствует оценке 3
                    </div>
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

