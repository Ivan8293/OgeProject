<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="/css/new_styles/task_style.css">
    <link rel="stylesheet" href="/css/new_styles/tasks_result.css">
    <title>task</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/task_slider.js"></script>
    <script src="/ajax_js/ajax_app.js"></script>

    <script src="/js/active_time_request.js"></script>


</head>

<body>

    <header class="task_header ">
        <div class="header_left ">
            <div class="header_left_top ">
                <h2 class="second_h">
                    Урок 1. Уравнения
                </h2>
            </div>
        </div>
        <div class="header_right ">
            <a id="add_class_button" href="">
                <div class="add_button">
                    <div class="add_button_text"><span class="krest">&times;</span> ЗАКРЫТЬ ТЕСТ</div>
                </div>
            </a>
        </div>
    </header>
    <main class="task_main">

        <div class="score-block">
            <h2>Уровень владения разделом "Уравнения и неравенства" вырос до 64%</h2>
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




    </main>
</body>

</html>