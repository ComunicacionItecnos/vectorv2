<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-red-700">
            Gerente Unidad de Negocio
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-2">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <livewire:lista-super-u-n></livewire:lista-super-u-n>
            </div>
        </div>
    </div>
</x-app-layout>