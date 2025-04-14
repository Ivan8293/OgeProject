<x-guest-layout>
    @isset($class)
    <form method="POST" action="{{ route('update_class') }}">

        @csrf       

        <!-- name -->
        <div>
            <x-input-label for="name" :value="__('Название класса')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" value="{{ $class->name }}" name="name" required autofocus autocomplete="username" />
            
        </div>

        <!-- number -->
        <div>
            <x-input-label for="number" :value="__('Номер')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" value="{{ $class->number }}" name="number" required autofocus autocomplete="username" />
            
        </div>

        <input type="hidden" name="id" value="{{ $class->class_id }}">

        <div class="flex items-center justify-end mt-4">            
            
            <x-primary-button class="ml-3">
                ИЗМЕНИТЬ
            </x-primary-button>
        </div>
    </form>
    @endisset
</x-guest-layout>