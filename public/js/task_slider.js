const backButtons = document.getElementsByClassName("back_button");
const nextButtons = document.getElementsByClassName("next_button");
const tasks = document.getElementsByClassName("tasks");

console.log(tasks);

// выставим изначальное состояние страницы, 
// когда пользователь только  открыл её
tasks[0].style.display = "block";
for (let i = 1; i < tasks.length; i++){
    tasks[i].style.display = "none";
}
backButtons[0].disabled = true;
nextButtons[nextButtons.length - 1].disabled = true

// создадим события на кнопки Назад и Далее
// и напишем что происходит при их нажатии
for(let i = 0; i < backButtons.length; i++){
    backButtons[i].addEventListener("click", function(){
        tasks[i].style.display = "none";
        tasks[i - 1].style.display = "block";
    });

    nextButtons[i].addEventListener("click", function(){
        tasks[i].style.display = "none";
        tasks[i + 1].style.display = "block";
    });
}