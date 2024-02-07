const left_menu = document.getElementById("left_menu");
const menu_button = document.getElementById("closed_icon");
const menu_content = document.getElementById("left_menu_content_wrapper");

const user_button = document.getElementById("user_button");
const user_menu = document.getElementById("user_info");

let menu_press_count = 0;
let user_press_count = 0;

// создадим событие на нажатие кнопки левого меню
menu_button.addEventListener("click", function(){
    // если нажимаем на кнопку, чтобы открыть меню
    menu_press_count++;

    if (menu_press_count % 2 != 0){
        left_menu.style.width = "350px";
        menu_content.style.display = "block";
    }
    else{
        left_menu.style.width = "50px";
        menu_content.style.display = "none";
    }
});

// кнопка пользователя
user_button.addEventListener("click", function(){
    // если нажимаем на кнопку, чтобы открыть меню
    user_press_count++;
    console.log("нажал на юзер меню");
    console.log(user_press_count);    

    if (user_press_count % 2 != 0){
        console.log("открыл меню");
        user_menu.style.display = "block";
    }
    else{
        console.log("Закрыл меню");
        user_menu.style.display = "none";
    }
});

