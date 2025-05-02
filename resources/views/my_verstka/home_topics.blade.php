@extends("my_verstka.home")

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Учебные темы
        </h2>
        <!-- <div class="add_button_wrapper">
            <a id="add_class_button" href="">
                <div class="add_button" >
                    <div class="add_button_text">СОЗДАТЬ КЛАСС</div>
                    
                </div>
            </a>
        </div> -->
    </div>
    
    <div class="list_of_items">
        
        @isset($topics)
            @foreach ($topics as $topic)
                <div class="list_item">
                <div class="list_item_text">
                    <div class="text_col text_main">
                        <p>Обыкновенная дробь, основное свойство дроби. Сравнение дробей</p>  
                        <span>Встречается в 1, 5, 15 заданиях на ОГЭ</span>
                    </div>
                    <div class="text_col text_progress">
                        <div class="progress_text">Тема освоена на</div>
                        <div class="progress_bar_wrapper">
                            <div class="progress_bar_fill"></div>
                            <div class="progress_bar_label"></div>
                        </div>
                    </div>
                    </div>
                    <div class="list_item_button_wrapper">
                        <a class="list_item_button" href="{{ route('open_topic', ['topic_id' => $topic->topic_id]) }}" data-tooltip="Перейти к теории">
                            <i class="fas fa-book-open"></i> Теория
                        </a>
                        <a class="list_item_button" href="{{ route('open_topic', ['topic_id' => $topic->topic_id]) }}" data-tooltip="Перейти к практике">
                            <i class="fas fa-pen"></i> Практика
                        </a>
                    </div>
                </div>
                <script>
                    document.querySelectorAll('.text_progress').forEach(item => {
                        const randomProgress = Math.floor(Math.random() * 101); // от 0 до 100
                        const fill = item.querySelector('.progress_bar_fill');
                        const label = item.querySelector('.progress_bar_label');
                        
                        fill.style.width = randomProgress + '%';
                        label.textContent = randomProgress + '%';
                    });
                </script>
  
            @endforeach
        @endisset
        
    </div>
</div>
@endsection