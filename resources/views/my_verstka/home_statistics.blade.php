@extends("my_verstka.home")

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            СТАТИСТИКА 
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
                Задание 1
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_1" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        28%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Задание 2
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_2" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        55%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Задание 3
            </div>
            <div class="stat_block_value_wrap ">
                <div id="stat_block_3" class="stat_block_value_color">
                    <div class="stat_block_value_num">
                        74%
                    </div>
                </div>
            </div>
        </div>

        <div class="stat_block ">
            <div class="stat_block_name ">
                Задание 4
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
                Задание 5
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
                Задание 6
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
                Задание 7
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
                Задание 8
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
                Задание 9
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


@endsection