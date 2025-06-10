@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/task_bank.css">
@endsection

@section("main_content")
<body>
    <header class="topic_header ">
            <div class="header_left ">
                <div class="header_left_top ">
                    @isset($is_homework)
                        <h2 class="second_h">
                            Выберите прототипы {{ $taskoge->task_number }} задания для дз
                        </h2> 
                    @else
                        <h2 class="second_h">
                            Прототипы {{ $taskoge->task_number }} задания
                        </h2>
                    @endisset
                </div>
                <div class="header_left_bottom ">
                    {{ $taskoge->name }}
                </div>
            </div>
            <div class="header_right ">
                <!-- <a id="add_class_button" href="">
                    <div class="add_button" >
                        <div class="add_button_text"><span class="krest">&times;</span> ЗАКРЫТЬ ТЕСТ</div>                    
                    </div>
                </a> -->
            </div>
            <div class="test_controls">
                    @isset($is_homework)
                        <button class="end_button">Продолжить</button>
                    @else
                        <button class="end_button">Завершить</button>
                    @endisset
                    
            </div>
    </header>
    <main>
        <div class="main_wrapper"> 
            <form method="GET" action="{{ route('back_to_tasks_bank') }}">
                @php
                    $i = 1;
                @endphp

                @foreach($tasks as $task)
                    @if($loop->first)
                        @php
                            $i++;
                            continue;
                        @endphp
                    @endif
                    <div class="task-card">
                        @isset($is_homework)
                            <label class="task-checkbox">
                                <input type="checkbox" name="selected_tasks[]" value="{{ $task->task_id }}">
                            </label>
                        @endisset
                        <div class="task-content">
                            <p>Задание {{ $i-1 }}</p>
                            <img src="{{ $task->text }}" alt=""><br>
                            <input type="hidden" name="answer_{{ $task->task_id }}" value="{{ $task->answer }}">
                            @isset($is_homework)

                            @else
                                @if($taskoge->id >= 22)
                                    <form method="POST" action="{{ route('check.answer') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="task_id" value="{{ $task->task_id }}">
                                        <div class="upload-image-wrapper">
                                            <label for="image_{{ $task->task_id }}" class="upload-label">
                                                <div class="file-upload-wrapper">
                                                    <label for="image_{{ $task->task_id }}" class="custom-file-upload">
                                                        <div class="upload-box">
                                                            <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                                                            <p>Кликните или перетащите файл сюда</p>
                                                            <span class="upload-subtext">Поддерживаются все типы файлов</span>
                                                        </div>
                                                    </label>
                                                    <input id="image_{{ $task->task_id }}" type="file" name="answer_image" accept="image/*" required hidden>
                                                </div>
                                            </label>
                                        </div>
                                        <div id="upload-status-{{ $task->task_id }}" class="file_zagr" style="color: green; display: none; margin-top: 15px; margin-left: 210px;">
                                            Файл загружен
                                        </div>
                                        <div class="answer-row-image">
                                            <input class="answer_button" type="submit" name="submit_image" value="Проверить">
                                        </div>
                                    </form>

                                    @if(session('evaluation_result') && session('evaluation_result.task_id') == $task->task_id)
                                        <div class="upload-feedback">
                                            @if(session('evaluation_result.error'))
                                                <span style="color: red;">Ошибка: {{ session('evaluation_result.error') }}</span>
                                            @else
                                                <span class='ball'>Балл: {{ session('evaluation_result.score') ?? 'нет' }}<br>
                                                Комментарий: {{ session('evaluation_result.comment') ?? 'нет' }}</span>
                                            @endif
                                        </div>
                                    @endif

                                @else
                                    {{-- Стандартный блок с текстовым ответом и кнопкой "Ответить" --}}
                                    <form method="POST" action="{{ route('check.answer') }}">
                                        @csrf
                                        <input type="hidden" name="task_id" value="{{ $task->task_id }}">
                                        <div class="answer-row">
                                            <input type="text" name="student_answer" placeholder="Введите ответ... ">
                                            <input class="answer_button" type="submit" name="submit_answer" value="Ответить"> 
                                        </div>
                                    </form>
                                @endif
                            @endisset
                        </div>
                    </div>
                    @php    
                        $i++; 
                    @endphp       
                @endforeach
                @isset($is_homework)
                    <button class="end_button">Продолжить</button>
                @else
                    <button class="end_button">Завершить</button>
                @endisset
            </form>
        </div>                
    </main>
</body>

<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach($tasks as $task)
        const inputFile{{ $task->task_id }} = document.getElementById('image_{{ $task->task_id }}');
        const statusDiv{{ $task->task_id }} = document.getElementById('upload-status-{{ $task->task_id }}');

        if (inputFile{{ $task->task_id }}) {
            inputFile{{ $task->task_id }}.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    statusDiv{{ $task->task_id }}.style.display = 'block';
                } else {
                    statusDiv{{ $task->task_id }}.style.display = 'none';
                }
            });
        }
    @endforeach
});
</script>

@endsection