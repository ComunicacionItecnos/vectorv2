<x-slot name="header">
    <h2 class="text-center text-xl font-semibold leading-tight text-red-700">
        Asignador de Insignias
    </h2>
</x-slot>
<div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg ">
            <form wire:submit.prevent="asignacion">
                <div class="grid grid-cols-3 p-4">
                    <div class="col-span-2 sm:col-start-1 col-start-2">
                        <a href="https://factoraguila.com"
                            class="inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-red-800 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Volver a Factor
                        </a>
                    </div>

                </div>
                <div class="grid grid-rows-1 sm:grid-cols-4 gap-4 p-4">
                    <div class="row-start-1 sm:row-start-1 sm:col-start-1">
                        <div
                            class="mx-auto mt-6 rounded opacity-100 flex-grow-0 flex-shrink-0 w-28 h-34 border-2 shadow-sm">

                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                            <img class="w-28 rounded shadow h-34"
                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                            @else
                            <img class="w-28 rounded shadow h-34" src="{{ asset('images/user_toolkit.jpg') }}" alt="">

                            @endif
                        </div>
                    </div>
                    <div class="row-start-2 sm:row-start-1 sm:col-start-2">
                        <div class="grid grid-rows-2 gap-2">
                            <div class="col-span-1">
                                <label for="selectSupervisor"
                                    class="block text-sm font-black text-gray-700">Nombre</label>
                                <select id="selectSupervisor" wire:model="col_premiado" name="supervisor" disabled
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
                                    @else
                                    @endif

                                </select>
                                @error('col_premiado')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            @if(auth()->user()->colaborador_no_colaborador == '135050')
                            <div class="col-span1">
                                <label for="inputInsignia" class="block text-sm font-black text-gray-700">Seleccionar
                                    insignia</label>
                                <select id="inputInsignia" wire:model="tipo_insignia" name="tipo_insignia"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value=""></option>
                                    <option value="1">Platino ({{ $finalPlatino }})</option>
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
                            @else
                            <div class="col-span1">
                                <label for="inputInsignia" class="block text-sm font-black text-gray-700">Seleccionar
                                    insignia</label>
                                <select id="inputInsignia" wire:model="tipo_insignia" name="tipo_insignia"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value=""></option>
                                    <option value="2">Oro ({{ $finalOro }})</option>
                                    <option value="3">Plata ({{ $finalPlata }})</option>
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
                            @endif
                        </div>
                    </div>
                    <div class="row-start-3 sm:row-start-1 sm:col-start-3">
                        <div class="grid grid-rows-2 gap-2">
                            <div class="col-span-1">
                                <label for="inputValor" class="block text-sm font-black text-gray-700">Seleccionar
                                    valor</label>
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
                            <div class="col-span-1 -mt-1">
                                <label for="textAreaMensaje" class="block text-sm font-black text-gray-700">Mensaje de
                                    retroalimentación</label>
                                <textarea id="textAreaMensaje" name="mensaje" wire:model="mensaje"
                                    class="overflow-y-auto resize-none w-full rounded-md"></textarea>
                                @error('mensaje')
                                <p class="mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="px-4 py-3 text-right sm:px-6 flex justify-center sm:justify-end">
                                <button @if($switchButton == true) disabled @else @endif wire:click="asignacion" type="submit"
                                    class="@if($switchButton == true) cursor-not-allowed @else @endif disabled:opacity-20 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Asignar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row-start-4 sm:row-start-1 sm:col-start-4">
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
                                                class="rounded  opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                                @if (file_exists(public_path('storage/' . $colaborador->foto)))
                                                <img class="w-20 rounded shadow h-24"
                                                    src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                                                @else
                                                <img class="w-20 rounded shadow h-24"
                                                    src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                                @endif
                                            </div>
                                            <div class="ml-4 whitespace-pre-line">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                                        {{ $colaborador->ap_paterno }}</span>
                                                </div>
                                            </div>
                                            <div class=" opacity-100 flex-grow-0 flex-shrink-0 w-16 h-20">
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
            </form>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="popupInsignia">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            @if (auth()->user()->colaborador_no_colaborador == '135050')
            <div class="mt-4 ml-3 p-2">
                <img src="{{ asset('images/Descripcion_insignias/Platino_Descripcion_Correct.png') }}" alt="">
            </div>
            @else
            <div class="mt-4 ml-3 p-2">
                <img src="{{ asset('images/Descripcion_insignias/Oro_Descripcion_Correct.png') }}" alt="">
            </div>
            <div class="mt-4 ml-3 p-2">
                <img src="{{ asset('images/Descripcion_insignias/Plata_Descripcion_Correct.png') }}" alt="">
            </div>
            <div class="mt-4 ml-3 p-2">
                <img src="{{ asset('images/Descripcion_insignias/Bronce_Descripcion_Correct.png') }}" alt="">
            </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="setNull()" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>