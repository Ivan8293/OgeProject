@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/list_topic_style.css">
@endsection

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Домашние работы
        </h2>
        <div class="add_button_wrapper">
            <form action="{{ route('add_class') }}">
                <button type="submit" class="add_button">
                <i class="fas fa-plus"></i>
                    СОЗДАТЬ ДЗ
                </button>
            </form>
        </div>
    </div>
    
    <div class="list_of_items">
        <!-- <div class="filters_container">
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
        </div> -->
        <div class="filters_container">
        <input type="text" placeholder="Поиск дз..." class="search_input_large">
        <button class="search_button_large"> <i class="fas fa-search"></i>   Найти</button>
            <select class="filter_select_large">
                <option>Все темы ОГЭ</option>
                <option>Текстовые задачи</option>
                <option>Числа и вычисления</option>
                <option>Алгебраические выражения, уравнения, неравенства</option>
                <option>Функции</option>
                <option>Геометрия</option>
            </select>
            <select class="filter_select_large">
                <option>Сортировать по</option>
                <option>Уровню сложности</option>
                <option>Дате создания</option>
            </select>
        </div> 
        @isset($homeworks)
            @foreach ($homeworks as $homework)
                <div class="list_item" data-difficulty="{{ $homework->level }}">
                <div class="list_item_text">
                    
                    <div class="text_col text_main">
                        <div class="difficulty_scale">
                                    <span class="difficulty_oval gray"></span>
                                    <span class="difficulty_oval gray"></span>
                                    <span class="difficulty_oval gray"></span>
                        </div>
                        <p>{{ $homework->name }}</p>
                        <span>{{ $homework->description }}</span>  
                    </div>
                </div>
                    <div class="list_item_button_wrapper">
                        <a class="list_item_button" href="" data-tooltip="Перейти к теории">
                            <i class="fas fa-book-open"></i> Теория
                        </a>
                        <a class="list_item_button" href="" data-tooltip="Перейти к практике">
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