<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <a href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-25 mx-auto w-25">
    </a>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        
        <div>
            <x-jet-label for="no_colaborador" value="{{ __('Numero de colaborador') }}" />
            <x-jet-input id="no_colaborador" wire:model="no_colaborador" class="block w-full mt-1" type="text" name="no_colaborador"
                :value="old('no_colaborador')" required autofocus />
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-jet-button wire:click="comprueba" class="mx-auto">
                {{ __('Comprobar') }}
            </x-jet-button>
        </div>
    </div>
</div>