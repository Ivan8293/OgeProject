const left_menu = document.getElementById("left_menu");
const menu_button = document.getElementById("closed_icon");
const menu_content = document.getElementById("left_menu_content_wrapper");

const user_button = document.getElementById("user_button");
const user_menu = document.getElementById("user_info");

let menu_press_count = 0;
let user_press_count = 0;

// Добавляем обработчик события клика на документ
document.addEventListener('click', function(event) {
    if (menu_press_count % 2 != 0){
        const isClickInsideTriggerBlock = menu_button.contains(event.target);
        const isClickInsideDropdownMenu = left_menu.contains(event.target);

        const isClickInsideTriggerBlock_menu = user_button.contains(event.target);
        const isClickInsideDropdownMenu_menu = user_menu.contains(event.target);

        // Проверяем, было ли совершено нажатие вне блока и выпадающего окна
        if (!isClickInsideTriggerBlock && !isClickInsideDropdownMenu &&
            !isClickInsideTriggerBlock_menu && !isClickInsideDropdownMenu_menu) {
            left_menu.style.width = "50px";
            menu_content.style.display = "none";

            menu_press_count++;
        }
    }
});

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


document.addEventListener('click', function(event) {
    if (user_press_count % 2 != 0){
        const isClickInsideTriggerBlock = user_button.contains(event.target);
        const isClickInsideDropdownMenu = user_menu.contains(event.target);

        const isClickInsideTriggerBlock_left = menu_button.contains(event.target);
        const isClickInsideDropdownMenu_left = left_menu.contains(event.target);

        // Проверяем, было ли совершено нажатие вне блока и выпадающего окна
        if (!isClickInsideTriggerBlock && !isClickInsideDropdownMenu &&
            !isClickInsideTriggerBlock_left && !isClickInsideDropdownMenu_left) {
            user_menu.style.display = "none";
            console.log("Закрыл меню")
            user_press_count++;
        }
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

