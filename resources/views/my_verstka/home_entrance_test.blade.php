@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/entrance_test.css">
@endsection


@section("main_content")
<div class="main_h">
        <h2 class="second_h">
        Твоя умная подготовка к ОГЭ
        </h2>
</div>
<div class="intro_section">
    <div class="intro_content">
        <div class="trajectory_card">
            <p><span class="highlight">Начинай учиться с нами!</span> <br> Вместо дорогих репетиторов и скучных уроков — индивидуальный план занятий
            с <span class="highlight">“Виртуальным репетитором”</span>. 
            <br> Программа обучения  создаётся индивидуально под тебя. <br> <span class="highlight">Быстро, удобно и результативно.</span></p>
            <ul class="intro_bullets">
                <li>✔ Персональный подход</li>
                <li>✔ Заметная экономия времени и денег</li>
                <li>✔ Доступная подача учебного материала</li>
            </ul>
        </div>
        <a href="#" class="start_button">
            <span>Пройти диагностику</span>
        </a>
    </div>
    <div class="intro_image">
        <img src="/image/traectory.png" alt="Иллюстрация обучения">
    </div>
</div>
@endsection

