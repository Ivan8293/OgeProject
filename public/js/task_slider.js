document.addEventListener('DOMContentLoaded', function() {
    const backButtons = document.getElementsByClassName("back_button");
    const nextButtons = document.getElementsByClassName("next_button");
    const tasks = document.getElementsByClassName("tasks");

    console.log(backButtons.length - 1);

    function back_button_event(i){
        tasks[i].style.display = "none";
        tasks[i - 1].style.display = "block";

        console.log("нажата кнопка 'назад': " + i)
    }

    function next_button_event(i){
        tasks[i].style.display = "none";
        tasks[i + 1].style.display = "block";

        console.log("нажата кнопка 'вперед': " + i)
    }

    // выставим изначальное состояние страницы, 
    // когда пользователь только  открыл её
    tasks[0].style.display = "block";
    for (let i = 1; i < tasks.length; i++){
        tasks[i].style.display = "none";
    }
    // backButtons[0].style.display = "none"
    // nextButtons[nextButtons.length - 1].style.display = "none"

    // создадим события на кнопки Назад и Далее
    // и напишем что происходит при их нажатии
    for(let i = 0; i < backButtons.length; i++){




        if (i == 0){
            console.log("зашли в 1")

            nextButtons[i].addEventListener("click", function(){
                next_button_event(i)
            });
        }
        else if (i > 0 && i < backButtons.length - 1){

            console.log("зашли в 2")

            backButtons[i].addEventListener("click", function(){
                back_button_event(i)
            });
            nextButtons[i].addEventListener("click", function(){
                next_button_event(i)
            });
        }
        else if (i == backButtons.length - 1){
            console.log("зашли в 3")

            backButtons[i].addEventListener("click", function(){
                back_button_event(i)
            });
        }       
        
    }

    


});