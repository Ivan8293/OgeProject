@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/classes_style.css">
@endsection


@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Классы
        </h2>
        <div class="add_button_wrapper">
            <form action="{{ route('add_class') }}">
                <button type="submit" class="add_button">
                
                    СОЗДАТЬ КЛАСС
                </button>
            </form>
        </div>
    </div>
    
    <div class="list_of_items">  
        <div class="filters_container">
        <input type="text" placeholder="Поиск класса..." class="search_input_large">
        <button class="search_button_large"> <i class="fas fa-search"></i>   Найти</button>
            <select class="filter_select_large">
                <option>Все классы</option>
                <option>Только 8 класс</option>
                <option>Только 9 класс</option>
            </select>
            <select class="filter_select_large">
                <option>Сортировать по</option>
                <option>Количеству учеников</option>
                <option>Дате последнего просмотра</option>
                <option>Баллу за пробник</option>
            </select>
        </div> 
        
        @isset($classes)
            @foreach ($classes as $class)
                <div class="list_item">
                    <div class="list_item_text">
                    <div class="text_col text_main">
                        <p class="class_name">{{ $class->name }}</p> 
                        <span class="students_count">Количество учеников: <strong>{{ $class->student_count }}</strong></span> 
                        @php
                            $averageScore = rand(6, 24);
                        @endphp

                        <span class="students_count">
                            Средний балл учеников за пробник: <strong>{{ $averageScore }}</strong>
                        </span>
                    </div> 
                    @php
                        $startDate = strtotime('2025-05-05');
                        $endDate = strtotime('2025-05-17');
                        $randomTimestamp = rand($startDate, $endDate);
                        $randomDate = date('d.m.Y', $randomTimestamp);
                    @endphp
                    <div class="last_viewed"> 
                        Последний просмотр: <strong>{{ $randomDate }}</strong>
                    </div>
                    <div class="class_stats">
                        @php
                            $unseenCount = rand(0, 20);
                        @endphp
                        <p>Количество непросмотренных дз: <strong>{{ $unseenCount }}</strong></p>
                        @php
                            $startDate = strtotime('2025-05-16');
                            $endDate = strtotime('2025-05-31');
                            $randomTimestamp = rand($startDate, $endDate);
                            $randomDate = date('d.m.Y', $randomTimestamp);
                        @endphp
                        <p>Ближайший дедлайн: <strong>{{ $randomDate }}</strong></p>
                    </div>                     
                    </div>
                    <div class="list_item_button_wrapper">
                    <a class="list_item_button" href="{{ route('class.students', ['id' => $class->class_id]) }}" data-tooltip="Просмотр учеников класса">
                        <i class="fas fa-book-open"></i> Открыть
                    </a>

                    </div>
                    <div class="list_item_button_wrapper">
                        <a class="list_item_button" href="{{ route('edit_class', ['id' => $class->class_id]) }}"  data-tooltip="Редактировать информацию о классе">
                        <i class="fas fa-pen"></i>  
                        </a>
                    </div>
                    <div class="list_item_button_wrapper">
                        <a class="list_item_button" href="{{ route('edit_class', ['id' => $class->class_id]) }}"  data-tooltip="Удалить класс">
                        <i class="fas fa-trash"></i> 
                        </a>
                    </div>
                </div>
            @endforeach
        @endisset   

        
    </div>
</div>
@endsection