$(document).on('submit', '#task_form', function(event) {
    event.preventDefault();
    
    $.ajax({
        url: 'ajax_answer_check',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            
            task_id = response['task_id'];
            result = response['result'];

            console.log("task_id = " + task_id);
            console.log("result = " + result);

            // right_answer = document.getElementById("right_answer_" + id);
            // false_answer = document.getElementById("false_answer_" + id);
            // task_video = document.getElementById("task_video_" + id);
            // task_check = document.getElementById("task_check_" + id);

            // // изначально скроем все элементы, если вдруг они уже были включены
            // right_answer.style.display = 'none';
            // false_answer.style.display = 'none';
            // task_video.style.display = 'none';
            // task_check.style.backgroundColor = "grey";

            // // теперь уже проверим какой у нас ответ и что мы с этим результатом делаем
            // if (result == true){
            //     right_answer.style.display = 'block';
            //     false_answer.style.display = 'none';
            //     task_video.style.display = 'block';
            //     task_check.style.backgroundColor = "green";
            // }
            // else{
            //     right_answer.style.display = 'none';
            //     false_answer.style.display = 'block';
            //     task_video.style.display = 'block';
            //     task_check.style.backgroundColor = "red";
            // }
        }
    });
});