<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Домашняя страница</title>

    <link rel="stylesheet" href="/css/new_styles/home_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
    @yield("link")
</head>
<body>
    <div class="global_wrapper">
        <!-- Бургер-кнопка -->
        <button class="burger" onclick="toggleMenu()">☰</button>

        <!-- Навигационное меню -->
        <nav class="nav_bar" id="sideMenu">
            <div class="logo_wrapper">
                <h1 class="logo_text round_text">STUDY HAVEN</h1>
                <header class="header bor">
                        @if (Auth::guard('student')->check() || Auth::guard('teacher')->check())
                            <a href="{{ route('logout') }}" class="icon_button" title="Выйти">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        @endif
                </header>
            </div>

            <div class="login_wrapper">
                <p class="login">
                    @if (Auth::guard('student')->check())
                        <i class="fa fa-user-circle"></i>
                        {{ Auth::guard('student')->user()->login }}
                    @elseif (Auth::guard('teacher')->check())
                    <i class="fa fa-user-circle"></i>
                        {{ Auth::guard('teacher')->user()->login }}
                    @else
                        <div class="button_container bor">
                            <div class="button_icon_container bor">
                            <i class="fa fa-user-circle"></i>
                            </div>
                            <div class="button_text_container bor">
                                <a href="{{ route('login_student') }}" class="icon_button" title="Войти">
                                Войти
                                </a>
                            </div>
                    @endif
                </p>
            </div>

            <div class="buttons_list_wrapper">
                @yield("teacher_student_nav")
                @yield("common_nav")
            </div>
        </nav>

        <!-- Основной контент -->
        <div class="global_main">
            <div class="main">
                <div class="main_container">
                    @yield("home_main")
                </div>
                
            </div>
        </div>
    </div>

    <!-- Скрипт для мобильного меню -->
    <script>
        function toggleMenu() {
            document.getElementById('sideMenu').classList.toggle('mobile_open');
        }
    </script>
</body>
</html>
