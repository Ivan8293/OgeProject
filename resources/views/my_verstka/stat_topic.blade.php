@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/stat_topic_style.css">

    <link rel="stylesheet" href="/css/new_styles/stat_google_chart.css">
@endsection




@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Уровни владения разделами
            <span class="student_name">
                @if (Auth::guard('student')->check())
                    {{ Auth::guard('student')->user()->name }}
                @endif
            </span>
        </h2>
        <!-- <div class="add_button_wrapper">
            <a id="add_class_button" href="">
                <div class="add_button" >
                    <div class="add_button_text">СОЗДАТЬ КЛАСС</div>
                    
                </div>
            </a>
        </div> -->
    </div>

    
    
    <div class="list_of_items ">                        
        <div class="stat_block ">
            <div class="stat_block_name ">
                Числа, степени и корни
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_1" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        85%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Алгебраические выражения, уравнения и неравенства
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_2" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        70%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Текстовые задачи
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_3" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        65%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Функции
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_4" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        96%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Треугольники 
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_5" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        32%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Четырехугольники и многоугольники
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_6" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        11%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Окружность и круг
            </div>
            <div class="stat_block_value_wrap ">
                <div class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        28%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Практико-ориентированные задачи
            </div>
            <div class="stat_block_value_wrap ">
                <div class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        28%
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.stat_block_value_color').forEach(block => {
        const text = block.querySelector('.stat_block_value_num').innerText.trim();
        const percent = parseInt(text.replace('%', ''));

        // Ширина прогресс-бара
        block.style.width = percent + '%';

        // Цвет через HSL (от красного к зелёному, но мягко)
        // Hue от 0 (red) до 120 (green), пастельные за счёт saturation и lightness
        const hue = percent * 1.2; // 0–120
        const color = `hsl(${hue}, 80%, 80%)`;  // мягкий пастельный цвет

        block.style.backgroundColor = color;
    });
</script>


@endsection