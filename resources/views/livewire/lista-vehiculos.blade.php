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
                                        class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-2">
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
                                    @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <button wire:click="registrar" type="button"
                                        class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent
                                                                                                                                                                rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Nuevo
                                    </button>
                                    @endif

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
                                <div class="flex justify-start text-left">
                                    Colaborador
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
                            @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($vehiculos as $vehiculo)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                <div class="flex items-center">
                                    <div
                                        class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                        @if (file_exists(public_path('storage/' . $vehiculo->foto)))
                                        <img class="w-20 rounded shadow h-24"
                                            src="{{ asset('storage') . '/' . $vehiculo->foto }}" alt="">
                                        @else
                                        <img class="w-20 rounded shadow h-24"
                                            src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="ml-4 whitespace-pre-line">
                                        <div class="text-sm font-medium text-gray-900">
                                            <span class="sm:hidden"> {{ $vehiculo->id }}</span>
                                            <span class="sm:inline-block sm:-mt-6">{{ $vehiculo->nombre_1 }}
                                                {{ $vehiculo->ap_paterno }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <p><a class="text-black">Placa:</a> {{ $vehiculo->placa }}</p>
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
                            @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                            <td>
                                <div class="flex justify-center py-4 cursor-pointer">
                                    <div class="transform text-yellow-500 hover:text-yellow-700 hover:scale-150">
                                        <a wire:click="editar({{ $vehiculo->id  }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="transform text-red-500 hover:text-red-700 hover:scale-150">
                                        <a wire:click="triggerConfirm({{ $vehiculo->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            @endif
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
            <x-jet-dialog-modal wire:model="editbool">
                <x-slot name="title">
                    <p class="text-center text-2xl font-medium text-red-700">
                        @if ($banderaExiste == true)
                        Editar datos del vehículo
                        @else
                        Registrar datos
                        @endif
                    </p>
                </x-slot>

                <x-slot name="content">
                    @if ($banderaExiste == true)
                    @else
                    <div class="mt-4">
                        <label for="selectcolaborador" class="block text-sm 
                        @if ($banderaRegistro == true)
                            text-red-700 animate-bounce
                            @else
                            text-gray-700
                            @endif
                        ">
                            @if ($banderaRegistro == true)
                            Colaborador (Este colaborador ya está registrado, elige uno diferente)
                            @else
                            Colaborador
                            @endif

                        </label>
                        <select id="selectcolaborador" wire:model="ColaboradorRegistro" name="colaborador"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value=""></option>
                            @if (isset($colaboradores))
                            @foreach ($colaboradores as $colaborador)
                            <option value="{{ $colaborador->no_colaborador }}">
                                {{ $colaborador->ap_paterno }}
                                {{ $colaborador->ap_materno }}
                                {{ $colaborador->nombre_1 }}
                                {{ $colaborador->nombre_2 }}
                            </option>

                            @endforeach
                            @endif

                        </select>
                        @error('colaborador_registro')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    @endif
                    @if ($banderaRegistro == true)
                    
                    @else
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="inputTipoVehiculo">Tipo de
                            vehículo</label>
                        <select id="inputTipoVehiculo" wire:model="tipo_vehiculo" name="tipo_vehiculo"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option></option>
                            @if ($tiposVehiculo)
                            @foreach ($tiposVehiculo as $tipo)
                            <option value="{{ $tipo->id }}">
                                {{ $tipo->nombre }}
                            </option>
                            @endforeach
                            @else
                            @endif
                        </select>
                        @error('tipo_vehiculo')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="inputPlaca">Placa</label>
                        <input type="text" wire:model="placa" name="placa" id="inputPlaca" value="{{ old('placa') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('placa')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="inputMarca">Marca</label>
                        <input type="text" wire:model="marca" name="marca" id="inputMarca" value="{{ old('marca') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('marca')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mt-4">
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
                    <div class="mt-4">
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
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="inputColor">Color</label>
                        <input type="text" wire:model="color" name="color" id="inputColor" value="{{ old('color') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('color')
                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    @endif
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="setNull()">
                        {{ __('Cerrar') }}
                    </x-jet-secondary-button>

                    @if ($banderaRegistro == true)
                    @else
                    <x-jet-button class="ml-2" wire:click="acciones" wire:loading.attr="disabled">
                        @if ($banderaExiste == true)
                        {{ __('Actualizar') }}
                        @else
                        {{ __('Registrar') }}
                        @endif
                    </x-jet-button>
                    @endif
                </x-slot>
            </x-jet-dialog-modal>
        </div>
    </div>
</div>