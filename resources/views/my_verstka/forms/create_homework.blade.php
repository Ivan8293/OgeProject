



@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/list_topic_style.css">
@endsection

@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Домашние работы
        </h2>
        
    </div>
    
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
            @csrf

            <h2 class="text-lg font-semibold mb-4">Создание домашней работы</h2>

            <!-- Название -->
            <div>
                <x-input-label for="title" :value="__('Название')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Описание -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Описание')" />
                <textarea id="description" name="description" rows="4" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Срок сдачи -->
            <div class="mt-4">
                <x-input-label for="due_date" :value="__('Срок сдачи')" />
                <x-text-input id="due_date" class="block mt-1 w-full" type="date" name="due_date" :value="old('due_date')" required />
                <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
            </div>



            

            <div class="flex items-center justify-end mt-4">
                
                
                <x-primary-button class="ml-3">
                    {{ __('Задать') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

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


</div>

@endsection