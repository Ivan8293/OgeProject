@extends("my_verstka.home")

@section("child_link")
<link rel="stylesheet" href="/css/new_styles/homework_params.css">
@endsection


@section("main_content")

<div class="container">
    <div class="left-panel" aria-label="Список изображений задач с окружностями">
        <div class="left_panel_h2">
            <h2>Выбранная тема: {{ $topic->name }}</h2>
            <h2>Выбранные задачи:</h2>
        </div>
        <div class="scroll_block">
            @foreach($tasks as $task)
            <img src="{{ $task->text }}">
            @endforeach

        </div>
    </div>

    <form class="right-panel" method="POST" action="{{ route('store_homework') }}">
        @csrf
        <h2>Создание домашней работы</h2>

        <label for="name">Название</label>
        <input type="text" id="name" name="name" placeholder="Введите название" required>

        <label for="description">Описание</label>
        <textarea id="description" name="description" placeholder="Введите описание" required></textarea>

        <label>Уровень сложности</label>
        <div class="radio-group" role="radiogroup" aria-labelledby="level-label">
            <label>
                <input type="radio" name="level" value="1">
                Легкий
            </label>
            <label>
                <input type="radio" name="level" value="2" checked>
                Средний
            </label>
            <label>
                <input type="radio" name="level" value="3">
                Сложный
            </label>
        </div>

        <button type="submit">СОЗДАТЬ</button>
    </form>
</div>
@endsection