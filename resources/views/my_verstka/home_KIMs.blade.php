@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/kims_style.css">
@endsection

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Тренировочные варианты
        </h2>
    </div>
    
    <div class="list_of_items">
        <div class="filters_container">
        <input type="text" placeholder="Поиск варианта..." class="search_input_large">
        <button class="search_button_large"> <i class="fas fa-search"></i>   Найти</button>
            <select class="filter_select_large">
                <option>Все источники</option>
                <option>Тренировочные варианты из заданий ФИПИ</option>
                <option>Варианты с основной волны</option>
                <option>Варианты с досрочной волны</option>
                <option>Варианты с резервной волны</option>
                <option>Пробные варианты СТАТГРАД</option>
            </select>
            <select class="filter_select_large">
                <option>Все варианты</option>
                <option>Только непрорешанные</option>
                <option>Начатые</option>
                <option>Законченные</option>
            </select>
        </div>

        @isset($KIMs)
            @foreach ($KIMs as $kim)
                <div class="list_item">
                <div class="list_item_text">
                    
                    <div class="text_col text_main">
                        <p>{{ $kim->name }}</p>  
                        <span>{{ $kim->description }}</span>
                    </div>
                    <div class="text_col text_progress">
                        <div class="progress_text">Набрано 10/31 баллов</div>
                </div>
                    </div>
                    <div class="list_item_button_wrapper">
                        <a class="list_item_button" href="{{ route('open_kim', ['topic_id' => $kim->topic_id]) }}" data-tooltip="Перейти к практике">
                            <i class="fas fa-pen"></i> Открыть
                        </a>
                    </div>
                </div>
  
            @endforeach
            @endisset  
        
    </div>
</div>
@endsection