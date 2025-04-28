@extends("my_verstka.home")

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            ИНДИВИДУАЛЬНАЯ ТРАЕКТОРИЯ 
        </h2>
        <div class="section_name_wrapper">
            <span class="student_name">НАЗВАНИЕ ПЕРВОГО РАЗДЕЛА</span>
        </div>
    </div>
    
    <div class="trajectory_wrapper ">                      
        
    
        <div id="block_1" class="topic_block topic_block_done">
            Обыкновенные дроби. Арифметические действия над ними
        </div>
        <div id="block_2" class="topic_block topic_block_done">
            Десятичные дроби. Арифметические действия над ними
        </div>
        <div id="block_3" class="topic_block topic_block_current">
            Работа с координатной прямой
        </div>
        <div id="block_4" class="topic_block topic_block_current">
            Работа с числовыми промежутками простейшими неравенствами
        </div>
        <div id="block_5" class="topic_block topic_block_blocked">
            Степени. Свойства степеней
        </div>
        <div id="block_6" class="topic_block topic_block_blocked">
            Корни. Свойства корней
        </div>
        <div id="block_7" class="topic_block topic_block_special">
            Самостоятельная работа
        </div>



        <div id="arrow_1" class="topic_arrow_right">
            <img class="topic_arrow_right_img" src="/imgs/trajectory/arrow.png" alt="">
        </div>
        <div id="arrow_2" class="topic_arrow_top_input">
            <img class="topic_arrow_top_img" src="/imgs/trajectory/arrow_top.png" alt="">
        </div>
        <div id="arrow_3" class="topic_arrow_bottom_input">
            <img class="topic_arrow_bottom_img" src="/imgs/trajectory/arrow_bottom.png" alt="">
        </div>
        <div id="arrow_4" class="topic_arrow_top_output">
            <img class="topic_arrow_bottom_img" src="/imgs/trajectory/arrow_bottom.png" alt="">
        </div>
        <div id="arrow_5" class="topic_arrow_bottom_output">
            <img class="topic_arrow_bottom_img" src="/imgs/trajectory/arrow_top.png" alt="">
        </div>
        <div id="arrow_6" class="topic_arrow_right">
            <img class="topic_arrow_right_img" src="/imgs/trajectory/arrow.png" alt="">
        </div>
        <div id="arrow_7" class="topic_arrow_right">
            <img class="topic_arrow_right_img" src="/imgs/trajectory/arrow.png" alt="">
        </div>
        

    </div>
</div>


@endsection