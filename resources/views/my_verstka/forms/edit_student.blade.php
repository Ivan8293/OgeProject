







@extends("my_verstka.home")

@section("child_link")
    <link rel="stylesheet" href="/css/new_styles/class_student_style.css">
@endsection

@section('main_content')



<div class="main_wrapper bor">
    <div class="main_h">
        <h2 class="second_h">
            Изменить информацию об ученике {{ $class->name ?? "" }}
        </h2>
    </div>
    <x-guest-layout>
    <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
            @csrf

            <h2 class="text-lg font-semibold mb-4">Редактирование ученика</h2>
            <h3 class="text-md font-semibold mb-4">Логин: sten_ar</h3>

            <!-- Фамилия -->
            <div class="mt-4">
                <x-input-label for="surname" :value="__('Фамилия')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname', $student->surname ?? '')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <!-- Имя -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Имя')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $student->name ?? '')" required autocomplete="given-name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            

            <div class="flex items-center justify-end mt-4">
                
                
                <x-primary-button class="ml-3">
                    {{ __('Ок') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</div>


@endsection
