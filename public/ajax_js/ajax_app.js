console.log("открылся ajax_app");

$(document).on('submit', '#task_form', function(event) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/home/student/tasks/ajax_answer_check',
        type: 'GET',
        data: $(this).serialize(),
        success: function(response) {            
            
            console.log("response: " + response);

            task_id = response['task_id'];
            result = response['result'];

            indicator_task = document.getElementById("indicator_" + task_id);
            right_result_task = document.getElementById("right_result_" + task_id);
            wrong_result_task = document.getElementById("wrong_result_" + task_id);

            console.log("task_id = " + task_id);
            console.log("result = " + result);

            if (result){
                element.classList.remove("next");        
                element.classList.add("right");

                right_result_task.style.display = "block";
            }
            else{
                element.classList.remove("next");        
                element.classList.add("wrong");

                wrong_result_task.style.display = "block";
            }
        }
    });
});