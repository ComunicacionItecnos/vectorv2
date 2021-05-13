@if (auth()->user()->role_id == 1 | auth()->user()->role_id == 3)
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-red-700">
        Generación de Contrato
    </h2>
</x-slot>

<div class="py-4 mx-auto">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

            <form wire:submit.prevent="createPDF">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="overflow-hidden shadow sm:rounded-md">

                        <div class="grid sm:grid-rows-3 p-3 gap-4">

                            <div class="grid sm:row-start-1 sm:grid-cols-4 gap-2">

                                <div class=" sm:col-span-2 sm:col-start-1">
                                    <label class="block text-sm font-black text-gray-700" for="inputSueldoNumero">Sueldo
                                        (número)</label>
                                    <input type="text" wire:model="sueldo" name="sueldoNumero" id="inputSueldoNumero"
                                        value="{{ old('sueldoNumero') }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('sueldo')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class=" sm:col-span-2 sm:col-start-3">
                                    <label class="block text-sm font-black text-gray-700" for="inputSueldoLetra">Sueldo
                                        (letra)</label>
                                    <input type="text" wire:model="sueldoLetra" name="sueldoLetra" id="inputSueldoLetra"
                                        value="{{ old('sueldoLetra') }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('sueldoLetra')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid sm:row-start-2 sm:grid-cols-4 gap-2">
                                @if($datosContrato[0]->tipo_contrato_id == 2)
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="inputFechaIngreso" class="block text-sm font-medium text-gray-700">Fecha
                                        de
                                        inicio</label>
                                    <input wire:model="fic" name="fic" id="inputFechaIngreso"
                                        type="date" value="{{ old('fic') }}" min="1961-08-29" max=""
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('fic')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{$message}}
                                    </p>
                                    @enderror
                                </div>
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="inputFechaIngreso" class="block text-sm font-medium text-gray-700">Fecha
                                        de
                                        finalización</label>
                                    <input wire:model="ffc" name="ffc" id="inputFechaIngreso"
                                        type="date" value="{{ old('ffc') }}" min="1961-08-29" max=""
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('ffc')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{$message}}
                                    </p>
                                    @enderror
                                </div>
                                @elseif($datosContrato[0]->tipo_contrato_id == 3)
                                <div class="col-span-1 sm:col-span-4">
                                    <label for="inputFechaIngreso" class="block text-sm font-medium text-gray-700">Fecha
                                        de
                                        inicio</label>
                                    <input wire:model="fic" name="fic" id="inputFechaIngreso"
                                        type="date" value="{{ old('fic') }}" min="1961-08-29" max=""
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('fic')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{$message}}
                                    </p>
                                    @enderror
                                </div>
                                @endif

                            </div>

                            <div class="grid sm:row-start-3 sm:grid-cols-3 gap-2">
                                <div class=" sm:col-span-3 sm:col-start-1">
                                    <label class="block text-sm font-black text-gray-700"
                                        for="inputDescripcionPuesto">Descripción del puesto </label>
                                    <textarea type="text" wire:model="descripcionPuesto" name="descripcionPuesto"
                                        id="inputDescripcionPuesto" value="{{ old('descripcionPuesto') }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                    @error('descripcionPuesto')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (auth()->user()->role_id == 1 | auth()->user()->role_id == 2 | auth()->user()->role_id == 3)
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6 flex justify-center sm:justify-end">
                        <button wire:click="createPDF" type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Generar contrato
                        </button>
                    </div>
                    @endif
                </div>
        </div>
        </form>
    </div>
</div>
</div>

@else
<h3 class="text-center text-4xl font-black ">
    Sal de aqui :p
</h3>
@endif