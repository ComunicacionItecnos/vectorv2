<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-red-700">
            @if (auth()->user()->role_id == 1)
                Super usuario
            @elseif (auth()->user()->role_id == 2)
                Comunicación
            @elseif (auth()->user()->role_id == 3)
                Administración
            @elseif (auth()->user()->role_id == 4)
                Relaciones laborales
            @elseif (auth()->user()->role_id == 5)
                Reclutamiento y selección
            @elseif (auth()->user()->role_id == 6)
                Seguridad patrimonial
            @elseif (auth()->user()->role_id == 7)
                Servicio médico
            @endif
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <livewire:colaboradores-tabla></livewire:colaboradores-tabla>
            </div>
        </div>
    </div>
</x-app-layout>
