<div class="sm:p-8 p-2 mx-auto my-auto bg-white">

    <div class="p-2 grid grid-rows-1 rounded-md shadow-2xl">
        <div class="p-2 grid">
            <div class="mb-2">
                <p class="antialiased text-left text-gray-700 font-semibold text-xl">
                    Paquete {{ $paquetes->nombre_paquete }}
                </p>
            </div>
            <div class="grid gap-2">
                <div class="sm:grid row-start-1 grid-cols-4 gap-2">
                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">

                        <div class="grid grid-rows-1 h-80 w-full mb-4">
                            <div class="row-start-1 col-start-1 p-4">
                                <div class="h-full w-full rounded-lg shadow-lg">
                                    <img class="h-full w-full rounded-lg shadow-lg"
                                        src="https://resources.sears.com.mx/medios-plazavip/fotos/productos_sears1/340x260/3144242.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div class="row-start-1 col-start-1">
                                <div class="grid grid-rows-5 grid-cols-4 h-80 w-full">
                                    <div
                                        class="mx-auto row-start-3 col-start-1 transform border-0 hover:text-red-700 hover:scale-130 opacity-50 hover:opacity-100">
                                        <button class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div
                                        class="mx-auto row-start-3 col-start-4 transform border-0 hover:text-red-700 hover:scale-130 opacity-50 hover:opacity-100">
                                        <button class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="inputTipoVehiculo" class="block text-xl font-medium text-gray-700">
                                Talla
                            </label>
                            <select id="inputTipoVehiculo" wire:model="tipo_vehiculo" name="tipo_vehiculo"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('tipo_vehiculo')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        @if($banderaPrueba == true)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                            <label class="block text-sm font-medium text-gray-700" for="inputPlaca">Placa</label>
                            <input type="text" wire:model="placa" name="placa" id="inputPlaca"
                                value="{{ old('placa') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('placa')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                            <label class="block text-sm font-medium text-gray-700" for="inputMarca">Marca</label>
                            <input type="text" wire:model="marca" name="marca" id="inputMarca"
                                value="{{ old('marca') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('marca')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                            <label class="block text-sm font-medium text-gray-700" for="inputModelo">Modelo</label>
                            <input type="text" wire:model="modelo" name="modelo" id="inputModelo"
                                value="{{ old('modelo') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('modelo')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-4">
                            <label class="block text-sm font-medium text-gray-700" for="inputFechaModelo">Año</label>
                            <input type="text" wire:model="fecha_modelo" name="fecha_modelo" id="inputFechaModelo"
                                value="{{ old('fecha_modelo') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('fecha_modelo')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="sm:grid row-start-2 grid-cols-4 gap-2">
                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                <label class="block text-sm font-medium text-gray-700" for="inputColor">Color</label>
                                <input type="text" wire:model="color" name="color" id="inputColor"
                                    value="{{ old('color') }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('color')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        @endif
                </div>
            </div>
        </div>
        <div class="mt-4 h-16 p-2 grid grid-cols-2">
            <div class="flex justify-start px-4 col-span-1 col-start-1">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Regresar
                </button>
                {{-- <a href="https://factoraguila.com/blog/2021/07/20/aviso-importante-estacionamiento/"
                        class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Regresar</a> --}}
            </div>
            <div class="flex justify-end px-4 col-span-1 col-start-2">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Siguiente
                </button>
                {{-- <button type="submit" wire:submit.prevent="acciones"
                        class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-red-900 focus:outline-none focus:border-green-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        @if($banderaExiste == true)
                        Actualizar
                        @else
                        Registrar
                        @endif</button> --}}
            </div>
        </div>
    </div>
    </form>
    {{-- <x-jet-dialog-modal wire:model="popupRegistro">
        <x-slot name="title">
            <p class="text-center text-2xl font-medium text-red-700">
                Registro realizado exitosamente
            </p>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4 ml-3">
                <p class="text-center text-xl font-medium text-gray-700">
                    El número asignado de tu marbete es:
                    @if($tipo_vehiculo)
                    @if($tipo_vehiculo == 1)
                    @if($m_info)
                    A-{{ $m_info[0]->numero }}
    @endif
    @else
    @if($m_info)
    M-{{ $m_info[0]->numero }}
    @endif
    @endif <br><br>
    @endif
    <p>
        La entrega de marbetes e imanes será en un horario de 08:00 A.M a 07:00 P.M en caseta de
        vigilancia con Mariana Garcia.
    </p>
    <br>
    Si te has equivocado puedes modificar los datos que ingresaste
    o puedes volver a Factor con el botón "Regresar".
    </p>
</div>
</x-slot>

<x-slot name="footer">
    <x-jet-secondary-button wire:click="setNull()">
        {{ __('Cerrar') }}
    </x-jet-secondary-button>
</x-slot>
</x-jet-dialog-modal> --}}
</div>