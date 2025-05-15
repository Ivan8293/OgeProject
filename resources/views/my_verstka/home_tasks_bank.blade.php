@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/bank_task_style.css">
@endsection


@section("main_content")    
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Банк заданий
        </h2>
    </div>
    <div class="list_of_items">
        <div class="filters_container">
            <input type="text" placeholder="Поиск задания..." class="search_input_large">
            <button class="search_button_large"> <i class="fas fa-search"></i>   Найти</button>
            <select class="filter_select_large">
                <option>Все части ОГЭ</option>
                <option>Только 1 часть</option>
                <option>Только 2 часть</option>
            </select>
            <select class="filter_select_large">
                <option>Все разделы ОГЭ</option>
                <option>Алгебра</option>
                <option>Геометрия</option>
            </select>
            <select class="filter_select_large">
                <option>Все темы ОГЭ</option>
                <option>Текстовые задачи</option>
                <option>Числа и вычисления</option>
                <option>Алгебраические выражения, уравнения, неравенства</option>
                <option>Функции</option>
                <option>Геометрия</option>
            </select>
        </div>

        <div class="cards-grid"> 
    @isset($tasksOge)
        @php $i = 0; @endphp
        @foreach($tasksOge as $taskOge)
            @php
                $progress = rand(0, 100);
                $i++;
                if ($i <= 7) {
                    $image = 'image4.png';
                } elseif ($i <= 16) {
                    $image = 'image2.png';
                } elseif ($i <= 21) {
                    $image = 'image3.png';
                } elseif ($i <= 27) {
                    $image = 'image1.png';
                } else {
                    $image = 'image4.png'; // по кругу или повтор последнего
                }
            @endphp
            <a href="{{ route('open_task_bank', ['number' => $taskOge->id ]) }}" class="task-card">
                <div class="task-image">
                    <img src="{{ asset('image/' . $image) }}" alt="Task image">
                </div>
                <div class="text_col text_progress">
                        <div class="progress_bar_wrapper">
                            <div class="progress_bar_fill"></div>
                            <div class="progress_bar_label"></div>
                        </div>
                    </div>
                <div class="task-info">
                    <div class="task-meta">Задание №{{ $taskOge->task_number }}</div>
                    <div class="task-title">{{ $taskOge->name }}</div>
                    <div class="task-subtext">{{$taskOge->math_section}}</div>
                </div>
            </a>
        @endforeach
    @endisset
</div>

</div>

<script>
    document.querySelectorAll('.task-card').forEach(card => {
        const progressContainer = card.querySelector('.text_progress');
        const progressFill = progressContainer.querySelector('.progress_bar_fill');
        const progressLabel = progressContainer.querySelector('.progress_bar_label');

        const randomProgress = Math.floor(Math.random() * 101);
        progressFill.style.width = randomProgress + '%'; // если вертикальный
        progressLabel.textContent = randomProgress + '%';
    });
</script>

@endsection