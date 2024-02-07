const stat_blocks = document.getElementsByClassName("stat_block");
const right_answers = document.getElementsByClassName("right_answer");
const answers = document.getElementsByClassName("answer");
const procent_values = document.getElementsByClassName("procent_value");

for(let i = 0; i < stat_blocks.length; i++){
    // посчитали процент правильно решенных задач по темам
    topic_value = parseInt(right_answers[i].value) / parseInt(answers[i].value);

    // теперь надо выставить длину html блока столько процентов, скольно 
    // процент выполнения заданий
    topic_value = topic_value.toFixed(2) * 100;
    stat_blocks[i].style.width = topic_value.toString() + "%";

    procent_values[i].innerHTML = topic_value.toString() + "%";
    
    // теперь в зависимости от процента надо задать цвет блоку
    // до 61 - красный
    // от 61 до 76 - ораньжевый
    // от 76 до 91 - желтый
    // более 91 - зеленый
    if (topic_value < 61){
        stat_blocks[i].style.backgroundColor = "red";
    }
    else if (topic_value >= 61 && topic_value < 76){
        stat_blocks[i].style.backgroundColor = "orange";
    }
    else if (topic_value >= 76 && topic_value < 91){
        stat_blocks[i].style.backgroundColor = "yellow";
    }
    else if (topic_value >= 91){
        stat_blocks[i].style.backgroundColor = "green";
    }
}