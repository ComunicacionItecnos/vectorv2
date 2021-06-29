<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <div class="grid grid-cols-4">
                                <div class=" col-span-1 flex px-2 py-2  border-t border-gray-200 sm:px-3 bg-white">
                                    <select wire:model='perPage'
                                        class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4">
                                        <option value="5">5 por página</option>
                                        <option value="10">10 por página</option>
                                        <option value="25">25 por página</option>
                                        <option value="50">50 por página</option>
                                        <option value="100">100 por página</option>
                                    </select>
                                    <button wire:click="export" type="button"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-green-600 border border-transparent
                                                                                    rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Excel
                                    </button>
                                </div>
                                <div class=" col-span-3 flex px-2 py-2  border-t border-gray-200 sm:px-3 bg-white">
                                    <input wire:model="search" type="text" placeholder="Buscar"
                                        class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </tr>
                        @if ($vehiculos->count())
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
                                    Placa
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    Datos del vehículo
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    Tipo de vehículo
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No. Marbete
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($vehiculos as $vehiculo)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                {{ $vehiculo->no_colaborador }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ $vehiculo->placa }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <p><a class="text-black">Marca:</a> {{ $vehiculo->marca }}</p>
                                <p><a class="text-black">Modelo:</a> {{ $vehiculo->modelo }}</p>
                                <p><a class="text-black">Año:</a> {{ $vehiculo->fecha_modelo }}</p>
                                <p><a class="text-black">Modelo:</a> {{ $vehiculo->color }}</p>
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap text-left text-sm text-gray-800">
                                {{ $vehiculo->tipo_vehiculo }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">
                                @if($vehiculo->tipo_vehiculo == 'Automóvil')
                                A-{{ $vehiculo->no_marbete }}
                                @else
                                M-{{ $vehiculo->no_marbete }}
                                @endif

                            </td>
                            <td>
                                <div class="flex justify-center py-4 cursor-pointer">
                                    <div class="transform text-red-500 hover:text-red-700 hover:scale-150">
                                        <a wire:click="triggerConfirm({{ $vehiculo->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $vehiculos->links() }}
                </div>
                @else
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    <h6 class="text-center text-gray-500">No se encontró a ningún campo que coincida con:
                        "{{ $search }}"</h6>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>