<x-guest-layout>
    
    <form method="POST" action="{{ route('store_class') }}">

        @csrf       

        <!-- name -->
        <div>
            <x-input-label for="name" :value="__('Название класса')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="username" />
            
        </div>

        <!-- number -->
        <div>
            <x-input-label for="number" :value="__('Номер')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" required autofocus autocomplete="username" />
            
        </div>

        <div class="flex items-center justify-end mt-4">            
            
            <x-primary-button class="ml-3">
                СОЗДАТЬ
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>