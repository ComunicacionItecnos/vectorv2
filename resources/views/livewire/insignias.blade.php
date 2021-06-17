<div class="py-4 mx-auto">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="grid sm:grid-cols-4 sm:grid-rows-1 gap-2">
                        <div class="col-span-3">
                            <x-slot name="header">
                                <h2 class="text-xl font-semibold leading-tight text-red-700">
                                    Asignador de Insignias
                                </h2>
                            </x-slot>
                            <form wire:submit.prevent="asignacion">
                                <div class="grid grid-rows-1 grid-cols-3 gap-2 bg-blue-100">
                                    <div class="row-span-2 col-span-1 bg-red-100">
                                        <div
                                            class="mx-auto mt-20 rounded opacity-100 flex-grow-0 flex-shrink-0 w-32 h-36 border-2 shadow-sm">

                                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                                            <img class="w-32 rounded shadow h-36"
                                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                                            @else
                                            <img class="w-32 rounded shadow h-36"
                                                src="{{ asset('images/user_toolkit.jpg') }}" alt="">

                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-rows-3 grid-cols-2 col-span-2 col-start-2 p-8 gap-2 bg-green-100">
                                        <div class="row-span-1 col-span-1 col-start-1 row-start-1  h-32 pt-5">
                                            <label for="selectSupervisor"
                                                class="block text-sm font-black text-gray-700">Nombre</label>
                                            <select id="selectSupervisor" wire:model="col_premiado" name="supervisor"
                                                disabled
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value=""></option>
                                                <option value="1">Ninguno</option>
                                                @if (isset($premiados))
                                                @foreach ($premiados as $premiado)
                                                <option value="{{ $premiado->no_colaborador }}">
                                                    {{ $premiado->ap_paterno }}
                                                    {{ $premiado->ap_materno }}
                                                    {{ $premiado->nombre_1 }}
                                                    {{ $premiado->nombre_2 }}
                                                </option>

                                                @endforeach
                                                @endif

                                            </select>
                                            @error('col_premiado')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="row-span-1 col-span-1 row-start-1 col-start-2 h-32 pt-5">
                                            <label for="inputInsignia"
                                                class="block text-sm font-black text-gray-700">Seleccionar
                                                insignia</label>
                                            <select id="inputInsignia" wire:model="tipo_insignia" name="tipo_insignia"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value=""></option>
                                                <option value="1">Oro ({{ $finalOro }})</option>
                                                <option value="2">Plata ({{ $finalPlata }})</option>
                                                <option value="3">Bronce ({{ $finalBronce }})</option>
                                            </select>
                                            <a wire:click="popupInsignia()"
                                                class="mt-1 mb-1 text-xs text-blue-600 italic hover:text-red-600 cursor-pointer">
                                                ¿Qué son las insignias?
                                            </a>
                                            @error('tipo_insignia')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="row-span-1 col-span-1 row-start-2 col-start-1 h-32 pt-5">
                                            <label for="inputValor"
                                                class="block text-sm font-black text-gray-700">Seleccionar valor</label>
                                            <select id="inputValor" wire:model="valor_business" name="valor_business"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value=""></option>
                                                @if (isset($valores))
                                                @foreach ($valores as $valor)
                                                <option value="{{ $valor->id }}">
                                                    {{ $valor->nombre }}
                                                </option>

                                                @endforeach
                                                @endif
                                            </select>
                                            @error('valor_business')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="row-span-1 col-span-1 row-start-2 col-start-2 h-32 pt-1">
                                            <label for="textAreaMensaje"
                                                class="block text-sm font-black text-gray-700">Mensaje de
                                                retroalimentación</label>
                                            <textarea id="textAreaMensaje" name="mensaje" wire:model="mensaje"
                                                class="overflow-y-auto resize-none p-4 w-full rounded-md"></textarea>
                                            @error('mensaje')
                                            <p class="mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="row-span-1 col-span-3 row-start-3 h-32">
                                            <div
                                                class="px-4 py-3 text-right sm:px-6 flex justify-center sm:justify-end">
                                                <button wire:click="asignacion" type="submit"
                                                    class="inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                    Asignar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-span-1 flex flex-col h-screen">
                            <div class="flex-grow overflow-auto">
                                <table class="relative w-full border">
                                    <thead>
                                        <tr>
                                            <th class="sticky top-0 px-6 py-3 text-gray-700 bg-gray-300">Colaboradores
                                                premiados</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y bg-gray-100">
                                        @foreach ($colaboradores as $colaborador)
                                        <tr>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center">
                                                    <div
                                                        class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                                        @if (file_exists(public_path('storage/' . $colaborador->foto)))
                                                        <img class="w-20 rounded shadow h-24"
                                                            src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                            alt="">
                                                        @else
                                                        <img class="w-20 rounded shadow h-24"
                                                            src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="ml-4 whitespace-pre-line">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            <span class="sm:hidden">
                                                                {{ $colaborador->no_colaborador_premiado }}</span>
                                                            <span
                                                                class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                                                {{ $colaborador->ap_paterno }}</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-16 h-20">
                                                        <img class="px-4 mt-8 mx-2"
                                                            src="{{ asset($colaborador->ruta_insignia) }}" alt="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="popupInsignia">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">

            <div class="mt-4 ml-3">
                <img src="{{ asset('images/Descripcion-Insignias.png') }}" alt="">
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="setNull()" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>