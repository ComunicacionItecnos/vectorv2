<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

            <div class="grid grid-rows-2 grid-cols-2 m-2 ">

                <div class="col-span-2 row-span-1 ">
                    <label for="nombre_colaborador" class="block text-3xl font-medium text-gray-700">Módulo
                        multicontrato</label>
                </div>
                <div class="grid row-span-1 col-span-4 gap-2">
                    <div class="col-span-2 col-start-1 ">
                        <label for="selectNivel" class="block text-sm font-black text-gray-700">Puesto</label>
                        <select id="selectNivel" wire:model="puesto" name="puesto"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value=""></option>
                            <option value="111">Obrero en Capacitacion</option>
                            <option value="113">Obrero General A</option>
                            <option value="112">Obrero General B</option>
                            <option value="115">Obrero Universal A</option>
                            <option value="116">Obrero Universal B</option>
                            <option value="114">Obrero Universal C</option>
                        </select>
                        @error('puesto')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-span-2 col-start-3 ">
                        <label class="block text-sm font-black text-gray-700">Fecha de ingreso</label>
                        <input wire:model="fecha_ingreso" name="fecha_ingreso" id="inputFechaIngreso" type="date"
                            value="{{ old('fecha_ingreso') }}" min="1961-08-29" max=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('fecha_ingreso')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="grid row-span-1 col-span-4 gap-2">

                    <div class="col-span-2 col-start-1 ">
                        <label class="block text-sm font-black text-gray-700">Fecha de inicio</label>
                        <input wire:model="fic" name="fecha_inicio" id="inputInicio" type="date"
                            value="{{ old('fecha_inicio') }}" min="1961-08-29" max=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('fic')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-span-2 col-start-3 ">
                        <label class="block text-sm font-black text-gray-700">Fecha de termino</label>
                        <input wire:model="ffc" name="fecha_termino" id="inputFechaTermino" type="date"
                            value="{{ old('fecha_termino') }}" min="1961-08-29" max=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('ffc')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <div class="grid grid-cols-4">
                                <div class=" col-span-1 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                                    <select wire:model='perPage'
                                        class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4">
                                        <option value="5">5 por página</option>
                                        <option value="10">10 por página</option>
                                        <option value="25">25 por página</option>
                                        <option value="50">50 por página</option>
                                        <option value="100">100 por página</option>
                                    </select>
                                </div>
                            </div>
                        </tr>
                        @if ($colaboradores->count())
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex justify-center text-center">
                                    No. Colaborador
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    Nombre
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Operación
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($colaboradores as $colaborador)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                {{ $colaborador->no_colaborador }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $colaborador->nombre_1 }}
                                {{ $colaborador->ap_paterno }}
                            </td>
                            <td class="flex justify-items-center px-6 py-4 text-sm font-medium text-right
                                        whitespace-nowrap">
                                <button wire:click="descargarContrato({{ $colaborador->no_colaborador }})"
                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Descargar</button>
                            </td>
                        </tr>
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $colaboradores->links() }}
                </div>
                @else
                @endif
            </div>
        </div>
    </div>