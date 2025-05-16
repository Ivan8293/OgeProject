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
    @php
        $maxScores = [];
        foreach ($homeworks as $hw) {
            $maxScores[$hw->id_homework] = rand(10, 20);
        }
    @endphp
    @php
        if (!function_exists('pluralDays')) {
            function pluralDays($number) {
                $n = abs($number) % 100;
                $n1 = $n % 10;
                if ($n > 10 && $n < 20) return 'дней';
                if ($n1 > 1 && $n1 < 5) return 'дня';
                if ($n1 == 1) return 'день';
                return 'дней';
            }
        }
        @endphp

    <table class="styled-table">
    <thead>
        <tr>
            <th rowspan="2">
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
                    </span><br>
                    @php
                        $daysDiff = \Carbon\Carbon::parse($hw->finish_date)->diffInDays(now(), false);
                    @endphp
                    <span class="deadline">
                        @if ($daysDiff < 0)
                            До дедлайна осталось {{ abs($daysDiff) }} {{ pluralDays($daysDiff) }}
                        @elseif ($daysDiff === 0)
                            Сегодня дедлайн
                        @else
                            Дедлайн прошёл {{ $daysDiff }} {{ pluralDays($daysDiff) }} назад
                        @endif
                    </span>
                </th>
            @endforeach
        </tr>
        <tr>
            @foreach($homeworks as $hw)
                <th>
                    Макс. балл: {{ $maxScores[$hw->id_homework] }} <br>
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->display_name ?? $student->name }}</td>
                                @foreach($homeworks as $hw)
                                @php
                    $max = $maxScores[$hw->id_homework];
                    $value = rand(0, 100) < 30 ? 'н' : rand(1, $max);
                    $class = '';

                    if ($value === 'н') {
                        $class = 'mark-n';
                    } else {
                        $percent = ($value / $max) * 100;
                        if ($percent <= 25) {
                            $class = 'mark-lowest';
                        } elseif ($percent < 50) {
                            $class = 'mark-low';
                        } elseif ($percent < 75) {
                            $class = 'mark-medium';
                        } else {
                            $class = 'mark-high';
                        }
                    }
                @endphp
                <td class="{{ $class }}">
                    {{ $value }}
                </td>

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
