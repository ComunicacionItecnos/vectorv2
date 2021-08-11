<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <div class="max-w-md mx-auto">
                <div>
                    @if ($currentStep == 1)
                        <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-1-01.png') }}" class="object-center" />
                    @endif
                    @if ($currentStep == 2)
                        <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-2-01.png') }}" class="object-center" />
                    @endif
                    @if ($currentStep == 3 || $currentStep == 4 || $currentStep == 5)
                        <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-3-01.png') }}" class="object-center" />
                    @endif
                    @if ($currentStep == 6)
                    <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-4-01.png') }}" class="object-center" />
                    @endif
                    @if ($currentStep == 7)
                        <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-5-01.png') }}" class="object-center" />
                    @endif
                    @if ($currentStep == 8)
                        <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-6-01.png') }}" class="object-center" />
                    @endif
                    @if ($currentStep == 9)
                        <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-8-01.png') }}" class="object-center" />
                    @endif
                    @if ($currentStep == 10)
                        <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-7-01.png') }}" class="object-center" />
                    @endif
                    @if ($currentStep == 11)
                        <img src="{{ asset('images/encabezadosNuevoIngreso/Banner_Screen-9-01.png') }}" class="object-center" />
                    @endif
                </div>

                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        {{-- Step 1 --}}
                        @if ($currentStep == 1)
                            <p>Ingresa tu CURP para proseguir el registro</p>

                            <div class="sm:grid row-start-1 grid-cols-1 gap-1">
                                <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                    <input type="text" name="curp" id="curp" wire:model="curp"
                                        class="uppercase block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('curp')
                                        <p class="mt-1 mb-1 text-base text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="flex justify-start px-2 col-span-1 col-start-2">
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                        wire:click="comprobarCurp()">
                                        Comprobar
                                    </button>
                                </div>
                            </div>

                            @if (session()->has('message'))
                                <div class="grid grid-cols-1">
                                    <div class="flex justify-start px-2 col-span-1 col-start-2">
                                        <p class="mt-1 mb-1 text-md text-red-600 italic">
                                            {{ session('message') }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endif

                        {{-- Step 2 --}}
                        @if ($currentStep == 2)
                            <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                <p class="block text-base font-medium text-gray-700">
                                    1) Los campos con el siguiente signo <span
                                        class="mt-1 mb-1 text-base text-red-600 italic m-1">*</span>  son obligatorios.
                                </p>
                                <br>
                                <p class="space-y-6 block text-base font-medium text-gray-700">
                                    2) Los campos con el siguiente signo <span class="mt-1 mb-1 text-base text-red-600 italic m-1">+</span> te permiten subir más de un archivo.
                                </p>

                            </div>
                        @endif


                        @if ($curpValida == false)

                            <form wire:submit.prevent="triggerConfirm" enctype="multipart/form-data">

                                {{-- Step 3 --}}
                                @if ($currentStep == 3)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700" for="nombre_1">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Primer nombre</label>
                                                <input type="text" wire:model="nombre_1" name="nombre_1" id="nombre_1"
                                                    value="{{ old('nombre_1') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('nombre_1')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="nombre_2">Segundo nombre</label>
                                                <input type="text" wire:model="nombre_2" name="nombre_2" id="nombre_2"
                                                    value="{{ old('nombre_2') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('nombre_2')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="ap_paterno"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Apellido paterno</label>
                                                <input type="text" wire:model="ap_paterno" name="ap_paterno"
                                                    id="ap_paterno" value="{{ old('ap_paterno') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('ap_paterno')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="ap_materno"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Apellido materno</label>
                                                <input type="text" wire:model="ap_materno" name="ap_materno"
                                                    id="ap_materno" value="{{ old('ap_materno') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('ap_materno')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="fecha_nacimiento"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Fecha
                                                    de nacimiento</label>
                                                <input type="date" wire:model="fecha_nacimiento" name="fecha_nacimiento"
                                                    id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('fecha_nacimiento')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label for="genero_id"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Género</label>
                                                <select id="genero_id" wire:model="genero_id" name="genero_id"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                    <option></option>
                                                    @if ($genero)
                                                        @foreach ($genero as $g)
                                                            <option value="{{ $g->id }}">
                                                                {{ $g->nombre_genero }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('genero_id')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-1 gap-2">
                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label for="nacionalidad_id"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Nacionalidad</label>
                                                <select id="nacionalidad_id" wire:model="nacionalidad_id"
                                                    name="nacionalidad_id"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                    <option></option>
                                                    @if ($nacionalidad)
                                                        @foreach ($nacionalidad as $n)
                                                            <option value="{{ $n->id }}">
                                                                {{ $n->nacionalidad }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('nacionalidad_id')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror


                                            </div>
                                        </div>

                                    </div>
                                @endif

                                {{-- Step 4 --}}
                                @if ($currentStep == 4)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label for="estado_civil_id"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Estado
                                                    civil</label>
                                                <select id="estado_civil_id" wire:model="estado_civil_id"
                                                    name="estado_civil_id"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                    <option></option>
                                                    @if ($estado_civil)
                                                        @foreach ($estado_civil as $ec)
                                                            <option value="{{ $ec->id }}">
                                                                {{ $ec->nombre_estado }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('estado_civil_id')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                
                                                @if ($estado_civil_id == 2)
                                                    <label class="block text-base font-medium text-gray-700"
                                                        for="actaMatrimonio"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Acta de matrimonio</label>
                                                    <label
                                                        class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                        </svg>
                                                        <input type='file' wire:model="actaMatrimonio" accept=".pdf"
                                                            class="hidden" />
                                                    </label>
                                                @else
                                                    <label class="block text-base font-medium text-gray-700"
                                                        for="actaMatrimonio">Acta de matrimonio</label>
                                                    <label
                                                        class="cursor-not-allowed opacity-50 flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                        </svg>
                                                        <input type='file' wire:model="actaMatrimonio" accept=".pdf"
                                                            class="hidden" disabled />
                                                    </label>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="paternidad_id"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> ¿Tienes
                                                    hijos?</label>
                                                <select id="paternidad_id" wire:model="paternidad_id"
                                                    name="paternidad_id"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                    <option></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                                @error('paternidad_id')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                
                                                @if ($paternidad_id == 1)
                                                    <label class="block text-base font-medium text-gray-700"
                                                        for="actasHijo">
                                                        <span class="mt-1 mb-1 text-base text-red-600 italic">+</span> Actas de los hijos</label>
                                                    <label
                                                        class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                        </svg>
                                                        <input type='file' wire:model="actasHijo" accept=".pdf"
                                                            class="hidden" multiple />
                                                    </label>
                                                @else
                                                    <label class="block text-base font-medium text-gray-700"
                                                        for="actasHijo">Actas de los hijos</label>
                                                    <label
                                                        class="cursor-not-allowed opacity-50 flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                        </svg>
                                                        <input type='file' wire:model="actasHijo" accept=".pdf"
                                                            class="hidden" disabled />
                                                    </label>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="curpDoc"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> CURP
                                                    documento</label>

                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="curpDoc" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('curpDoc')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror

                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label for="actaNacimiento"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Acta de
                                                    nacimiento</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="actaNacimiento" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('actaNacimiento')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                @endif

                                {{-- Step 5 --}}
                                @if ($currentStep == 5)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700" for="rfc"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    RFC</label>
                                                <input type="text" wire:model="rfc" name="rfc" id="rfc"
                                                    value="{{ old('rfc') }}"
                                                    class="uppercase block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('rfc')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label for="rfcDoc"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> RFC
                                                    documento</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="rfcDoc" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('rfcDoc')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="no_social_social"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Número
                                                    de seguro social</label>
                                                <input type="text" wire:model="no_social_social" name="no_social_social"
                                                    id="no_social_social" value="{{ old('no_social_social') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('no_social_social')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label for="altaImssDoc"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Alta
                                                    del IMSS documento</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="altaImssDoc" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('altaImssDoc')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label for="credencialIFE"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Credencial IFE</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="credencialIFE" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('credencialIFE')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                
                                                <label for="cartillaMilitar"
                                                    class="block text-base font-medium text-gray-700">
                                                    Cartilla militar
                                                </label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="cartillaMilitar" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('cartillaMilitar')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                @endif

                                {{-- Step 6 --}}
                                @if ($currentStep == 6)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                        <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                            <div class="sm:grid row-start-1 grid-cols-2 gap-2">
                                                @if ($genero_id == 1)
                                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallaPantalon"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de pantalon hombre</label>
                                                        <select id="tallaPantalon" wire:model="tallaPantalon"
                                                            name="tallaPantalon"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="28">28</option>
                                                            <option value="30">30</option>
                                                            <option value="32">32</option>
                                                            <option value="34">34</option>
                                                            <option value="36">36</option>
                                                            <option value="38">38</option>
                                                            <option value="40">40</option>
                                                        </select>
                                                        @error('tallaPantalon')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @elseif ($genero_id == 2)
                                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallaPantalon"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de pantalon mujer</label>
                                                        <select id="tallaPantalon" wire:model="tallaPantalon"
                                                            name="tallaPantalon"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="28">28</option>
                                                            <option value="30">30</option>
                                                            <option value="32">32</option>
                                                            <option value="34">34</option>
                                                            <option value="36">36</option>
                                                            <option value="38">38</option>
                                                            <option value="40">40</option>
                                                        </select>
                                                        @error('tallaPantalon')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @elseif ($genero_id == 3)
                                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallaPantalon"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de pantalon</label>
                                                        <select id="tallaPantalon" wire:model="tallaPantalon"
                                                            name="tallaPantalon"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="28">28</option>
                                                            <option value="30">30</option>
                                                            <option value="32">32</option>
                                                            <option value="34">34</option>
                                                            <option value="36">36</option>
                                                            <option value="38">38</option>
                                                            <option value="40">40</option>
                                                        </select>
                                                        @error('tallaPantalon')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @endif

                                                @if ($genero_id == 1)
                                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallaPlayera"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de playera hombre</label>
                                                        <select id="tallaPlayera" wire:model="tallaPlayera"
                                                            name="tallaPlayera"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="Chica">Chica</option>
                                                            <option value="Mediana">Mediana</option>
                                                            <option value="Grande">Grande</option>
                                                            <option value="Extra grande">Extra grande</option>
                                                        </select>
                                                        @error('tallaPlayera')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @elseif ($genero_id == 2)
                                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallaPlayera"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de playera mujer</label>
                                                        <select id="tallaPlayera" wire:model="tallaPlayera"
                                                            name="tallaPlayera"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="Chica">Chica</option>
                                                            <option value="Mediana">Mediana</option>
                                                            <option value="Grandre">Grandre</option>
                                                            <option value="Extra grande">Extra grande</option>
                                                        </select>
                                                        @error('tallaPlayera')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @elseif ($genero_id == 3)
                                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallaPlayera"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de playera</label>
                                                        <select id="tallaPlayera" wire:model="tallaPlayera"
                                                            name="tallaPlayera"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="Chica">Chica</option>
                                                            <option value="Mediana">Mediana</option>
                                                            <option value="Grandre">Grandre</option>
                                                            <option value="Extra grande">Extra grande</option>
                                                        </select>
                                                        @error('tallaPlayera')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @endif

                                                @if ($genero_id == 1)
                                                    <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallazapatos"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de calzado hombre</label>
                                                        <select id="tallazapatos" wire:model="tallazapatos"
                                                            name="tallazapatos"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                        </select>
                                                        @error('tallazapatos')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @elseif ($genero_id == 2)
                                                    <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallazapatos"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de calzado mujer</label>
                                                        <select id="tallazapatos" wire:model="tallazapatos"
                                                            name="tallazapatos"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                        </select>
                                                        @error('tallazapatos')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @elseif ($genero_id == 3)
                                                    <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                                        <label class="block text-base font-medium text-gray-700"
                                                            for="tallazapatos"><span
                                                                class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                            Talla de calzado</label>
                                                        <select id="tallazapatos" wire:model="tallazapatos"
                                                            name="tallazapatos"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                            <option></option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                        </select>
                                                        @error('tallazapatos')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                @endif

                                            </div>

                                        </div>

                                    </div>
                                @endif

                                {{-- Step 7 --}}
                                @if ($currentStep == 7)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">
                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label for="pais_id"
                                                    class="block text-base font-medium text-gray-700">País</label>
                                                <select id="pais_id" wire:model="pais_id" name="pais_id" disabled
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">

                                                    @if ($pais)
                                                        <option value="{{ $pais[0]->id }}">{{ $pais[0]->pais }}
                                                        </option>
                                                    @endif
                                                </select>
                                                @error('pais_id')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror

                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="estado"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Estado</label>

                                                <select id="estado" wire:model="estado" name="estado"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                    <option></option>
                                                    @if ($estado_id)
                                                        @foreach ($estado_id as $ei)
                                                            <option value="{{ $ei->id }}" selected>
                                                                {{ $ei->nombre_estado }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                @error('estado')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="municipio"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Municipio</label>

                                                <select id="municipio" wire:model="municipio" name="municipio"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                    <option></option>
                                                    @if ($municipio_id)
                                                        @foreach ($municipio_id as $mi)
                                                            <option value="{{ $mi->id }}">
                                                                {{ $mi->nombre_municipio }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                @error('municipio')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-2 col-start-2">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="domicilio"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Calle</label>
                                                <input type="text" wire:model="domicilio" name="domicilio"
                                                    id="domicilio" value="{{ old('domicilio') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('domicilio')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-4 gap-2">



                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="numeroExterior">Núm Exterior</label>
                                                <input type="number" wire:model="numeroExterior" name="numeroExterior"
                                                    id="numeroExterior" value="{{ old('numeroExterior') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"
                                                    min="1" pattern="^[0-9]+">
                                                @error('numeroExterior')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="numeroInterior">Núm Interior</label>
                                                <input type="number" wire:model="numeroInterior" name="numeroInterior"
                                                    id="numeroInterior" value="{{ old('numeroInterior') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"
                                                    min="1" pattern="^[0-9]+">
                                                @error('numeroInterior')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-2 col-start-3">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="colonia"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Colonia</label>
                                                <input type="text" wire:model="colonia" name="colonia" id="colonia"
                                                    value="{{ old('colonia') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('colonia')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">



                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="codigo_postal"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Codigo
                                                    postal</label>
                                                <input type="text" wire:model="codigo_postal" name="codigo_postal"
                                                    id="codigo_postal" value="{{ old('codigo_postal') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('codigo_postal')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>


                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label for="comprobranteDomicilio"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Comprobante de domicilio</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="comprobranteDomicilio" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('comprobranteDomicilio')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>


                                        </div>


                                    </div>
                                @endif

                                {{-- Step 8 --}}
                                @if ($currentStep == 8)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="tel_fijo"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Telefono fijo</label>
                                                <input type="tel" wire:model="tel_fijo" name="tel_fijo" id="tel_fijo"
                                                    value="{{ old('tel_fijo') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('tel_fijo')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="tel_movil"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Telefono celular</label>
                                                <input type="tel" wire:model="tel_movil" name="tel_movil" id="tel_movil"
                                                    value="{{ old('tel_movil') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('tel_movil')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">
                                            <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="correo"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Correo
                                                    electronico</label>
                                                <input type="email" wire:model="correo" name="correo" id="correo"
                                                    value="{{ old('correo') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('correo')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                @endif

                                {{-- Step 9 --}}
                                @if ($currentStep == 9)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                                        <p>
                                            Contacto de emergencia 1
                                        </p>

                                        <div class="sm:grid row-start-1 grid-cols-1 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700" for="nombreEmergencia1">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Nombre completo
                                                </label>
                                                <input type="text" wire:model="nombreEmergencia1" name="nombreEmergencia1" id="nombreEmergencia1"
                                                    value="{{ old('nombreEmergencia1') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('nombreEmergencia1')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                                <label class="block text-base font-medium text-gray-700" for="parentescoEmergencia1">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Parentesco
                                                </label>
                                                <input type="text" wire:model="parentescoEmergencia1" name="parentescoEmergencia1" id="parentescoEmergencia1"
                                                    value="{{ old('parentescoEmergencia1') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('parentescoEmergencia1')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            {{-- camboios --}}

                                            <div class="mb-2 sm:m-0 col-span-2 col-start-4">
                                                <label class="block text-base font-medium text-gray-700" for="telEmergencia1">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Telefono     
                                                </label>
                                                <input type="email" wire:model="telEmergencia1" name="telEmergencia1" id="telEmergencia1"
                                                    value="{{ old('telEmergencia1') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('telEmergencia1')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-4 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-4 col-start-1">
                                                <label class="block text-base font-medium text-gray-700" for="domicilioEmergencia1">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Domicilio
                                                </label>
                                                <textarea type="tel" wire:model="domicilioEmergencia1" name="domicilioEmergencia1" id="domicilioEmergencia1" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base" 
                                                    cols="2" rows="2">
                                                    {{ old('domicilioEmergencia1') }}
                                                </textarea>
                                                @error('domicilioEmergencia1')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <br>
                                        
                                        <p>
                                            Contacto de emergencia 2
                                        </p>

                                        <div class="sm:grid row-start-1 grid-cols-1 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label class="block text-base font-medium text-gray-700" for="nombreEmergencia2">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Nombre completo
                                                </label>
                                                <input type="text" wire:model="nombreEmergencia2" name="nombreEmergencia2" id="nombreEmergencia2"
                                                    value="{{ old('nombreEmergencia2') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('nombreEmergencia2')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                                <label class="block text-base font-medium text-gray-700" for="parentescoEmergencia2">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Parentesco
                                                </label>
                                                <input type="text" wire:model="parentescoEmergencia2" name="parentescoEmergencia2" id="parentescoEmergencia2"
                                                    value="{{ old('parentescoEmergencia2') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('parentescoEmergencia2')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-2 col-start-4">
                                                <label class="block text-base font-medium text-gray-700" for="telEmergencia2">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Telefono     
                                                </label>
                                                <input type="email" wire:model="telEmergencia2" name="telEmergencia2" id="telEmergencia2"
                                                    value="{{ old('telEmergencia2') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('telEmergencia2')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-4 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-4 col-start-1">
                                                <label class="block text-base font-medium text-gray-700" for="domicilioEmergencia2">
                                                    <span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Domicilio
                                                </label>
                                                <textarea type="tel" wire:model="domicilioEmergencia2" name="domicilioEmergencia2" id="domicilioEmergencia2" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base" 
                                                    cols="2" rows="2">
                                                    {{ old('domicilioEmergencia2') }}
                                                </textarea>
                                                @error('domicilioEmergencia2')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                @endif

                                {{-- Step 10 --}}
                                @if ($currentStep == 10)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label for="escolaridad_id"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Nivel
                                                    de estudios</label>
                                                <select id="escolaridad_id" wire:model="escolaridad_id"
                                                    name="escolaridad_id"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                    <option></option>
                                                    <option value="3">Secundaria</option>
                                                    <option value="4">Preparatoria</option>
                                                    <option value="5">Universidad</option>
                                                    <option value="6">Maestria</option>
                                                    <option value="7">Doctorado</option>
                                                </select>
                                                @error('escolaridad_id')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label for="constanciaEstudios"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Constancia de estudios</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="constanciaEstudios" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('constanciaEstudios')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        @if ($escolaridad_id >= 5)
                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label class="block text-base font-medium text-gray-700"
                                                    for="especialidadEstudios"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Especialidad de estudios</label>
                                                <input type="text" wire:model="especialidadEstudios"
                                                    name="especialidadEstudios" id="especialidadEstudios"
                                                    value="{{ old('especialidadEstudios') }}"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                @error('especialidadEstudios')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        @endif


                                    </div>
                                @endif

                                {{-- Step 11 --}}
                                @if ($currentStep == 11)
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label for="cvOsolicitudEmpleo"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Cv ó
                                                    solicitud de empleo</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="cvOsolicitudEmpleo" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('cvOsolicitudEmpleo')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label for="cartasRecomendacion"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">+</span> Cartas
                                                    de recomendación</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="cartasRecomendacion" accept=".pdf"
                                                        multiple class="hidden" />
                                                </label>
                                                @error('cartasRecomendacion')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label for="cartaNoPenales"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Antecedentes no penales</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="cartaNoPenales" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('cartaNoPenales')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                <label for="buroCredito"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">*</span> Buro de
                                                    credito</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="buroCredito" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                                @error('buroCredito')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>
                                        
                                        <div class="sm:grid row-start-1 grid-cols-1 gap-2">
                                            <p class="block text-base font-medium text-gray-700">
                                                Instrucciones antes de subir la fotografía
                                            </p>
                                            <button class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white"
                                                type="button" wire:click="abrirModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="sm:grid row-start-1 grid-cols-1 gap-2">

                                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                <label for="foto" class="block text-base font-medium text-gray-700"><span class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                    Fotografia
                                                </label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="foto" accept="image/png,image/jpeg"
                                                        class="hidden" />
                                                </label>
                                                @error('foto')
                                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>

                                    <x-jet-dialog-modal wire:model="modalAbrir">
                                        <x-slot name="title">
                                            <p class="text-center text-2xl font-medium text-red-700">
                                                Instrucciones
                                            </p>
                                        </x-slot>
                        
                                        <x-slot name="content">
                                            <p class="block text-base font-medium text-gray-700">
                                                1) Sin accesorios en el rostro (lentes, gorras, cubrebocas, etc)
                                            </p>
                                            <p class="block text-base font-medium text-gray-700">
                                                2) Debe ser un fondo claro/blanco de preferencia
                                            </p>
                                            <p class="block text-base font-medium text-gray-700">
                                                3) El color de tu playera/camisa debe ser contrastante al fondo
                                            </p>
                                            <p class="block text-base font-medium text-gray-700">
                                                4) En la fotografía debe verse tu rostro y hombros
                                            </p>
                                            
                                        </x-slot>
                        
                                        <x-slot name="footer">
                                            <x-jet-secondary-button wire:click="cerrarModal()">
                                                {{ __('Cerrar') }}
                                            </x-jet-secondary-button>
                                        </x-slot>
                                    </x-jet-dialog-modal>

                                @endif


                                <div class="h-16 p-8 grid grid-cols-3">
                                    @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5 ||
                                    $currentStep == 6 ||
                                    $currentStep == 7 || $currentStep == 8 || $currentStep == 9 || $currentStep == 10 || $currentStep == 11)
                                        <div
                                            class="flex justify-start px-2 col-span-1 col-start-1 col-end-3 @if ($currentStep == 2) hidden @endif">
                                            <button type="button"
                                                class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                                wire:click="decreaseStep()">
                                                Regresar
                                            </button>
                                        </div>
    
    
                                        <div class="flex justify-start px-2 col-end-7 col-span-2 @if ($currentStep == 11) hidden @endif">
                                            <button type="button"
                                                class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                                wire:click="increaseStep()">
                                                Siguiente
                                            </button>
                                        </div>
                                    
    
    
                                    <div
                                        class="flex justify-end px-2 col-end-7 col-span-2 @if ($currentStep != 11) hidden @endif">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-red-900 focus:outline-none focus:border-green-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Finalizar
                                        </button>
                                    </div>
                                    @endif
                                </div>

                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
