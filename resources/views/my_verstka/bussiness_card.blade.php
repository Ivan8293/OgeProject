<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>card</title>
    <link rel="stylesheet" href="css/new_styles/bussiness_card_style.css">
</head>
<body class="buss_card_body ">
    <header class="buss_card_header ">
        <div class="header_left">
            <div class="header_logo_wrapper ">
                Study Haven
            </div>
            <div class="header_nav_wrapper ">
                <div class="header_nav_button_wrapper ">
                    Ученикам <span class="list_tris">&#9660;</span> 
                </div>
                <div class="header_nav_button_wrapper ">
                    Учителям <span class="list_tris">&#9660;</span> 
                </div>
                <div class="header_nav_button_wrapper ">
                    О нас <span class="list_tris">&#9660;</span> 
                </div>
            </div>
        </div>
        <div class="header_right">
            <div class="header_buttons">
                <a class="link_wrapper" href="{{ route('unregister_user') }}">
                    <div class="start_lern_wrapper ">
                        УЧИТЬСЯ БЕСПЛАТНО
                    </div>
                </a>
                <a class="link_wrapper" href="{{ route('login_student') }}">
                    <div class="login_wrapper">
                        ВОЙТИ
                    </div>
                </a>
            </div>
        </div>
    </header>
    <main>
        <div class="main_first_block">
            <div class="main_left ">
                <div class="main_text_wrapper ">
                    Начни подготовку прямо сейчас
                </div>
                <div class="second_text_wrapper ">
                    Хочешь основательно подготовиться к ОГЭ по математике, но не хочешь тратить огромное количество денег на репетиторов или онлайн-школы?
                </div>
                <a class="link_wrapper" href="{{ route('unregister_user') }}">
                    <div class="green_start_button_wrapper ">
                        НАЧАТЬ ПОДГОТОВКУ
                    </div>
                </a>
            </div>
            <div class="main_right ">
                
                <!-- relative decales -->         
                <div class="green_line">
                    <img class="img_green_line" src="./bussiness_card_img/1_line.svg" alt="">
                </div>
                <div class="star">
                    <img class="img_star" src="./bussiness_card_img/1_star.svg" alt="">
                </div>
                <div class="half_round">
                    <img class="img_half_round" src="./bussiness_card_img/1_half_round.svg" alt="">
                </div>
                <div class="round">
                    <img class="img_round" src="./bussiness_card_img/1_round.svg" alt="">
                </div>
                <div class="arrow">
                    <img class="img_arrow" src="./bussiness_card_img/1_arrow.svg" alt="">
                </div>
                

                <div class="grid_imgs_wrapper">                  
                    <div class="grid_img bor">

                    </div>

                    <div class="grid_img bor">

                    </div>

                    <div class="grid_img bor">

                    </div>

                    <div class="grid_img bor">

                    </div>   
                </div>                
            </div>
        </div>
    </main>
</body>
</html>