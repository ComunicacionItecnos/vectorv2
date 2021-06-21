<div class="sm:p-8 p-2 mx-auto bg-gray-100">
    <header class="bg-white rounded-md shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-red-700">
                Registro vehicular para uso del estacionamiento
            </h2>
        </div>
    </header>

    <form wire:submit.prevent="registro">

        <div class="p-4 mt-4 grid grid-rows-1 rounded-md shadow-2xl">
            <div class="p-4 grid">
                <div class="mt-4 mb-4 bg-red-800 ">
                    <p class="text-center text-gray-50 text-xl">
                        Datos del vehículo
                    </p>
                </div>
                <div class="grid gap-2">
                    <div class="sm:grid row-start-1 grid-cols-4 gap-2">
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                            <label for="inputTipoCol" class="block text-sm font-medium text-gray-700">Tipo
                                de
                                Vehículo</label>
                            <select id="inputTipoCol" wire:model="tipo_colaborador" name="tipo_colaborador"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if($tiposVehiculo)
                                @foreach ($tiposVehiculo as $t_colaborador)
                                <option value="{{ $t_colaborador->id }}">
                                    {{ $t_colaborador->nombre_tipo }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            @error('tipo_colaborador')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                            <label class="block text-sm font-medium text-gray-700" for="inputDireccion">Placa</label>
                            <input type="text" wire:model="direccion" name="direccion" id="inputDireccion"
                                value="{{ old('direccion') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('direccion')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                            <label class="block text-sm font-medium text-gray-700" for="inputColonia">Marca</label>
                            <input type="text" wire:model="colonia" name="colonia" id="inputColonia"
                                value="{{ old('colonia') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('colonia')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                            <label class="block text-sm font-medium text-gray-700" for="inputMunicipio">Modelo</label>
                            <input type="text" wire:model="municipio" name="municipio" id="inputMunicipio"
                                value="{{ old('municipio') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('municipio')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-4">
                            <label class="block text-sm font-medium text-gray-700" for="inputEstado">Año</label>
                            <input type="text" wire:model="estado" name="estado" id="inputEstado"
                                value="{{ old('estado') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('estado')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:grid row-start-2 grid-cols-4 gap-2">
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                            <label class="block text-sm font-medium text-gray-700" for="inputCodigoPostal">Color</label>
                            <input type="text" wire:model="codigo_postal" name="codigo_postal" id="inputCodigoPostal"
                                value="{{ old('codigo_postal') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('codigo_postal')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-16 p-4 grid grid-cols-2">
                <div class="flex justify-start px-4 col-span-1 col-start-1">
                    <a href="https://factoraguila.com/"
                        class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Regresar</a>
                </div>
                <div class="flex justify-end px-4 col-span-1 col-start-2">
                    <button wire:click="registro" type="submit"
                        class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-red-900 focus:outline-none focus:border-green-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Registrar</button>
                </div>
            </div>
        </div>
    </form>

</div>