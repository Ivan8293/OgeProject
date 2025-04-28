<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Домашняя страница</title>
    <link rel="stylesheet" href="/css/new_styles/home_style.css">
    <link rel="stylesheet" href="/css/new_styles/trajectory_style.css">
    <link rel="stylesheet" href="/css/new_styles/stat_style.css">

</head>
<body>
    <div class="global_wrapper bor">
        <nav class="nav_bar bor">
            <div class="logo_wrapper">
                <h1 class="logo_text round_text">Study Haven</h1>
            </div>

            <div class="login_wrapper">
                <p class="login">
                    @if (Auth::guard('student')->check())
                        {{ Auth::guard('student')->user()->login }}
                    @elseif (Auth::guard('teacher')->check())
                        {{ Auth::guard('teacher')->user()->login }}
                    @else
                        Добро пожаловать
                    @endif
                </p>
            </div>
            <div class="buttons_list_wrapper">
                @yield("teacher_student_nav")
                @yield("common_nav")
            </div>
        </nav>


        <div class="global_main">
            <div class="main bor">
                <div class="main_container bor">
                    <header class="header bor">
                        <!-- <div class="header_button">
                            <div class="header_icon_wrapper">
    
                            </div>
                        </div>
                        <div class="header_button">
                            <div class="header_icon_wrapper">
                                
                            </div>
                        </div> -->
                        @if (Auth::guard('student')->check() || Auth::guard('teacher')->check())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                
                                <input class="logout_button" type="submit" value="ВЫХОД">
                                    <!-- <div class="logout_button">
                                        ВЫХОД
                                    </div> -->
                            </form>
                        @else
                            <a class="link_wrapper" href="{{ route('login_student') }}">
                                <div class="login_button_wrapper">
                                    ВОЙТИ
                                </div>
                            </a>
                        @endif


                    </header>
                    @yield("home_main")
                </div>
                <div class="footer bor">
                    <h2 class="logo_footer_text round_text">Study Haven</h2>
                </div>
            </div>
        </div>
        
    </div>      
</body>
</html>