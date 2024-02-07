<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="\css\base_style.css">
    <link rel="stylesheet" href="\css\business_card.css">
</head>
<body>
    <header class="first_header frame">
        <div class="header-menu-wrapper frame">
            <div class="logo-wrapper">
                <div class="logo-text-wrapper">
                    <span>Study Haven</span>
                </div>                
            </div>
            <div class="menu-wrapper frame">
                <div class="simple-button">
                    <a href="#content_about">О нас</a>
                </div>
                <div class="simple-button">
                    <a href="#teachers">Преподаватели</a>
                </div>
                <div class="simple-button">
                    <a href="#reviews">Отзывы</a>
                </div>
                <div class="simple-button">
                    <a href="#subscription">Подписка</a>
                </div>
            </div>
            <div class="go-to-topics-wrapper frame">
                <div class="menu-button-wrapper">
                    <a href="{{route('topics')}}">Перейти к задачам</a>
                </div>   
                @auth 
                <div class="menu-button-wrapper">
                    <a href="{{route('logout')}}">Выйти</a>                  
                </div> 
                @else
                <div class="menu-button-wrapper">
                    <a href="{{route('login')}}">Войти</a>
                </div> 
                @endauth
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper frame">
            <div class="first_card" id="content_about">
                <h3>Начни подготовку прямо сейчас</h3>
                <span>Волнуешься по поводу экзаменов? Хочешь основательно подготовиться к сдаче ОГЭ, но не хочешь тратить огромное количество денег на репетиторов или онлайн-школы? Начни подготовку прямо сейчас</span><br>
                <button class="big-button"><a>Попробовать бесплатно</a></button>
            </div>
            <div class="first_card" id="teachers">
                Инфа о лучших преподах в мире
            </div>
            <div class="tmp_class_costil_edition" id="reviews">
                Реальные отзывы
            </div>
            <div class="tmp_class_costil_edition" id="subscription">
                Вы можете приобрести подписку<br>
                <button><a>Купить</a></button>
            </div>
        </div>
    </main>
    <footer class="footer">
        footer
    </footer>
</body>
</html>