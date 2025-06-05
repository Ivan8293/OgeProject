@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/classes_style.css">
@endsection


@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Срок сдачи домашней работы
        </h2>
        <div class="add_button_wrapper">

        </div>
    </div>
    
    
    <x-guest-layout class="bg-white">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('update_deadline', ['class_id' => $class_id, 'homework_id' => $homework_id]) }}">
            @csrf

            <!-- Название -->
            <div>
                <x-input-label for="dealline" :value="__('Срок сдачи')" />
                <x-text-input id="dealline" class="block mt-1 w-full" type="date" name="dealline" :value="old('dealline')" required autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('dealline')" class="mt-2" />
            </div>            

            <div class="flex items-center justify-end mt-4">
                
                
                <x-primary-button class="ml-3">
                    {{ __('Задать') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

</div>
@endsection