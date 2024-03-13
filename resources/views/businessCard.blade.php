<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();
    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(96727431, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
    });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/96727431" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

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
                <a class="munu-button-warpper-a" href="{{route('topics')}}">
                    <div class="menu-button-wrapper">
                        <span>Перейти к задачам</span>
                    </div> 
                </a>                  
                @auth 
                <a class="munu-button-warpper-a" href="{{route('logout')}}">
                    <div class="menu-button-wrapper">
                        <span>Выйти</span>                  
                    </div> 
                </a>
                @else
                <a class="munu-button-warpper-a" href="{{route('login')}}">
                    <div class="menu-button-wrapper">
                        <span>Войти</span>
                    </div> 
                </a>
                @endauth
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper frame">
            <div class="first_card" id="content_about">
                <h3>Начни подготовку прямо сейчас</h3>
                <span>Хочешь основательно подготовиться к сдаче ОГЭ по математике, но не хочешь тратить огромное количество денег на репетиторов или онлайн-школы? Начни подготовку прямо сейчас</span><br>
                <a class="big-button-a" href="{{route('topics')}}"><button class="big-button">Попробовать бесплатно</button></a>
            </div>
            <!-- <div class="first_card" id="teachers">
                Инфа о лучших преподах в мире
            </div>
            <div class="tmp_class_costil_edition" id="reviews">
                Реальные отзывы
            </div>
            <div class="tmp_class_costil_edition" id="subscription">
                Вы можете приобрести подписку<br>
                <button><a>Купить</a></button>
            </div> -->
        </div>
    </main>
    <footer class="footer">
        <div class="footer-logo footer-block">
            Study Haven
        </div>
        <div class="footer-content-1  footer-block">
            <p><a href="#content_about">О нас</a></p>
            <p><a href="#teachers">Преподаватели</a></p>
            <p><a href="#reviews">Отзывы</a></p>
            <p><a href="#subscription">Подписка</a></p>
        </div>
    </footer>
</body>
</html>