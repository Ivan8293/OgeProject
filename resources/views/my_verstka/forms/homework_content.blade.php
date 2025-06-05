<x-guest-layout>

        <!-- Session Status -->
        <x-auth-session-status  class="mb-4" :status="session('status')" />
        @csrf

        <div class="border rounded-md p-4 flex flex-col max-w-3xl" style="height:600px; width:900px;">
            <h2 class="text-lg font-semibold mb-4 flex-shrink-0">
                Тема: {{ $topicTitle ?? 'Вписанные и описанные окружности' }}
            </h2>

            <div class="flex-1 overflow-y-auto">
                @php $i = 1; @endphp
                @foreach($tasks as $task)
                    @if($loop->first)
                        @php
                            $i++;
                            continue;
                        @endphp
                    @endif
                    <div class="task-card flex items-start space-x-3 mb-4 p-3 border rounded-md">
                        <div class="task-content flex flex-col">
                            <p class="font-medium mb-2">Задание {{ $i - 1 }}</p>
                            <img src="{{ $task->text }}" alt="Задание {{ $i - 1 }}" class="mb-2 max-w-xs" />
                            <input type="hidden" name="answer_{{ $task->task_id }}" value="{{ $task->answer }}" />
                        </div>
                    </div>
                    @php $i++; @endphp
                @endforeach
            </div>
        </div>


</x-guest-layout>
