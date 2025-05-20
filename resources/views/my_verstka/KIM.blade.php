@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/kim.css">
@endsection


@section("main_content")
<body>
    <header class="topic_header ">
            <div class="header_left ">
                <div class="header_left_top ">
                    <h2 class="second_h">
                        {{ $kims->name }}
                    </h2>
                </div>
                <div class="header_left_bottom ">
                    {{ $kims->description }}
                </div>
            </div>
            <div class="header_right ">
                <!-- <a id="add_class_button" href="">
                    <div class="add_button" >
                        <div class="add_button_text"><span class="krest">&times;</span> ЗАКРЫТЬ ТЕСТ</div>                    
                    </div>
                </a> -->
                <div class="test_controls">
                    <button class="end_button">Завершить</button>
                    <div class="timer_block">
                        <div>Время на выполнение: <span id="total-time">3 часа 55 минут</span></div>
                        <div class='taimer'>Оставшееся время: <span id="remaining-time">–</span></div>
                </div>
            </div>
            </div>
    </header>
    <main>
    <div class="main_wrapper">
    <form>
        @php
            $i = 1
        @endphp

        @foreach($tasks as $task)  

            <p>Задание {{ $i }}</p>
            <img src="{{ $task->text }}" alt=""><br>
            <input type="hidden" name="answer_{{ $task->task_id }}" value="{{ $task->answer }}">
            <input type="text" class="answer_input" name="student_answer_{{ $task->task_id }}" placeholder="Введите ответ: "><br>  
            @php    
                $i++; 
            @endphp       

        @endforeach
        <input type="button" class="answer_button" name="submit_answer" value="Завершить">
    </form>
    </div>
</main>
</body>
@endsection
<script>
    // Установим время теста — 3 часа 55 минут
    const totalSeconds = 3 * 3600 + 55 * 60;
    let remaining = totalSeconds;

    function formatTime(seconds) {
        const hrs = Math.floor(seconds / 3600);
        const mins = Math.floor((seconds % 3600) / 60);
        const secs = seconds % 60;
        return `${hrs} ч ${mins} мин ${secs < 10 ? '0' : ''}${secs} сек`;
    }

    function updateTimer() {
        const timerEl = document.getElementById('remaining-time');
        timerEl.textContent = formatTime(remaining);

        if (remaining <= 0) {
            clearInterval(timerInterval);
            alert("Время вышло!");
            // Автоматически отправить форму или показать сообщение
        }

        remaining--;
    }

    const timerInterval = setInterval(updateTimer, 1000);
    updateTimer();
</script>
