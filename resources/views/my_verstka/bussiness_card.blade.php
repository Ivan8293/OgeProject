<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Haven</title>
    <link rel="stylesheet" href="css/new_styles/bussiness_card_style.css">
</head>
<body class="buss_card_body">
    <header class="buss_card_header">
        <div class="header_left">
            <div class="header_logo_wrapper">Study Haven</div>
            <nav class="header_nav_wrapper">
                <div class="header_nav_button_wrapper">Ученикам <span class="list_tris"></span></div>
                <div class="header_nav_button_wrapper">Учителям <span class="list_tris"></span></div>
                <div class="header_nav_button_wrapper">О нас <span class="list_tris"></span></div>
            </nav>
        </div>
        <div class="header_right">
            <div class="header_buttons">
                <a class="link_wrapper" href="{{ route('unregister_user') }}">
                    <div class="start_lern_wrapper">УЧИТЬСЯ БЕСПЛАТНО</div>
                </a>
                <a class="link_wrapper" href="{{ route('login_student') }}">
                    <div class="login_wrapper">ВОЙТИ</div>
                </a>
            </div>
        </div>
    </header>
    <main>
        <section class="main_first_block">
            <div class="main_left">
                <h1 class="main_text_wrapper">Начни подготовку прямо сейчас</h1>
                <p class="second_text_wrapper">
                    Хочешь основательно подготовиться к ОГЭ по математике, но не хочешь тратить огромное количество денег на репетиторов или онлайн-школы?
                </p>
                <a class="link_wrapper" href="{{ route('unregister_user') }}">
                    <button class="green_start_button_wrapper">НАЧАТЬ ПОДГОТОВКУ</button>
                </a>
            </div>
            <div class="main_right">
                <div class="decorations">
                </div>
                <div class="grid_imgs_wrapper">
                    <div class="grid_img"><img src="image/img5.PNG" alt=""></div>
                    <div class="grid_img"><img src="image/img22.PNG" alt=""></div>
                    <div class="grid_img"><img src="image/img4.PNG" alt=""></div>
                    <div class="grid_img"><img src="image/img3.PNG" alt=""></div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
