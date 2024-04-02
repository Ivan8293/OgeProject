<!DOCTYPE html>
<html lang="en">
<head>

    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Haven</title>
    <link rel="stylesheet" href="/css/style.css">  
    <link rel="stylesheet" href="/css/base_style.css">  
    <link rel="stylesheet" href="/css/task_page.css"> 
    <link rel="stylesheet" href="/css/parent_style.css"> 
    <link rel="stylesheet" href="/css/statistic.css">
    <link rel="stylesheet" href="/css/topics.css">
    <link rel="stylesheet" href="/css/topic_page.css">
    <link rel="stylesheet" href="/css/personal_page.css">

    <link rel="icon" href="/user_img/page_logo.png" type="image/x-icon">
</head>
<body>

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


    <header class="header">
        <div class="logo_parent_wrapper">
            <a class="logo-parent-a" href="{{route('topics')}}">
                <div class="logo_parent">
                    <span>Study Haven</span>
                </div>
            </a>
        </div>
        <div class="to_topics_button_wrapper">
            <a href="{{route('topics')}}">К темам</a>
        </div>
        @auth

        @else
            <div class="to_topics_button_wrapper">
                <a href="{{route('login')}}">Войти</a>
            </div>
        @endauth
        <div class="user_button" id="user_button">

        </div>
    </header>
    <main>
        <div class="left_menu" id="left_menu">
            <div class="closed_icon" id="closed_icon">
                <div class="closed_icon_line"></div>
                <div class="closed_icon_line"></div>
                <div class="closed_icon_line"></div>
            </div>
            <div style="display: none" class="left_menu_content_wrapper" id="left_menu_content_wrapper">
                <div class="left_menu_content" id="tasks">
                    <p>Темы</p>
                    @if (Session::has('topics_data') && Session::has('sub_topics_data'))
                        {{!$topics_data = session('topics_data')}}
                        {{!$sub_topics_data = session('sub_topics_data')}}
                    @endif
                    @foreach($topics_data as $topic)
                        <div class="topic">
                            <p>{{$topic->name}}</p>

                            @foreach($sub_topics_data as $sub_topic)
                                @if($topic->id == $sub_topic->topic_id)
                                    <p class="link-wrapper">
                                        <a href="{{route('getTopic', ['id' => $sub_topic->id])}}">{{$sub_topic->name}}</a>
                                    </p>
                                    <p class="link-wrapper">
                                        <a href="{{route('getTasks', ['sub_topic_id' => $sub_topic->id])}}">практика</a>
                                    </p>
                                @endif
                            @endforeach
                        </div>                        
                    @endforeach
                </div>
            </div>
        </div>
        <div class="main">
            @yield("content")
        </div>
    </main>
    <div class="user_info" id="user_info" style="display: none">
        <div  class="opening_menu_content_wrapper" id="opening_menu_content_wrapper">
            <div class="opening_menu_content" id="user_info">
                @auth
                    @if (isset(auth()->user()->name))
                        {{ auth()->user()->name }}
                    @endif
                    {{ auth()->user()->email }}
                @else
                    Привет, дорогой гость. Если нравится учиться с нами, ты можешь зарегистрироваться
                @endauth
            </div>
            <div class="opening_menu_content" id="good_functions">
                <a href="{{route('personal_account')}}">Личный кабинет</a><br>
                <a href="{{route('statistics')}}">Статистика</a><br>
                <a href="">Подписка</a><br>
            </div>
            <div class="opening_menu_content" id="business_card_menu">
                <a href="{{route('businessCard')}}">Страница визитка</a>
                @auth
                    <a href="{{route('logout')}}">Выйти</a>
                @else
                    <a href="{{route('login')}}">Войти</a>
                @endauth
            </div>

        </div>
    </div>
    <footer>

    </footer>

    <script src="\js\parent.js"></script>
</body>
</html>