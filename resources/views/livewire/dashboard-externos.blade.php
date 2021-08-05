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
                                    <button wire:click="registrar" type="button"
                                        class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent
                                                                                                                        rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Nuevo
                                    </button>
                                </div>
                                <div class=" col-span-3 flex px-2 py-2  border-t border-gray-200 sm:px-3 bg-white">
                                    <input wire:model="search" type="text" placeholder="Buscar"
                                        class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </tr>
                        @if ($externos->count())
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex justify-start text-left">
                                    Nombre
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    Tipo
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    Area y Supervisor
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    Datos personales
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($externos as $externo)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                <div class="flex items-center">
                                    <div
                                        class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                        @if (file_exists(public_path('storage/' . $externo->foto)))
                                        <img class="w-20 rounded shadow h-24"
                                            src="{{ asset('storage') . '/' . $externo->foto }}" alt="">
                                        @else
                                        <img class="w-20 rounded shadow h-24"
                                            src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="ml-4 whitespace-pre-line">
                                        <div class="text-sm font-medium text-gray-900">
                                            <span class="sm:hidden"> {{ $externo->id }}</span>
                                            <span class="sm:inline-block sm:-mt-6">{{ $externo->nombre_1 }}
                                                {{ $externo->ap_paterno }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ $externo->tipo_externo }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <p><a class="text-black">{{ $externo->area }}</a></p>
                                <p> {{ $externo->supervisor }}</p>
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap text-left text-sm text-gray-800">
                                <p><a class="text-black">Genero:</a> {{ $externo->genero }}</p>
                                <p><a class="text-black">CURP:</a> {{ $externo->curp }}</p>
                                <p><a class="text-black">RFC:</a> {{ $externo->rfc }}</p>
                                <p><a class="text-black">Teléfono:</a> {{ $externo->tel_contacto }}</p>
                            </td>
                            <td>
                                <div class="flex justify-center py-4 cursor-pointer">
                                    <div class="transform text-yellow-500 hover:text-yellow-700 hover:scale-150">
                                        <a wire:click="editar({{ $externo->id  }})">
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
                                        <a wire:click="triggerConfirm({{ $externo->id }})">
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
                        </tr>
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $externos->links() }}
                </div>
                @else
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    <h6 class="text-center text-gray-500">No se encontró a ningún campo que coincida con:
                        "{{ $search }}"</h6>
                </div>
                @endif
            </div>

            <x-jet-dialog-modal wire:model="modal">
                <x-slot name="title">
                    @if ($createbool == true)
                    Nuevo colaborador externo
                    @elseif($editbool == true)
                    Editar datos
                    @endif
                </x-slot>

                <x-slot name="content">
                    <div class="grid gap-2">

                        {{-- Col 1 Foto --}}
                        <div class=" text-white">
                            <div class="py-4 sm:px-3">

                                @if($banderaImagen == true)
                                <div>
                                    @if ($foto)
                                    <img src="{{ $foto->temporaryUrl() }}"
                                        class="mx-auto rounded-xl border-2 shadow-xl w-38 h-48">
                                    @else

                                    @if (file_exists(public_path('storage/' . $colaborador->foto)))
                                    <img class="mx-auto rounded-xl border-2 shadow-xl w-38 h-48"
                                        src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                                    @else
                                    <img class="mx-auto rounded-xl border-2 shadow-xl w-38 h-48"
                                        src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                    @endif
                                    @endif
                                </div>
                                @else
                                <div>
                                    @if ($foto)
                                    <img src="{{ $foto->temporaryUrl() }}"
                                        class="mx-auto rounded-xl border-2 shadow-xl w-38 h-48">
                                    @else
                                    <img class="mx-auto rounded-xl border-2 shadow-xl w-38 h-48"
                                        src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                    @endif
                                </div>
                                @endif


                                @if ((auth()->user()->role_id == 1) | (auth()->user()->role_id == 2) |
                                (auth()->user()->role_id == 3))
                                <div class="grid sm:grid-rows-2 grid-cols-1 sm:gap-2 mx-auto w-36 sm:w-38">
                                    @if ($bandera == true)
                                    <div class="sm:row-start-1 sm:row-span-1 sm:col-start-1 sm:col-span-1">
                                        <button wire:click="downloadImage" type="button"
                                            class="flex w-36 md:w-full flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-green-800 uppercase bg-white border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-green-500 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="sm:row-start-2 sm:row-span-1 sm:col-start-1 sm:col-span-1">
                                        <label
                                            class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                            </svg>
                                            <input type='file' wire:model="foto" class="hidden" />
                                        </label>
                                        @error('foto')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    @else
                                    <div class="sm:row-start-1 sm:row-span-1 sm:col-start-1 sm:col-span-1">
                                        <label
                                            class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                            </svg>
                                            <input type='file' wire:model="foto" class="hidden" />
                                        </label>
                                        @error('foto')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    @endif


                                </div>
                                @else

                                <div class="grid grid-rows-1 grid-cols-2 gap-2">

                                    <button wire:click="downloadImage" type="button"
                                        class="flex flex-col col-span-2 items-center px-4 py-2 mt-1 tracking-wide text-green-800 uppercase bg-white border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-green-500 hover:text-white">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="m17.601 10.707c-.483-.604-1.1-.996-1.852-1.175.237-.358.356-.757.356-1.197 0-.613-.217-1.136-.65-1.57-.434-.434-.957-.65-1.57-.65-.549 0-1.029.179-1.439.538-.341-.833-.886-1.5-1.635-2.003-.749-.503-1.574-.755-2.476-.755-1.226 0-2.272.434-3.139 1.301-.867.867-1.301 1.914-1.301 3.139 0 .075.006 .199.017 .373-.682.318-1.226.795-1.63 1.431-.405.636-.607 1.33-.607 2.081 0 1.07.38 1.984 1.14 2.745.76 .76 1.675 1.141 2.745 1.141h9.436c.919 0 1.704-.325 2.354-.976.65-.65.976-1.435.976-2.355 0-.775-.242-1.464-.724-2.068zm-4.913.334-3.044 3.044c-.052.052-.118.078-.199.078-.081 0-.147-.026-.199-.078l-3.053-3.053c-.052-.052-.078-.118-.078-.199 0-.075.027-.14.082-.195.055-.055.12-.082.195-.082h1.943v-3.053c0-.075.027-.14.082-.195.055-.055.12-.082.195-.082h1.665c.075 0 .14.027 .195.082 .055.055 .082.12 .082.195v3.053h1.943c.081 0 .147.026 .199.078 .052.052 .078.118 .078.199 0 .07-.029.139-.086.208z" />
                                        </svg>
                                    </button>

                                </div>

                                @endif

                            </div>
                        </div>

                        {{-- Col 2-3-4 Primera parte del formulario --}}

                        <div class="sm:row-start-1 sm:row-span-1 sm:col-start-2 sm:col-span-3 p-3 my-auto">
                            <div class="grid grid-rows-4 sm:gap-4">
                                <div class="sm:row-start-1 sm:row-span-1 sm:col-start-1 sm:col-span-3">
                                    <div class="sm:grid sm:grid-rows-1 sm:grid-cols-3 sm:gap-2">
                                        <div class="sm:col-span-1 sm:col-start-1 mb-3">
                                            <label for="inputTipoCol"
                                                class="block text-sm font-black text-gray-700">Tipo
                                                de
                                                Externo</label>
                                            <select id="inputTipoExt" wire:model="tipo_externo" name="tipo_externo"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option></option>
                                                @if ($tiposExterno)
                                                @foreach ($tiposExterno as $t_externo)
                                                <option value="{{ $t_externo->id }}">
                                                    {{ $t_externo->tipo }}
                                                </option>
                                                @endforeach
                                                @else
                                                @endif

                                            </select>
                                            @error('tipo_externo')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-1 mb-3 sm:col-start-2">
                                            <label for="inputNombre"
                                                class="block text-sm font-black text-gray-700">Primer nombre</label>
                                            <input type="text" wire:model="nombre_1" name="nombre" id="inputNombre"
                                                value="{{ old('nombre_1') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('nombre_1')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-1 mb-3 sm:col-start-3">
                                            <label for="inputNombre"
                                                class="block text-sm font-black text-gray-700">Segundo
                                                nombre</label>
                                            <input type="text" wire:model="nombre_2" name="nombre" id="inputNombre"
                                                value="{{ old('nombre_2') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('nombre_2')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:row-start-2 sm:row-span-1 sm:col-start-1 sm:col-span-3">
                                    <div class="sm:grid sm:grid-rows-1 sm:grid-cols-3 sm:gap-2">
                                        <div class="sm:col-span-1 mb-3 sm:col-start-1">
                                            <label for="inputApPaterno"
                                                class="block text-sm font-black text-gray-700">Apellido
                                                Paterno</label>
                                            <input type="text" wire:model="ap_paterno" name="ap_paterno"
                                                id="inputApPaterno" value="{{ old('ap_paterno') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('ap_paterno')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-1 mb-3 sm:col-start-2">
                                            <label for="inputApMaterno"
                                                class="block text-sm font-black text-gray-700">Apellido
                                                Materno</label>
                                            <input type="text" wire:model="ap_materno" name="ap_materno"
                                                id="inputApMaterno" value="{{ old('ap_materno') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('ap_materno')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-1 mb-3 sm:col-start-3">
                                            <label for="inputGenero"
                                                class="block text-sm font-black text-gray-700">Género</label>
                                            <select id="inputGenero" wire:model="genero" name="genero"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option></option>
                                                @if ($generos)
                                                @foreach ($generos as $genero)
                                                <option value="{{ $genero->id }}">
                                                    {{ $genero->nombre_genero }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('genero')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:row-start-3 sm:row-span-1 sm:col-start-1 sm:col-span-3">
                                    <div class="sm:grid sm:grid-rows-1 sm:grid-cols-3 sm:gap-2">
                                        <div class="sm:col-span-1 mb-3 sm:col-start-1">
                                            <label for="inputFechaNacimiento"
                                                class="block text-sm font-black text-gray-700">Fecha de
                                                nacimiento</label>
                                            <input wire:model="fecha_nacimiento" name="fecha_nacimiento"
                                                id="inputFechaNacimiento" type="date"
                                                value="{{ old('fecha_nacimiento') }}" min="1961-08-29" max=""
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('fecha_nacimiento')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-1 mb-3 sm:col-start-2">
                                            <label for="selectArea"
                                                class="block text-sm font-black text-gray-700">Área</label>
                                            <select id="selectArea" wire:model="area" name="area"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option></option>
                                                @if (isset($areas))
                                                @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->nombre_area }}
                                                </option>
                                                @endforeach
                                                @endif

                                            </select>
                                            @error('area')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-1 mb-3 sm:col-start-3">
                                            <label for="selectSupervisor"
                                                class="block text-sm font-black text-gray-700">Supervisor</label>
                                            <select id="selectSupervisor" wire:model="supervisor" name="supervisor"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value=""></option>
                                                <option value="1">Ninguno</option>
                                                @if (isset($supervisores))
                                                @foreach ($supervisores as $supervisor)
                                                <option value="{{ $supervisor->no_colaborador }}">
                                                    {{ $supervisor->ap_paterno }}
                                                    {{ $supervisor->ap_materno }}
                                                    {{ $supervisor->nombre_1 }}
                                                    {{ $supervisor->nombre_2 }}
                                                </option>
                                                @endforeach
                                                @endif

                                            </select>
                                            @error('supervisor')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="sm:row-start-4 sm:row-span-1 sm:col-start-1 sm:col-span-3">
                                    <div class="sm:grid sm:grid-rows-1 sm:grid-cols-3 sm:gap-2">
                                        <div class="sm:col-span-1 mb-3 sm:col-start-1">
                                            <label class="block text-sm font-black text-gray-700"
                                                for="inputCurp">CURP</label>
                                            <input type="text" wire:model="curp" name="curp" id="inputCurp"
                                                value="{{ old('curp') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('curp')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-1 mb-3 sm:col-start-2">
                                            <label class="block text-sm font-black text-gray-700"
                                                for="inputRfc">RFC</label>
                                            <input type="text" wire:model="rfc" name="rfc" id="inputRfc"
                                                value="{{ old('rfc') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('rfc')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-1 mb-3 sm:col-start-3">
                                            <label class="block text-sm font-black text-gray-700" for="inputTel">Tel.
                                                Contacto</label>
                                            <input type="text" wire:model="tel_contacto" name="tel_contacto"
                                                id="inputTel" value="{{ old('rfc') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('tel_contacto')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="setNull" wire:loading.attr="disabled">
                        Cerrar
                    </x-jet-secondary-button>

                    @if ($createbool == true)
                    <x-jet-danger-button class="ml-2" wire:click="registra" wire:loading.attr="disabled">
                        Registrar
                    </x-jet-danger-button>
                    @elseif($editbool == true)
                    <x-jet-danger-button class="ml-2" wire:click="actualiza({{$colaborador->id}})" wire:loading.attr="disabled">
                        Actualizar
                    </x-jet-danger-button>
                    @endif
                </x-slot>
            </x-jet-dialog-modal>

        </div>
    </div>
</div>