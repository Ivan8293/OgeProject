@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/class_student_style.css">
@endsection

@section('main_content')
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Ученики класса {{ $class->name }}
        </h2>
    </div>
    <div class="class-controls">
    <div class="left-controls">
        <button class="action-button plus">
            <i class="fas fa-tasks"></i> Выдать ДЗ
        </button>
    </div>
    <div class="right-controls">
        <button class="action-button warning">
            <i class="fas fa-exclamation-triangle"></i> Ученики зоны риска
        </button>
        <button class="action-button">
            <i class="fas fa-user-plus"></i> Добавить ученика
        </button>
        <button class="action-button danger">
            <i class="fas fa-user-minus"></i> Удалить ученика
        </button>
    </div>
</div>

    <div class="table-wrapper">
    <table class="styled-table">
        <thead>
            <tr>
                <th>
                    Ученик
                    <span class="sort-buttons">
                        <button class="sort-button" onclick="sortTable(0, 'asc')">&#9650;</button>
                        <button class="sort-button" onclick="sortTable(0, 'desc')">&#9660;</button>
                    </span>
                </th>
                @foreach($homeworks as $hw)
                    <th>
                        ДЗ №{{ $hw->id_homework }}
                        <span class="sort-buttons">
                            <button class="sort-button" onclick="sortTable({{ $loop->index + 1 }}, 'asc')">&#9650;</button>
                            <button class="sort-button" onclick="sortTable({{ $loop->index + 1 }}, 'desc')">&#9660;</button>
                        </span> <br>
                        <span class="deadline">Дедлайн до {{ $hw->finish_date }} </span>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->display_name ?? $student->name }}</td>
                    @foreach($homeworks as $hw)
                        <td>н</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
function sortTable(colIndex, direction) {
    const table = document.querySelector(".styled-table");
    const tbody = table.querySelector("tbody");
    const rows = Array.from(tbody.querySelectorAll("tr"));

    const sorted = rows.sort((a, b) => {
        const aText = a.children[colIndex].innerText.trim();
        const bText = b.children[colIndex].innerText.trim();

        return direction === "asc"
            ? aText.localeCompare(bText, 'ru', { numeric: true })
            : bText.localeCompare(aText, 'ru', { numeric: true });
    });

    tbody.innerHTML = "";
    sorted.forEach(row => tbody.appendChild(row));
}
</script>

@endsection
