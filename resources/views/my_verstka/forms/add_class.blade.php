@extends("my_verstka.home")


@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/classes_style.css">
@endsection


@section("main_content")
<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Классы
        </h2>
        <div class="add_button_wrapper">

        </div>
    </div>
    
    
    <x-guest-layout class="bg-white">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('store_class') }}">
            @csrf

            <h2 class="text-lg font-semibold mb-4">Создать класс</h2>

            <!-- Название -->
            <div>
                <x-input-label for="name" :value="__('Название')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            

            <div class="flex items-center justify-end mt-4">
                
                
                <x-primary-button class="ml-3">
                    {{ __('Создать') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

</div>
@endsection
