@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/stat_style.css">

    <link rel="stylesheet" href="/css/new_styles/stat_google_chart.css">

    <script>
        window.dataFromLaravel = { weeks_array: @json($weeks_array) };
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script src="/js/google_charts.js"></script>
@endsection




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

    
    <div id="active_time">
        <div class="active_time_week_container" style="display: flex; align-items: center;">
            <div id="prevBtn" style="width: 50px; height: 50px; cursov: pointer; border: 1px solid grey;"> < </div>
            <div id="chart_div" style="width: 900px; height: 500px;"></div>
            <div id="nextBtn" style="width: 50px; height: 50px; cursov: pointer; border: 1px solid grey;"> > </div>
        </div>

        <div id="avtive_time_month">

        </div>

        <div id="active_time_year">

        </div>
    </div>

    <div id="topic_levels">
        @php $i = 0; @endphp
        @foreach( $topic_levels as $topic_id => $level )

            @if ($i < 5)
                <a href="{{ route('open_topic', ['topic_id' => $topic_id]) }}">
                    <p>{{ $topics->firstWhere('topic_id', $topic_id)->name; }}</p>
                </a> 
                <p>- {{ $level }}%</p>
            @endif
            
            @php $i++; @endphp
        @endforeach
    </div>


    <div id="task_time">

    </div>
    
    <!-- <div class="list_of_items ">                        
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
        </div> -->
    </div>
</div>


@endsection