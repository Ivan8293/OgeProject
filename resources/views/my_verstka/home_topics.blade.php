@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/list_topic_style.css">
@endsection

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            @isset($is_homework)
                Выбирите учебную тему для дз
            @else
                Учебные темы
            @endisset
        </h2>
    </div>
    
    <div class="list_of_items">
        <div class="filters_container">
            <input type="text" placeholder="Поиск темы..." class="search_input_large">
            <button class="search_button_large"> <i class="fas fa-search"></i>   Найти</button>
            <select class="filter_select_large">
                <option>Все номера ОГЭ</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
            </select>
            <select class="filter_select_large">
                <option>Все темы</option>
                <option>Не начатые</option>
                <option>В процессе</option>
                <option>Полностью освоены</option>
            </select>
            <select class="filter_select_large">
                <option>Сортировать по</option>
                <option>Сложности</option>
                <option>Уровню освоения</option>
                <option>Частоте на экзамене</option>
            </select>
        </div>

        @isset($topics)
            @foreach ($topics as $topic)
                <div class="list_item" data-difficulty="{{ $topic->difficult_level }}">
                <div class="list_item_text">
                    
                    <div class="text_col text_main">
                        <div class="difficulty_scale">
                                    <span class="difficulty_oval gray"></span>
                                    <span class="difficulty_oval gray"></span>
                                    <span class="difficulty_oval gray"></span>
                        </div>
                        <p>{{ $topic->name }}</p>  
                        @if ($topic->taskOge)
                            @if ($topic->taskOge->id <= 7)
                                <span>Встречается в {{ $topic->taskOge->task_number }} заданиях на ОГЭ</span>
                            @else
                                <span>Встречается в {{ $topic->taskOge->task_number }} задание на ОГЭ</span>
                            @endif
                        @endif

                    </div>

                    @isset($is_homework)
                        <div style="display: none" class="text_col text_progress">                            
                    @else
                        <div class="text_col text_progress">
                    @endisset
                            <div class="progress_text">Тема освоена на</div>
                            <div class="progress_bar_wrapper">
                                <div class="progress_bar_fill"></div>
                                <div class="progress_bar_label"></div>
                            </div>
                        </div>

                </div>
                    <div class="list_item_button_wrapper">
                        @isset($is_homework)
                            <a class="list_item_button" href="{{ route('choose_homework_taks', ['topic_id' => $topic->topic_id]) }}" data-tooltip="Перейти к теории">
                                <i class="fas fa-check"></i> Выбрать
                            </a>
                        @endisset
                        <a class="list_item_button" href="{{ route('open_topic', ['topic_id' => $topic->topic_id]) }}" data-tooltip="Перейти к теории">
                            <i class="fas fa-book-open"></i> Теория
                        </a>
                        <a class="list_item_button" href="{{ route('tasks', ['topic_id' => $topic->topic_id]) }}" data-tooltip="Перейти к практике">
                            <i class="fas fa-pen"></i> Практика
                        </a>
                    </div>
                </div>
  
            @endforeach           
           
        @endisset
        
    </div>
</div>
<script>
    document.querySelectorAll('.list_item').forEach(item => {
        // Прогресс
        const progressContainer = item.querySelector('.text_progress');
        const randomProgress = Math.floor(Math.random() * 101);
        progressContainer.querySelector('.progress_bar_fill').style.width = randomProgress + '%';
        progressContainer.querySelector('.progress_bar_label').textContent = randomProgress + '%';

        // Сложность
        const difficulty = parseInt(item.getAttribute('data-difficulty'));
        const ovals = item.querySelectorAll('.difficulty_oval');

        if (difficulty === 1) {
            ovals[0].classList.add('green');
        } else if (difficulty === 2) {
            ovals[0].classList.add('orange');
            ovals[1].classList.add('orange');
        } else if (difficulty === 3) {
            ovals.forEach(o => o.classList.add('red'));
        }
    });
</script>
@endsection