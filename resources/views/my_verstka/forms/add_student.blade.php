



@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/class_student_style.css">
@endsection

@section('main_content')



<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Добавить ученика в класс {{ $class->name ?? "" }}
        </h2>
    </div>
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('add_student_to_class') }}">
            @csrf

            <h2 class="text-lg font-semibold mb-4">Добавление ученика</h2>

            <input type="hidden" name="class_id" value="{{ $class->class_id }}">
            <!-- Логин -->
            <div>
                <x-input-label for="login" :value="__('Логин')" />
                <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('login')" class="mt-2" />
            </div>

            <!-- Фамилия -->
            <div class="mt-4">
                <x-input-label for="surname" :value="__('Фамилия')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <!-- Имя -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Имя')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="given-name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>



            

            <div class="flex items-center justify-end mt-4">
                
                
                <x-primary-button class="ml-3">
                    {{ __('Добавить') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</div>


@endsection
