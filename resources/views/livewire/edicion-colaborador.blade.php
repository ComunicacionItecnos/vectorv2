@if (auth()->user()->role_id != 6)
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-red-700">
        Información del colaborador
    </h2>
</x-slot>

<div class="py-4 mx-auto">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

            <form wire:submit.prevent="update">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="overflow-hidden shadow sm:rounded-md">

                        {{-- Primera seccion Foto y parte del formulario --}}

                        <div class="grid sm:grid-cols-4 sm:grid-rows-1 gap-2">

                            {{-- Col 1 Foto --}}
                            <div class="sm:row-start-1 sm:row-span-1 sm:col-start-1 sm: col-span-1 text-white">
                                <div class="py-4 sm:px-3">
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

                                    @if ((auth()->user()->role_id == 1) | (auth()->user()->role_id == 2) |
                                    (auth()->user()->role_id == 3))
                                    <div class="grid sm:grid-rows-2 grid-cols-1 sm:gap-2 mx-auto w-36 sm:w-38">

                                        <div class="sm:row-start-1 sm:row-span-1 sm:col-start-1 sm:col-span-1">
                                            <button wire:click="downloadImage" type="button"
                                                class="flex w-36 md:w-full flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-green-800 uppercase bg-white border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-green-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="sm:row-start-2 sm:row-span-1 sm:col-start-1 sm:col-span-1">
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="foto" class="hidden" />
                                            </label>
                                        </div>
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
                                                    Col.</label>
                                                <select id="inputTipoCol" wire:model="tipo_colaborador"
                                                    name="tipo_colaborador"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    @foreach ($tiposColaborador as $t_colaborador)
                                                    <option value="{{ $t_colaborador->id }}">
                                                        {{ $t_colaborador->nombre_tipo }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('tipo_colaborador')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="sm:col-span-1 mb-3 sm:col-start-2">
                                                <label for="inputNoColaborador"
                                                    class="block text-sm font-black text-gray-700">No.
                                                    Colaborador</label>
                                                <input type="text" wire:model="no_colaborador" name="no_colaborador"
                                                    id="inputNoColaborador" disabled value="{{ old('no_colaborador') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @error('no_colaborador')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="sm:col-span-1 mb-3 sm:col-start-3">
                                                <label for="inputNombre"
                                                    class="block text-sm font-black text-gray-700">Nombre(s)</label>
                                                <input type="text" wire:model="nombre" name="nombre" id="inputNombre"
                                                    value="{{ old('nombre') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @error('nombre')
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
                                                <label for="edoCivil"
                                                    class="block text-sm font-black text-gray-700">Estado
                                                    civil</label>
                                                <select wire:model="estado_civil" id="edoCivil" name="edoCivil"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    @if ($estadosCivil)
                                                    @foreach ($estadosCivil as $estadoCivil)
                                                    <option value="{{ $estadoCivil->id }}">
                                                        {{ $estadoCivil->nombre_estado }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @error('estado_civil')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="sm:col-span-1 mb-3 sm:col-start-3">
                                                <label class="block text-sm font-black text-gray-700"
                                                    for="inputNo_seguro_docial">No.
                                                    Seguro
                                                    Social</label>
                                                <input type="text" wire:model="no_seguro_social" name="no_seguro_social"
                                                    id="inputno_seguro_social" value="{{ old('no_seguro_social') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @error('no_seguro_social')
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
                                                <label for="inputHijos"
                                                    class="block text-sm font-black text-gray-700">¿Tiene
                                                    Hijos?</label>
                                                <select wire:model="paternidad" id="inputHijos" name="paternidad"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                                @error('paternidad')
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

                        {{-- Segunda seccion, tabla de hijos --}}

                        <div id="tablaHijos" class="grid mt-4 mb-4 p-4" @if (($paternidad=='' ) | (($paternidad=='0' ) |
                            (auth()->user()->role_id ==
                            2) | (auth()->user()->role_id
                            == 4) | (auth()->user()->role_id == 5) | (auth()->user()->role_id == 7)))
                            style="display: none" @else
                            @endif>

                            <div class="block mb-3 text-sm font-black text-gray-700">
                                <h5>Hijo(s)</h5>
                            </div>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                            <table name="tablaHijos" class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50" id="th_hijos">
                                                    <tr class="">
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-black tracking-wider text-left text-gray-500 uppercase">
                                                            Edad</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-black tracking-wider text-left text-gray-500 uppercase">
                                                            Escolaridad</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_hijos">
                                                    <tr>
                                                        <td><input type="text" wire:model="edad_hijo1"
                                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>

                                                        <td>
                                                            <select id="escolaridad_hijo" wire:model="escolaridad_hijo1"
                                                                name="escolaridad_hijo[]"
                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <option value=""></option>
                                                                <option value="1">Jardín de niños</option>
                                                                <option value="2">Primaria</option>
                                                                <option value="3">Secundaria</option>
                                                                <option value="4">Preparatoria</option>
                                                                <option value="5">Universidad</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" wire:model="edad_hijo2"
                                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>

                                                        <td>
                                                            <select wire:model="escolaridad_hijo2"
                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <option value=""></option>
                                                                <option value="1">Jardín de niños</option>
                                                                <option value="2">Primaria</option>
                                                                <option value="3">Secundaria</option>
                                                                <option value="4">Preparatoria</option>
                                                                <option value="5">Universidad</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" wire:model="edad_hijo3"
                                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>

                                                        <td>
                                                            <select wire:model="escolaridad_hijo3"
                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <option value=""></option>
                                                                <option value="1">Jardín de niños</option>
                                                                <option value="2">Primaria</option>
                                                                <option value="3">Secundaria</option>
                                                                <option value="4">Preparatoria</option>
                                                                <option value="5">Universidad</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" wire:model="edad_hijo4"
                                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>

                                                        <td>
                                                            <select wire:model="escolaridad_hijo4"
                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <option value=""></option>
                                                                <option value="1">Jardín de niños</option>
                                                                <option value="2">Primaria</option>
                                                                <option value="3">Secundaria</option>
                                                                <option value="4">Preparatoria</option>
                                                                <option value="5">Universidad</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" wire:model="edad_hijo5"
                                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>

                                                        <td>
                                                            <select wire:model="escolaridad_hijo5"
                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <option value=""></option>
                                                                <option value="1">Jardín de niños</option>
                                                                <option value="2">Primaria</option>
                                                                <option value="3">Secundaria</option>
                                                                <option value="4">Preparatoria</option>
                                                                <option value="5">Universidad</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" wire:model="edad_hijo6"
                                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>

                                                        <td>
                                                            <select wire:model="escolaridad_hijo6"
                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <option value=""></option>
                                                                <option value="1">Jardín de niños</option>
                                                                <option value="2">Primaria</option>
                                                                <option value="3">Secundaria</option>
                                                                <option value="4">Preparatoria</option>
                                                                <option value="5">Universidad</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Segunda seccion --}}

                        <div class="grid sm:grid-rows-4 p-3 gap-4">
                            <div class="grid sm:row-start-1 sm:grid-cols-4 gap-2">
                                <div class=" sm:col-span-1 sm:col-start-1">
                                    <label class="block text-sm font-black text-gray-700"
                                        for="inputDomicilio">Domicilio</label>
                                    <input type="text" wire:model="domicilio" name="domicilio" id="inputDomicilio"
                                        value="{{ old('domicilio') }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('domicilio')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-2">
                                    <label class="block text-sm font-black text-gray-700"
                                        for="inputMunicipio">Municipio</label>
                                    <input type="text" wire:model="municipio" name="municipio" id="inputMunicipio"
                                        value="{{ old('municipio') }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('municipio')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-3">
                                    <label class="block text-sm font-black text-gray-700"
                                        for="inputEstado">Estado</label>
                                    <input type="text" wire:model="estado" name="estado" id="inputEstado"
                                        value="{{ old('estado') }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('estado')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-4">
                                    <label class="block text-sm font-black text-gray-700" for="inputCodigoPostal">Código
                                        Postal</label>
                                    <input type="text" wire:model="codigo_postal" name="codigo_postal"
                                        id="inputCodigoPostal" value="{{ old('codigo_postal') }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('codigo_postal')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid sm:row-start-2 sm:grid-cols-4 gap-2">
                                <div class=" sm:col-span-2 sm:col-start-1">
                                    <label for="selectNivel"
                                        class="block text-sm font-black text-gray-700">Puesto</label>
                                    <select id="selectNivel" wire:model="puesto" name="puesto"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        @if (isset($puestos))
                                        @foreach ($puestos as $puesto)
                                        <option value="{{ $puesto->id }}">{{ $puesto->nombre_nivel }}
                                            {{ $puesto->especialidad_puesto }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('puesto')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-3">
                                    <label for="selectArea" class="block text-sm font-black text-gray-700">Área</label>
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
                                <div class=" sm:col-span-1 sm:col-start-4">
                                    <label for="selectSupervisor" class="block text-sm font-black text-gray-700">Jefe
                                        Directo</label>
                                    <select id="selectSupervisor" wire:model="jefe_directo" name="supervisor"
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
                                    @error('jefe_directo')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid sm:row-start-3 sm:grid-cols-4 gap-2">
                                <div class=" sm:col-span-1 sm:col-start-1"><label for="inputTurno"
                                        class="block text-sm font-black text-gray-700">Turno
                                        del
                                        Colaborador</label>
                                    <select id="inputTurno" wire:model="turno" name="turno"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        @if ($turnos)
                                        @foreach ($turnos as $turno)
                                        <option value="{{ $turno->id }}">{{ $turno->nombre_turno }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('turno')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror</div>
                                <div class=" sm:col-span-1 sm:col-start-2">
                                    <label for="inputCorreo"
                                        class="block text-sm font-black text-gray-700">Correo</label>
                                    <input type="email" wire:model="correo" name="correo" id="inputCorreo"
                                        value="{{ old('correo') }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('correo')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-3">
                                    <label for="inputRuta" class="block text-sm font-black text-gray-700">Ruta de
                                        Transporte</label>
                                    <select id="inputRuta" wire:model="ruta_transporte" name="ruta"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        @if ($rutas)
                                        @foreach ($rutas as $ruta)
                                        <option value="{{ $ruta->id }}">{{ $ruta->nombre_ruta }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('ruta_transporte')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-4">
                                    <label for="inputTelFijo" class="block text-sm font-black text-gray-700">Teléfono
                                        Fijo</label>
                                    <input type="text" wire:model="tel_fijo" name="tel_fijo"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        id="inputTelFijo" value="{{ old('tel_fijo') }}">
                                    @error('tel_fijo')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid sm:row-start-4 sm:grid-cols-4 gap-2">
                                <div class=" sm:col-span-1 sm:col-start-1">
                                    <label for="inputTelMovil" class="block text-sm font-black text-gray-700">Teléfono
                                        Móvil</label>
                                    <input type="text" wire:model="tel_movil" name="tel_movil"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        id="inputTelMovil" value="{{ old('tel_movil') }}">
                                    @error('tel_movil')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-2">
                                    <label for="inputTelRecados" class="block text-sm font-black text-gray-700">Teléfono
                                        para
                                        Recados</label>
                                    <input type="text" wire:model="tel_recados" name="tel_recados"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        id="inputTelRecados" value="{{ old('tel_recados') }}">
                                    @error('tel_recados')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-3">
                                    <label for="inputExtension"
                                        class="block text-sm font-black text-gray-700">Extensión</label>
                                    <select id="inputExtension" wire:model="extension" name="extension"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        @if (isset($extensiones))
                                        @foreach ($extensiones as $ext)
                                        <option value="{{ $ext->id }}">{{ $ext->numero_extension }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('extension')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class=" sm:col-span-1 sm:col-start-4">
                                    <label for="inputClaveRadio" class="block text-sm font-black text-gray-700">Clave de
                                        Radio</label>
                                    <select id="inputClaveRadio" wire:model="clave_radio" name="clave_radio"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        @if (isset($clavesRadio))
                                        @foreach ($clavesRadio as $clave)
                                        <option value="{{ $clave->id }}">{{ $clave->clave }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('clave_radio')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Inicio tabla contactos emergencia --}}

                        <div class="grid mt-4 mb-4 p-3" @if ((auth()->user()->role_id == 2) | (auth()->user()->role_id
                            ==
                            5)) style="display: none"
                            @else @endif>

                            <div class="block mb-3 text-sm font-black text-gray-700">
                                <h5>Contactos de emergencia</h5>
                            </div>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                            <table name="tablaContactos" class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-100" id="th_contactos">
                                                    <tr class="">
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-black tracking-wider text-left text-gray-500 uppercase">
                                                            Nombre</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-black tracking-wider text-left text-gray-500 uppercase">
                                                            Parentesco</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-black tracking-wider text-left text-gray-500 uppercase">
                                                            Teléfono</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-black tracking-wider text-left text-gray-500 uppercase">
                                                            Domicilio</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_contactos">
                                                    <tr>
                                                        <td><input type="text" wire:model="nombre_contacto1"
                                                                id="nombre_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            @error('nombre_contacto1')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </td>
                                                        <td><input type="text" wire:model="parentesco_contacto1"
                                                                id="parentesco_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            @error('parentesco_contacto1')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </td>
                                                        <td><input type="text" wire:model="telefono_contacto1"
                                                                id="telefono_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            @error('telefono_contacto1')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </td>
                                                        <td><input type="text" wire:model="domicilio_contacto1"
                                                                id="domicilio_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            @error('domicilio_contacto1')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" wire:model="nombre_contacto2"
                                                                id="nombre_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="parentesco_contacto2"
                                                                id="parentesco_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="telefono_contacto2"
                                                                id="telefono_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="domicilio_contacto2"
                                                                id="domicilio_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" wire:model="nombre_contacto3"
                                                                id="nombre_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="parentesco_contacto3"
                                                                id="parentesco_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="telefono_contacto3"
                                                                id="telefono_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="domicilio_contacto3"
                                                                id="domicilio_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" wire:model="nombre_contacto4"
                                                                id="nombre_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="parentesco_contacto4"
                                                                id="parentesco_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="telefono_contacto4"
                                                                id="telefono_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        <td><input type="text" wire:model="domicilio_contacto4"
                                                                id="domicilio_contacto"
                                                                class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        </td>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- Fin tabla contactos emergencia --}}

                        @if ((auth()->user()->role_id == 1) | (auth()->user()->role_id == 2 ) | (auth()->user()->role_id
                        == 8))
                        <div class="p-3">
                            <div class="mt-4 mb-4 bg-red-800 ">
                                <p class="text-center text-gray-50 text-xl">
                                    Factor
                                </p>
                            </div>

                            <div
                                class="grid sm:grid-rows-1 grid-rows-2 grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4 sm:mt-4 sm:mb-4">

                                <div class="col-span-1 mb-3 sm:mb-0">
                                    <label for="inputMatriculacion"
                                        class="block text-sm font-black text-gray-700">Matriculación</label>
                                    <select id="inputMatriculacion" wire:model="matriculacion" name="matriculacion"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('matriculacion')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="col-span-1 mb-3 sm:mb-0">
                                    <label for="inputTipoUsuario" class="block text-sm font-black text-gray-700">Tipo de
                                        Usuario</label>
                                    <select id="inputTipoUsuario" wire:model="tipo_usuario" name="tipo_usuario"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        @if (isset($tiposUsuario))
                                        @foreach ($tiposUsuario as $tipoUsuario)
                                        <option value="{{ $tipoUsuario->id }}">
                                            {{ $tipoUsuario->nombre_tipo }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('tipo_usuario')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="col-span-1 mb-4 sm:mb-0">
                                    <label for="inputPassword"
                                        class="block text-sm font-black text-gray-700">Contraseña</label>
                                    <input type="text" wire:model="password" name="password" id="inputPassword"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        value="{{ old('password') }}">
                                    @error('password')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="col-span-1 mb-3 sm:mb-0">
                                    <label for="inputRangoFactor" class="block text-sm font-black text-gray-700">Rango
                                        en
                                        Factor</label>
                                    <select id="inputRangoFactor" wire:model="rango_factor" name="rango_factor"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        @if (isset($rangosFactor))
                                        @foreach ($rangosFactor as $rangoFactor)
                                        <option value="{{ $rangoFactor->id }}">
                                            {{ $rangoFactor->nombre_rango }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('tipo_usuario')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                            </div>

                            <div class="mt-4 bg-red-800">
                                <p class="text-center text-gray-50 text-xl">
                                    Evaluaciones
                                </p>
                            </div>
                            <div class="grid sm:grid-rows-1 grid-cols-2 gap-2 p-2">
                                <div class="grid grid-rows-1 gap-1">
                                    <label class="block text-md font-black text-gray-700 mb-4">Autoevaluación</label>
                                    <div class="grid grid-rows-3 gap-4 sm:grid-rows-1 sm:grid-cols-3 sm:row-start-2">
                                        <div class="row-start-1 col-span-1 col-start-1">
                                            <div class="flex justify-center">
                                                <label for="autoEvalGen" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Generada
                                                    </div>
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <input wire:model="autoEvalGen" name="autoEvalGen"
                                                            id="autoEvalGen" type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row-start-2 sm:row-start-1 col-span-1 sm:col-start-2">
                                            <div class="flex justify-center">
                                                <label for="autoEvalAsig" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Asignada
                                                    </div>
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <input wire:model="autoEvalAsig" name="autoEvalAsig"
                                                            id="autoEvalAsig" type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row-start-3 sm:row-start-1 col-span-1 sm:col-start-3">
                                            <div class="flex justify-center col-span-1 ">
                                                <label for="autoEvalCal" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">
                                                        Calificación
                                                    </div>
                                                    <input type="text" wire:model="autoEvalCal" name="autoEvalCal"
                                                        id="autoEvalCal"
                                                        class="block w-full h-6 text-center border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @error('autoEvalCal')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-rows-1 gap-1">
                                    <label class="block text-md font-black text-gray-700 mb-4">Evaluación</label>
                                    <div class="grid grid-rows-3 gap-4 sm:grid-rows-1 sm:grid-cols-3 sm:row-start-2">
                                        <div class="row-start-1 col-span-1 col-start-1">
                                            <div class="flex justify-center">
                                                <label for="evalGen" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Generada
                                                    </div>
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <input wire:model="evalGen" name="evalGen" id="evalGen"
                                                            type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row-start-2 sm:row-start-1 col-span-1 sm:col-start-2">
                                            <div class="flex justify-center">
                                                <label for="evalAsig" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Asignada
                                                    </div>
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <input wire:model="evalAsig" name="evalAsig" id="evalAsig"
                                                            type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row-start-3 sm:row-start-1 col-span-1 sm:col-start-3">
                                            <div class="flex justify-center col-span-1 ">
                                                <label for="evalCal" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">
                                                        Calificación
                                                    </div>
                                                    <input type="text" wire:model="evalCal" name="evalCal" id="evalCal"
                                                        class="block w-full h-6 text-center border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @error('evalCal')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="grid grid-cols-1 gap-4 mt-4 bg-red-800 ">
                                <p class="text-center text-gray-50 text-xl">
                                    Quinquenio
                                </p>
                            </div>

                            <div
                                class="grid sm:grid-rows-1 grid-rows-2 grid-cols-2 sm:grid-cols-4 gap-4 sm:mt-4 sm:mb-4">
                                <div class="col-span-1 row-start-1 col-start-1 mt-3 sm:mb-0 sm:mt-0 sm:my-auto">
                                    <br>
                                    <div class="flex justify-center">
                                        <label for="quinquenioAplica" class="flex items-center cursor-pointer">
                                            <div class="px-2 block text-sm font-black text-gray-700">Aplica
                                            </div>
                                            <!-- toggle -->
                                            <div class="relative cursor-not-allowed">
                                                <input disabled wire:model="quinquenioAplica" name="quinquenioAplica"
                                                    id="quinquenioAplica" type="checkbox" class="hidden" />
                                                <!-- path -->
                                                <div class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                </div>
                                                <!-- crcle -->
                                                <div
                                                    class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-span-1 row-start-1 col-start-2 mt-3 sm:mb-0 sm:mt-0 sm:my-auto">
                                    <br>
                                    <div class="flex justify-center">
                                        <label for="quinquenioEntrega" class="flex items-center cursor-pointer">
                                            <div class="px-2 block text-sm font-black text-gray-700">Entregado
                                            </div>
                                            <!-- toggle -->
                                            <div @if ($quinquenioAplica==false) class="relative cursor-not-allowed"
                                                @else class="relative" @endif>
                                                <input wire:model="quinquenioEntrega" name="quinquenioEntrega"
                                                    @if($quinquenioAplica==false) disabled @endif id="quinquenioEntrega"
                                                    type="checkbox" class="hidden" />
                                                <!-- path -->
                                                <div class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                </div>
                                                <!-- crcle -->
                                                <div
                                                    class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div
                                    class="col-span-1 row-start-2 sm:row-start-1 col-start-1 sm:col-start-3 mb-3 sm:mb-0">
                                    <label class="block text-sm font-black text-gray-700">Fecha de ingreso</label>
                                    <input wire:model="fecha_ingreso" name="fecha_ingreso" id="inputFechaIngreso"
                                        type="date" value="{{ old('fecha_ingreso') }}" min="1961-08-29" max=""
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('fecha_ingreso')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div
                                    class="col-span-1 row-start-2 sm:row-start-1 col-start-2 sm:col-start-4 mb-3 sm:mb-0">
                                    <label class="block text-sm font-black text-gray-700">Años</label>
                                    <input disabled type="text" name="quinquenioYears" id="quinquenioYears"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        value="{{ $fechaQuinquenio }} Año(s)">
                                    @error('quinquenioYears')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>


                            {{-- Seccion switches dia de la madre, del padre y utiles escolares --}}

                            <div class="grid grid-cols-1 gap-4 mt-4 bg-red-800 ">
                                <p class="text-center text-gray-50 text-xl">
                                    Eventos especiales
                                </p>
                            </div>

                            <div class="grid grid-rows-2 gap-4 sm:mt-4 sm:mb-4">
                                {{-- Primera parte Switches --}}
                                <div
                                    class="grid row-start-1 gap-2 sm:grid-rows-1 grid-rows-3 sm:grid-cols-3">
                                    <div class="grid sm:col-start-1 p-2">
                                        <p class="block text-sm font-black text-gray-700">Día de la madre</p>
                                        <div class="grid grid-cols-2">
                                            <div class="col-start-1 flex justify-center">
                                                <label for="ddmAplica" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Aplica
                                                    </div>
                                                    <!-- toggle -->
                                                    <div class="relative cursor-not-allowed">
                                                        <input disabled wire:model="ddmAplica" name="ddmAplica"
                                                            id="ddmAplica" type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-start-2 flex justify-center">
                                                <label for="ddmEntrega" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Entregado
                                                    </div>
                                                    <!-- toggle -->
                                                    <div @if ($ddmAplica==false) class="relative cursor-not-allowed"
                                                        @else class="relative" @endif>
                                                        <input wire:model="ddmEntrega" name="ddmEntrega" 
                                                        @if($ddmAplica==false) disabled @endif id="ddmEntrega"
                                                            type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid sm:col-start-2 p-2">
                                        <p class="block text-sm font-black text-gray-700">Día del padre</p>
                                        <div class="grid grid-cols-2">
                                            <div class="col-start-1 flex justify-center">
                                                <label for="ddpAplica" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Aplica
                                                    </div>
                                                    <!-- toggle -->
                                                    <div @if ($ddpAplica==false) class="relative cursor-not-allowed"
                                                        @else class="relative" @endif>
                                                        <input disabled wire:model="ddpAplica" name="ddpAplica"
                                                            id="ddpAplica" type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-start-2 flex justify-center">
                                                <label for="ddpEntrega" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Entregado
                                                    </div>
                                                    <!-- toggle -->
                                                    <div @if ($ddpAplica==false) class="relative cursor-not-allowed"
                                                        @else class="relative" @endif>
                                                        <input wire:model="ddpEntrega" name="ddpEntrega"
                                                        @if($ddpAplica==false) disabled @endif id="ddpEntrega"
                                                            type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid sm:col-start-3 p-2 mb-4 sm:mb-0">
                                        <p class="mb-2 block text-sm font-black text-gray-700">Útiles escolares</p>
                                        <div class="grid grid-cols-2">
                                            <div class="col-start-1 flex justify-center">
                                                <label for="ueAplica" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Aplica
                                                    </div>
                                                    <!-- toggle -->
                                                    <div @if ($ueAplica==false) class="relative cursor-not-allowed"
                                                        @else class="relative" @endif>
                                                        <input disabled wire:model="ueAplica" name="ueAplica"
                                                            id="ueAplica" type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-start-2 flex justify-center">
                                                <label for="ueEntrega" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Entregado
                                                    </div>
                                                    <!-- toggle -->
                                                    <div @if ($ueAplica==false) class="relative cursor-not-allowed"
                                                        @else class="relative" @endif>
                                                        <input wire:model="ueEntrega" name="ueEntrega"
                                                        @if($ueAplica==false) disabled @endif id="ueEntrega"
                                                            type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Segua parte switches --}}
                                <div class="grid row-start-2">
                                    <div class="grid sm:col-start-1 p-2">
                                        <p class="block text-sm font-black text-gray-700">Regalo 60
                                            aniversario</p>
                                        <div class="grid grid-cols-2">
                                            <div class="col-start-1 flex justify-center">
                                                <label for="r60Aplica" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Aplica
                                                    </div>
                                                    <!-- toggle -->
                                                    <div class="relative cursor-not-allowed">
                                                        <input disabled wire:model="r60Aplica" name="r60Aplica"
                                                            id="r60Aplica" type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-start-2 flex justify-center">
                                                <label for="r60Entrega" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Entregado
                                                    </div>
                                                    <!-- toggle -->
                                                    <div @if ($r60Aplica==false) class="relative cursor-not-allowed"
                                                        @else class="relative" @endif>
                                                        <input wire:model="r60Entrega" name="r60Entrega"
                                                        @if($r60Aplica==false) disabled @endif id="r60Entrega"
                                                            type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid sm:col-start-2 p-2">
                                        <p class="block text-sm font-black text-gray-700">Boleto fiesta fin de
                                            año</p>
                                        <div class="grid grid-cols-2">
                                            <div class="col-start-1 flex justify-center">
                                                <label for="bffAplica" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Aplica
                                                    </div>
                                                    <!-- toggle -->
                                                    <div class="relative cursor-not-allowed">
                                                        <input disabled wire:model="bffAplica" name="bffAplica"
                                                            id="bffAplica" type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-start-2 flex justify-center">
                                                <label for="bffEntrega" class="flex items-center cursor-pointer">
                                                    <div class="px-2 block text-sm font-black text-gray-700">Entregado
                                                    </div>
                                                    <!-- toggle -->
                                                    <div @if ($bffAplica==false) class="relative cursor-not-allowed"
                                                        @else class="relative" @endif>
                                                        <input wire:model="bffEntrega" name="bffEntrega"
                                                        @if($bffAplica==false) disabled @endif id="bffEntrega"
                                                            type="checkbox" class="hidden" />
                                                        <!-- path -->
                                                        <div
                                                            class="toggle-path bg-red-500 w-9 h-5 rounded-full shadow-inner">
                                                        </div>
                                                        <!-- crcle -->
                                                        <div
                                                            class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>


                    @if (auth()->user()->role_id == 1 | auth()->user()->role_id == 2 | auth()->user()->role_id == 3)
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6 flex justify-center sm:justify-end">
                        <button wire:click="update" type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Actualizar información
                        </button>
                    </div>
                    @endif
                </div>
        </div>
        </form>
    </div>
</div>
</div>


{{-- Modifica el valor maximo del input date fecha_ingreso --}}

<script>
    var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("fecha_ingreso")[0].setAttribute('max', today);

</script>

{{-- Modifica el valor minimo del input date fecha_ingreso --}}

<script>
    var after = new Date().toISOString().split('T')[0];
        document.getElementsByName("fecha_ingreso")[0].setAttribute('min', '1969-08-29');

</script>

{{-- Modifica el valor minimo del input date fecha_nacimiento --}}

<script>
    var fnMax = new Date().toISOString().split('T')[0];
        document.getElementsByName("fecha_nacimiento")[0].setAttribute('max', '2003-01-01');

</script>

{{-- Modifica el valor minimo del input date fecha_nacimiento --}}

<script>
    var fnMin = new Date().toISOString().split('T')[0];
        document.getElementsByName("fecha_nacimiento")[0].setAttribute('min', '1950-01-01');

</script>

<style>
    .toggle-path {
        transition: background 0.3s ease-in-out;
    }

    .toggle-circle {
        top: 0.2rem;
        left: 0.25rem;
        transition: all 0.3s ease-in-out;
    }

    input:checked~.toggle-circle {
        transform: translateX(100%);
    }

    input:checked~.toggle-path {
        background-color: #33FF71;
    }
</style>
@else
<h3 class="text-center text-4xl font-black ">
    Sal de aqui :p
</h3>
@endif