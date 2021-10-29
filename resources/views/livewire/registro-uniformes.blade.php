<div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

    {{-- Nuevo,editar y ver registro --}}
    <section class="@if ($mostrarNuevoRegistro) @else hidden @endif">
        
        @if ($busquedaNuevo == true) 
            {{-- Nuevo Tallas --}}
            <fieldset class="grid justify-items-center gap-6 p-6 rounded-lg shadow-md place-items-center @if ($busquedaNuevo) @else hidden @endif">
                
                <div class="space-y-2 col-span-full lg:col-span-1">
                    <p class="font-medium">Buscar colaborador</p>

                    <label for="Search" class="hidden">Search</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-coolGray-100">
                                    <path
                                        d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                    </path>
                                </svg>
                            </button>
                        </span>
                        <input type="search" name="colaboradorBusca" placeholder="Núm. de colaborador"
                            wire:model="colaboradorBusca"
                            class="w-32 py-2 pl-10 text-sm rounded-md sm:w-auto focus:outline-none dark:bg-coolGray-800 dark:text-coolGray-100 focus:dark:bg-coolGray-900 focus:dark:border-violet-400">


                        <button type="button" wire:click="buscar"
                            class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Buscar
                        </button>
                    </div>
                    @error('colaboradorBusca')
                        <p class="mt-1 mb-1 text-sm text-red-600 italic">
                            {{ $message }}
                        </p>
                    @enderror
                    <button wire:click="showTabla" type="button"
                    class="ml-1 inline-flex items-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                    @if($colaborador == 'error' || $colaborador == 'ocultar')  @else hidden @endif">Regresar</button>
                </div>

                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3 @if ($colaborador == 'ocultar') hidden  @else divide-y-2 divide-gray-200 @endif">

                    {{-- foto,Nombre,tags --}}
                    <div class="col-span-full sm:col-span-6">
                        @if ($colaborador == 'ocultar')

                        @elseif($colaborador == 'error')
                            <p class="text-center w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900 text-red-500">
                                {{ __('No existe el colaborador') }}
                            </p>
                        @else
                            <div class="col-span-full sm:col-span-6">
                                <img src="{{ asset('storage') . '/' . $foto }}" alt="Profile face"
                                    class="p-1 w-24 h-24 mx-auto rounded-full  object-cover ring-2 ring-offset-4 @if ($genero == 'Masculino') ring-blue-500 @else ring-pink-500 @endif"
                                    loading="lazy">
                            </div>

                            <div class="col-span-full sm:col-span-6 p-3">

                                <p class="text-center w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 text-xl">
                                    {{ $nombreCompleto }}
                                </p>

                                <div class="flex justify-center space-x-1">

                                    <p class="text-center rounded-md text-xl">
                                        <span class="px-2 py-1  text-sm rounded text-white  bg-gray-400 ">
                                            {{ $tipo_usuario }}
                                        </span>
                                    </p>

                                    <p class="text-center rounded-full text-xl">
                                        @if ($genero == 'Masculino')
                                            <p class="px-3 py-2 text-base rounded-full text-white bg-blue-500 w-10 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                                                </svg>
                                            </p>
                                        @else
                                            <p class="px-3 py-2 text-base rounded-full text-white  bg-pink-500 w-10 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                                                </svg>
                                            </p>
                                        @endif
                                    </p>

                                </div>

                            </div>

                        @endif
                    </div>

                    {{-- Area y seleccion de la operacion al que pertenece --}}
                    <div class="col-span-full sm:col-span-6 py-3 @if ($colaborador == 'error') hidden @else @endif">

                        <p class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                            Área: {{ $area }}
                        </p>

                        <div class="sm:grid row-start-1 grid-cols-4 gap-2 py-4">

                            {{-- Area --}}
                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                <label class="block text-base font-medium text-gray-700" for="seleccionPersonalInput">
                                    Área de trabajo</label>
                                <select id="seleccionPersonalInput" wire:model="seleccionPersonalInput"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"
                                    @if ($desabilitarSelect2 == true)
                                    disabled
                                    @endif>
                                    <option></option>
                                    @foreach ($areaExtras as $aE)
                                        <option value="{{ $aE['id'] }}">{{ $aE['extra'] }}</option>
                                    @endforeach

                                </select>
                                @error('seleccionPersonalInput')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Unidad de negocio y lineas --}}
                            <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                <label class="block text-base font-medium text-gray-700" for="unidadNegocioinput">
                                    Unidad de negocio / Área</label>
                                <select id="unidadNegocioinput" wire:model="unidadNegocioinput"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"
                                    @if ($desabilitarSelect == true)
                                    disabled
                                    @endif>
                                    <option></option>
                                    @if (count($unidadNegocioLineas) > 2)
                                        @foreach ($unidadNegocioLineas as $unl)
                                            <option value="{{ $unl }}">{{ $unl }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($unidadNegocioLineas as $unl)
                                            <option value="{{ $unl }}">{{ $unl }}</option>
                                        @endforeach
                                    @endif

                                </select>
                                @error('unidadNegocioinput')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Sublineas --}}
                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                <label for="sublineasinput" class="block text-base font-medium text-gray-700">
                                    Sublinea</label>
                                <select id="sublineasinput" wire:model="sublineasinput"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"
                                    @if ($desabilitarSelect == true)
                                    disabled
                                    @endif>
                                    <option></option>

                                    @if (count($sublineas) > 2)
                                        @foreach ($sublineas as $sl)
                                            <option value="{{ $sl->id }}">{{ $sl->nombre_sublinea }}</option>
                                        @endforeach
                                    @else
                                        @for ($i = 0; $i < count($sublineas); $i++)
                                            @foreach ($sublineas[$i] as $sl)
                                                <option value="{{ $sl->id }}">{{ $sl->nombre_sublinea }}
                                                </option>
                                            @endforeach
                                        @endfor
                                    @endif
                                </select>

                                @error('sublineasinput')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Calibres --}}
                            <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                <label for="calibresinput" class="block text-base font-medium text-gray-700">
                                    Calibre</label>
                                <select id="calibresinput" wire:model="calibresinput"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"
                                    @if ($desabilitarSelect == true)
                                    disabled
                                @elseif($unidadNegocioinput == '' || $sublineasinput == '')
                                    disabled
                                    @endif>
                                    <option></option>

                                    @if (count($calibres) > 10)
                                        @foreach ($calibres as $cl)
                                            <option value="{{ $cl->id }}">{{ $cl->nombre_calibre }}</option>
                                        @endforeach
                                    @else
                                        @for ($i = 0; $i < count($calibres); $i++)
                                            @foreach ($calibres[$i] as $cl)
                                                <option value="{{ $cl->id }}">{{ $cl->nombre_calibre }}
                                                </option>
                                            @endforeach
                                        @endfor
                                    @endif

                                </select>
                                @error('calibresinput')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Operaciones --}}
                            <div class="mb-2 sm:m-0 col-span-1 col-start-4">
                                <label for="operacionesinput"
                                    class="block text-base font-medium text-gray-700">Operación</label>
                                <select id="operacionesinput" wire:model="operacionesinput"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"
                                    @if ($desabilitarSelect == true)
                                    disabled
                                @elseif($unidadNegocioinput == '' || $sublineasinput == '')
                                    disabled
                                    @endif>
                                    <option></option>

                                    @if (count($operaciones) > 25)
                                        @foreach ($operaciones as $os)
                                            <option value="{{ $os->id }}">{{ $os->nombre_operacion }}</option>
                                        @endforeach
                                    @else
                                        @for ($i = 0; $i < count($operaciones); $i++)
                                            @foreach ($operaciones[$i] as $os)
                                                <option value="{{ $os->id }}">
                                                    {{ $os->nombre_operacion }}</option>
                                            @endforeach
                                        @endfor

                                    @endif
                                </select>
                                @error('operacionesinput')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>

                        <form wire:submit.prevent="triggerConfirm" class="@if ($seleccionPersonal) @else  hidden @endif">
                            <div class="sm:grid row-start-1 grid-cols-3 gap-2 py-4">
                                <div class="mb-2 sm:m-0 col-span-1 col-start-2 @if ($seleccionPersonal) @else  hidden @endif">
                                    <label for="seleccionPaqueteInput"
                                        class="block text-base font-medium text-gray-700">Paquetes</label>
                                    <select id="seleccionPaqueteInput" wire:model="seleccionPaqueteInput"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                        <option></option>
                                        @foreach ($paquetes as $ps)
                                            <option value="{{ $ps->id }}">{{ $ps->nombre_paquete }}</option>
                                        @endforeach
                                    </select>
                                    @error('seleccionPaqueteInput')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="mb-2 sm:m-0 col-span-1 col-start-2 py-4 @if ($seleccionPersonal) @else  hidden @endif">
                                    <p class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                                        {{ $paqueteEleccion }}
                                    </p>
                                </div>

                                {{-- Paquete 1 TORRE DE PLOMO --}}
                                @if ($paqueteId == 2)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas4"
                                            class="block text-base font-medium text-gray-700">{{ $prendas4 }}</label>
                                        <select id="Selecionprendas4" wire:model="Selecionprendas4"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas9"
                                            class="block text-base font-medium text-gray-700">{{ $prendas9 }}</label>
                                        <select id="Selecionprendas9" wire:model="Selecionprendas9"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[3] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                {{-- Paquete 2 PRODUCCION FC,FA Y ALAMACEN --}}
                                @if ($paqueteId == 3)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas17"
                                            class="block text-base font-medium text-gray-700">{{ $prendas17 }}</label>
                                        <select id="Selecionprendas17" wire:model="Selecionprendas17"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                {{-- Paquete 3 BLANCO --}}
                                @if ($paqueteId == 4)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas14"
                                            class="block text-base font-medium text-gray-700">{{ $prendas14 }}</label>
                                        <select id="Selecionprendas14" wire:model="Selecionprendas14"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas18"
                                            class="block text-base font-medium text-gray-700">{{ $prendas18 }}</label>
                                        <select id="Selecionprendas18" wire:model="Selecionprendas18"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas12"
                                            class="block text-base font-medium text-gray-700">{{ $prendas12 }}</label>
                                        <select id="Selecionprendas12" wire:model="Selecionprendas12"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($this->genero == 'Masculino')
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas20"
                                                class="block text-base font-medium text-gray-700">{{ $prendas20 }}</label>
                                            <select id="Selecionprendas20" wire:model="Selecionprendas20"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[4] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas8"
                                                class="block text-base font-medium text-gray-700">{{ $prendas8 }}</label>
                                            <select id="Selecionprendas8" wire:model="Selecionprendas8"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[6] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas11"
                                                class="block text-base font-medium text-gray-700">{{ $prendas11 }}</label>
                                            <select id="Selecionprendas11" wire:model="Selecionprendas11"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[7] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas3"
                                                class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                            <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[8] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas21"
                                                class="block text-base font-medium text-gray-700">{{ $prendas21 }}</label>
                                            <select id="Selecionprendas21" wire:model="Selecionprendas21"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[9] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas13"
                                                class="block text-base font-medium text-gray-700">{{ $prendas13 }}</label>
                                            <select id="Selecionprendas13" wire:model="Selecionprendas13"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[10] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($this->genero == 'Femenino')
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas22"
                                                class="block text-base font-medium text-gray-700">{{ $prendas22 }}</label>
                                            <select id="Selecionprendas22" wire:model="Selecionprendas22"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[3] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas7"
                                                class="block text-base font-medium text-gray-700">{{ $prendas7 }}</label>
                                            <select id="Selecionprendas7" wire:model="Selecionprendas7"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[5] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas8"
                                                class="block text-base font-medium text-gray-700">{{ $prendas8 }}</label>
                                            <select id="Selecionprendas8" wire:model="Selecionprendas8"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[6] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas11"
                                                class="block text-base font-medium text-gray-700">{{ $prendas11 }}</label>
                                            <select id="Selecionprendas11" wire:model="Selecionprendas11"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[7] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas3"
                                                class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                            <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[8] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas21"
                                                class="block text-base font-medium text-gray-700">{{ $prendas21 }}</label>
                                            <select id="Selecionprendas21" wire:model="Selecionprendas21"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[9] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas13"
                                                class="block text-base font-medium text-gray-700">{{ $prendas13 }}</label>
                                            <select id="Selecionprendas13" wire:model="Selecionprendas13"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[10] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas19"
                                            class="block text-base font-medium text-gray-700">{{ $prendas19 }}</label>
                                        <select id="Selecionprendas19" wire:model="Selecionprendas19"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[11] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                @endif
                                {{-- Paquete 4 Carga FC --}}
                                @if ($paqueteId == 5)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas17"
                                            class="block text-base font-medium text-gray-700">{{ $prendas17 }}</label>
                                        <select id="Selecionprendas17" wire:model="Selecionprendas17"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas12"
                                            class="block text-base font-medium text-gray-700">{{ $prendas12 }}</label>
                                        <select id="Selecionprendas12" wire:model="Selecionprendas12"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($this->genero == 'Masculino')
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas20"
                                                class="block text-base font-medium text-gray-700">{{ $prendas20 }}</label>
                                            <select id="Selecionprendas20" wire:model="Selecionprendas20"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[4] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas1"
                                                class="block text-base font-medium text-gray-700">{{ $prendas1 }}</label>
                                            <select id="Selecionprendas1" wire:model="Selecionprendas1"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[6] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas3"
                                                class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                            <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[7] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas8"
                                                class="block text-base font-medium text-gray-700">{{ $prendas8 }}</label>
                                            <select id="Selecionprendas8" wire:model="Selecionprendas8"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[8] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($this->genero == 'Femenino')
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas22"
                                                class="block text-base font-medium text-gray-700">{{ $prendas22 }}</label>
                                            <select id="Selecionprendas22" wire:model="Selecionprendas22"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[3] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas7"
                                                class="block text-base font-medium text-gray-700">{{ $prendas7 }}</label>
                                            <select id="Selecionprendas7" wire:model="Selecionprendas5"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[5] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas1"
                                                class="block text-base font-medium text-gray-700">{{ $prendas1 }}</label>
                                            <select id="Selecionprendas1" wire:model="Selecionprendas1"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[6] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas3"
                                                class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                            <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[7] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas8"
                                                class="block text-base font-medium text-gray-700">{{ $prendas8 }}</label>
                                            <select id="Selecionprendas8" wire:model="Selecionprendas8"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[8] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                @endif
                                {{-- Paquete 5 Carga FA (Linea 22) --}}
                                @if ($paqueteId == 6)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas17"
                                            class="block text-base font-medium text-gray-700">{{ $prendas17 }}</label>
                                        <select id="Selecionprendas17" wire:model="Selecionprendas17"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas12"
                                            class="block text-base font-medium text-gray-700">{{ $prendas12 }}</label>
                                        <select id="Selecionprendas12" wire:model="Selecionprendas12"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($this->genero == 'Masculino')
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas20"
                                                class="block text-base font-medium text-gray-700">{{ $prendas20 }}</label>
                                            <select id="Selecionprendas20" wire:model="Selecionprendas20"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[4] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas1"
                                                class="block text-base font-medium text-gray-700">{{ $prendas1 }}</label>
                                            <select id="Selecionprendas1" wire:model="Selecionprendas1"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[6] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas3"
                                                class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                            <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[7] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas8"
                                                class="block text-base font-medium text-gray-700">{{ $prendas8 }}</label>
                                            <select id="Selecionprendas8" wire:model="Selecionprendas8"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[8] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($this->genero == 'Femenino')
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas22"
                                                class="block text-base font-medium text-gray-700">{{ $prendas22 }}</label>
                                            <select id="Selecionprendas22" wire:model="Selecionprendas22"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[3] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas7"
                                                class="block text-base font-medium text-gray-700">{{ $prendas7 }}</label>
                                            <select id="Selecionprendas7" wire:model="Selecionprendas5"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[5] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas1"
                                                class="block text-base font-medium text-gray-700">{{ $prendas1 }}</label>
                                            <select id="Selecionprendas1" wire:model="Selecionprendas1"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[6] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="Selecionprendas3"
                                                class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                            <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[7] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas8"
                                                class="block text-base font-medium text-gray-700">{{ $prendas8 }}</label>
                                            <select id="Selecionprendas8" wire:model="Selecionprendas8"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[8] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                @endif
                                {{-- Paquete 6 MANETENIMIENTO GENERAL --}}
                                @if ($paqueteId == 7)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas10"
                                            class="block text-base font-medium text-gray-700">{{ $prendas10 }}</label>
                                        <select id="Selecionprendas10" wire:model="Selecionprendas10"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas12"
                                            class="block text-base font-medium text-gray-700">{{ $prendas12 }}</label>
                                        <select id="Selecionprendas12" wire:model="Selecionprendas12"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[3] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($this->genero == 'Femenino')
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas8"
                                                class="block text-base font-medium text-gray-700">{{ $prendas8 }}</label>
                                            <select id="Selecionprendas8" wire:model="Selecionprendas8"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[5] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label for="Selecionprendas20"
                                                class="block text-base font-medium text-gray-700">{{ $prendas20 }}</label>
                                            <select id="Selecionprendas20" wire:model="Selecionprendas20"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[4] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label for="Selecionprendas8"
                                                class="block text-base font-medium text-gray-700">{{ $prendas8 }}</label>
                                            <select id="Selecionprendas8" wire:model="Selecionprendas8"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                                <option></option>
                                                @foreach ($tallas[5] as $ts)
                                                    <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                @endif
                                {{-- Paquete 7 LAVADO(S) --}}
                                @if ($paqueteId == 8)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas16"
                                            class="block text-base font-medium text-gray-700">{{ $prendas16 }}</label>
                                        <select id="Selecionprendas16" wire:model="Selecionprendas16"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas11"
                                            class="block text-base font-medium text-gray-700">{{ $prendas11 }}</label>
                                        <select id="Selecionprendas11" wire:model="Selecionprendas11"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                {{-- Paquete 8 HORNO(S) --}}
                                @if ($paqueteId == 9)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas10"
                                            class="block text-base font-medium text-gray-700">{{ $prendas10 }}</label>
                                        <select id="Selecionprendas10" wire:model="Selecionprendas10"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                {{-- Paquete 9 Herramientas Especial --}}
                                @if ($paqueteId == 10)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas10"
                                            class="block text-base font-medium text-gray-700">{{ $prendas10 }}</label>
                                        <select id="Selecionprendas10" wire:model="Selecionprendas10"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas17"
                                            class="block text-base font-medium text-gray-700">{{ $prendas17 }}</label>
                                        <select id="Selecionprendas17" wire:model="Selecionprendas17"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[3] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                @endif
                                {{-- Paquete 10 CONTROL AMBIENTAL --}}
                                @if ($paqueteId == 11)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas10"
                                            class="block text-base font-medium text-gray-700">{{ $prendas10 }}</label>
                                        <select id="Selecionprendas10" wire:model="Selecionprendas10"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                @endif
                                {{-- Paquete 11 COMPONENTES (DETONADORES) --}}
                                @if ($paqueteId == 12)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas11"
                                            class="block text-base font-medium text-gray-700">{{ $prendas11 }}</label>
                                        <select id="Selecionprendas11" wire:model="Selecionprendas11"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas17"
                                            class="block text-base font-medium text-gray-700">{{ $prendas17 }}</label>
                                        <select id="Selecionprendas17" wire:model="Selecionprendas17"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas16"
                                            class="block text-base font-medium text-gray-700">{{ $prendas16 }}</label>
                                        <select id="Selecionprendas16" wire:model="Selecionprendas16"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[3] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[4] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                {{-- Paquete 12 TROQUELADOS --}}
                                @if ($paqueteId == 13)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas2"
                                            class="block text-base font-medium text-gray-700">{{ $prendas2 }}</label>
                                        <select id="Selecionprendas2" wire:model="Selecionprendas2"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas9"
                                            class="block text-base font-medium text-gray-700">{{ $prendas9 }}</label>
                                        <select id="Selecionprendas9" wire:model="Selecionprendas9"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                {{-- Paquete 13 PAILERIA --}}
                                @if ($paqueteId == 14)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas6"
                                            class="block text-base font-medium text-gray-700">{{ $prendas6 }}</label>
                                        <select id="Selecionprendas6" wire:model="Selecionprendas6"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas10"
                                            class="block text-base font-medium text-gray-700">{{ $prendas10 }}</label>
                                        <select id="Selecionprendas10" wire:model="Selecionprendas10"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                {{-- Paqute 14 ENCERADOS --}}
                                @if ($paqueteId == 15)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas10"
                                            class="block text-base font-medium text-gray-700">{{ $prendas10 }}</label>
                                        <select id="Selecionprendas10" wire:model="Selecionprendas10"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                {{-- Paquete 15 SINDICATO --}}
                                @if ($paqueteId == 16)
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="Selecionprendas15"
                                            class="block text-base font-medium text-gray-700">{{ $prendas15 }}</label>
                                        <select id="Selecionprendas15" wire:model="Selecionprendas15"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[0] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="Selecionprendas3"
                                            class="block text-base font-medium text-gray-700">{{ $prendas3 }}</label>
                                        <select id="Selecionprendas3" wire:model="Selecionprendas3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[1] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                        <label for="Selecionprendas17"
                                            class="block text-base font-medium text-gray-700">{{ $prendas17 }}</label>
                                        <select id="Selecionprendas17" wire:model="Selecionprendas17"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            <option></option>
                                            @foreach ($tallas[2] as $ts)
                                                <option value="{{ $ts['id'] }}">{{ $ts['talla'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                            </div>

                            <div class="sm:grid row-start-1 grid-cols-3 gap-2 py-4 place-items-center">
                                <div class="mb-2 sm:m-0 col-span-1 col-start-2  @if ($seleccionPersonal) @else hidden @endif">
                                    <button type="button" wire:click="abrirModal"
                                        class="ml-1 inline-flex justify-center px-4 py-2 text-md font-black text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Siguiente
                                        </button>
                                    </div>
                                </div>
                            

                                <x-jet-dialog-modal wire:model="modalAbrir">
                                            <x-slot name="title">
                                                <p class="text-center text-2xl font-medium text-red-700">
                                                    {{ $paqueteEleccion }}
                                                </p>
                                            </x-slot>

                                            <x-slot name="content">
                                                <p class="block text-xl font-medium text-gray-700 py-2">
                                                    Nombre: {{ $nombreCompleto }} {{-- Número de colaborador: {{$colaboradorBusca}} --}}
                                                </p>

                                                <p class="block text-lg font-medium text-gray-700 py-2">
                                                    Area de trabajo:
                                                    @if ($unidadNegocioinput == '' || $sublineasinput == '')
                                                        @foreach ($areaExtras as $aE)
                                                            @if ($seleccionPersonalInput == $aE['id'])
                                                                {{ $aE['extra'] }}
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @if ($seleccionPersonalInput == '')
                                                        {{-- UnidadNegocio --}}
                                                        @foreach ($unidadNegocioLineas as $unl)
                                                            @if ($unidadNegocioinput == $unl)
                                                                {{ $unl }} /
                                                            @endif
                                                        @endforeach

                                                        {{-- Sublineas --}}
                                                        @if (count($sublineas) > 2)
                                                            @foreach ($sublineas as $sl)7
                                                                @if ($sublineasinput == $sl->id)
                                                                    {{ $sl->nombre_sublinea }} /
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @for ($i = 0; $i < count($sublineas); $i++)
                                                                @foreach ($sublineas[$i] as $sl)
                                                                    @if ($sublineasinput == $sl->id)
                                                                        {{ $sl->nombre_sublinea }} /
                                                                    @endif
                                                                @endforeach
                                                            @endfor
                                                        @endif

                                                        {{-- Calibres --}}
                                                        @if (count($calibres) > 10)
                                                            @foreach ($calibres as $cl)
                                                                @if ($calibresinput == $cl->id)
                                                                    {{ $cl->nombre_calibre }} /
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @for ($i = 0; $i < count($calibres); $i++)
                                                                @foreach ($calibres[$i] as $cl)
                                                                    @if ($calibresinput == $cl->id)
                                                                        {{ $cl->nombre_calibre }} /
                                                                    @endif
                                                                @endforeach
                                                            @endfor
                                                        @endif

                                                        {{-- Operaciones --}}
                                                        @if (count($operaciones) > 25)
                                                            @foreach ($operaciones as $os)
                                                                @if ($operacionesinput == $os->id)
                                                                    {{ $os->nombre_operacion }}
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @for ($i = 0; $i < count($operaciones); $i++)
                                                                @foreach ($operaciones[$i] as $os)
                                                                    @if ($operacionesinput == $os->id)
                                                                        {{ $os->nombre_operacion }}
                                                                    @endif
                                                                @endforeach
                                                            @endfor

                                                        @endif
                                                    @endif
                                                </p>

                                                @if ($paqueteId == null && $tallas == [])
                                                @else
                                                    {{-- Paquete 1 TORRE DE PLOMO --}}
                                                    @if ($paqueteId == 2)
                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($ts['id'] == $Selecionprendas15)
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($ts['id'] == $Selecionprendas3)
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($ts['id'] == $Selecionprendas4)
                                                                    {{ $prendas4 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[3] as $ts)
                                                                @if ($ts['id'] == $Selecionprendas9)
                                                                    {{ $prendas9 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    @endif
                                                    {{-- Paquete 2 PRODUCCION FC,FA Y ALAMACEN --}}
                                                    @if ($paqueteId == 3)
                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas16 == $ts['id'])
                                                                    {{ $prendas16 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    @endif
                                                    {{-- Paquete 3 BLANCO --}}
                                                    @if ($paqueteId == 4)
                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($ts['id'] == $Selecionprendas14)
                                                                    {{ $prendas14 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas18 == $ts['id'])
                                                                    {{ $prendas18 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas12 == $ts['id'])
                                                                    {{ $prendas12 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        @if ($this->genero == 'Masculino')
                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[4] as $ts)
                                                                    @if ($Selecionprendas20 == $ts['id'])
                                                                        {{ $prendas20 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[6] as $ts)
                                                                    @if ($Selecionprendas8 == $ts['id'])
                                                                        {{ $prendas8 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[7] as $ts)
                                                                    @if ($Selecionprendas11 == $ts['id'])
                                                                        {{ $prendas11 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[8] as $ts)
                                                                    @if ($Selecionprendas3 == $ts['id'])
                                                                        {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[9] as $ts)
                                                                    @if ($Selecionprendas21 == $ts['id'])
                                                                        {{ $prendas21 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[10] as $ts)
                                                                    @if ($Selecionprendas13 == $ts['id'])
                                                                        {{ $prendas13 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                        @endif

                                                        @if ($this->genero == 'Femenino')

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[3] as $ts)
                                                                    @if ($Selecionprendas22 == $ts['id'])
                                                                        {{ $prendas22 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[5] as $ts)
                                                                    @if ($Selecionprendas7 == $ts['id'])
                                                                        {{ $prendas7 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[6] as $ts)
                                                                    @if ($Selecionprendas8 == $ts['id'])
                                                                        {{ $prendas8 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[7] as $ts)
                                                                    @if ($Selecionprendas11 == $ts['id'])
                                                                        {{ $prendas11 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[8] as $ts)
                                                                    @if ($Selecionprendas3 == $ts['id'])
                                                                        {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[9] as $ts)
                                                                    @if ($Selecionprendas21 == $ts['id'])
                                                                        {{ $prendas21 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[10] as $ts)
                                                                    @if ($Selecionprendas13 == $ts['id'])
                                                                        {{ $prendas13 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>
                                                        @endif

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[11] as $ts)
                                                                @if ($Selecionprendas19 == $ts['id'])
                                                                    {{ $prendas19 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                    {{-- Paquete 4 Carga FC --}}
                                                    @if ($paqueteId == 5)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas17 == $ts['id'])
                                                                    {{ $prendas17 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas12 == $ts['id'])
                                                                    {{ $prendas12 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        @if ($this->genero == 'Masculino')

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[4] as $ts)
                                                                    @if ($Selecionprendas20 == $ts['id'])
                                                                        {{ $prendas20 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[6] as $ts)
                                                                    @if ($Selecionprendas1 == $ts['id'])
                                                                        {{ $prendas1 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[7] as $ts)
                                                                    @if ($Selecionprendas3 == $ts['id'])
                                                                        {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[8] as $ts)
                                                                    @if ($Selecionprendas8 == $ts['id'])
                                                                        {{ $prendas8 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                        @endif

                                                        @if ($this->genero == 'Femenino')

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[3] as $ts)
                                                                    @if ($Selecionprendas22 == $ts['id'])
                                                                        {{ $prendas22 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[5] as $ts)
                                                                    @if ($Selecionprendas7 == $ts['id'])
                                                                        {{ $prendas7 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[6] as $ts)
                                                                    @if ($Selecionprendas1 == $ts['id'])
                                                                        {{ $prendas1 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[7] as $ts)
                                                                    @if ($Selecionprendas3 == $ts['id'])
                                                                        {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[8] as $ts)
                                                                    @if ($Selecionprendas8 == $ts['id'])
                                                                        {{ $prendas8 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                        @endif

                                                    @endif
                                                    {{-- Paquete 5 Carga FA (Linea 22) --}}
                                                    @if ($paqueteId == 6)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas17 == $ts['id'])
                                                                    {{ $prendas17 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas12 == $ts['id'])
                                                                    {{ $prendas12 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        @if ($this->genero == 'Masculino')

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[4] as $ts)
                                                                    @if ($Selecionprendas20 == $ts['id'])
                                                                        {{ $prendas20 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[6] as $ts)
                                                                    @if ($Selecionprendas1 == $ts['id'])
                                                                        {{ $prendas1 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[7] as $ts)
                                                                    @if ($Selecionprendas3 == $ts['id'])
                                                                        {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[8] as $ts)
                                                                    @if ($Selecionprendas8 == $ts['id'])
                                                                        {{ $prendas8 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                        @endif

                                                        @if ($this->genero == 'Femenino')

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[3] as $ts)
                                                                    @if ($Selecionprendas22 == $ts['id'])
                                                                        {{ $prendas22 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[5] as $ts)
                                                                    @if ($Selecionprendas7 == $ts['id'])
                                                                        {{ $prendas7 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[6] as $ts)
                                                                    @if ($Selecionprendas1 == $ts['id'])
                                                                        {{ $prendas1 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[7] as $ts)
                                                                    @if ($Selecionprendas3 == $ts['id'])
                                                                        {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[8] as $ts)
                                                                    @if ($Selecionprendas8 == $ts['id'])
                                                                        {{ $prendas8 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                        @endif

                                                    @endif
                                                    {{-- Paquete 6 MANETENIMIENTO GENERAL --}}
                                                    @if ($paqueteId == 7)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas10 == $ts['id'])
                                                                    {{ $prendas10 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas12 == $ts['id'])
                                                                    {{ $prendas12 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[3] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        @if ($this->genero == 'Femenino')

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[5] as $ts)
                                                                    @if ($Selecionprendas8 == $ts['id'])
                                                                        {{ $prendas8 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                        @else

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[4] as $ts)
                                                                    @if ($Selecionprendas20 == $ts['id'])
                                                                        {{ $prendas20 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                            <p class="block text-base font-medium text-gray-700">
                                                                @foreach ($tallas[5] as $ts)
                                                                    @if ($Selecionprendas8 == $ts['id'])
                                                                        {{ $prendas8 }}: {{ $ts['talla'] }}
                                                                    @endif
                                                                @endforeach
                                                            </p>

                                                        @endif

                                                    @endif
                                                    {{-- Paquete 7 LAVADO(S) --}}
                                                    @if ($paqueteId == 8)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas16 == $ts['id'])
                                                                    {{ $prendas16 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>


                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas11 == $ts['id'])
                                                                    {{ $prendas11 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                    {{-- Paquete 8 HORNO(S) --}}
                                                    @if ($paqueteId == 9)
                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas10 == $ts['id'])
                                                                    {{ $prendas10 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    @endif
                                                    {{-- Paquete 9 Herramientas Especial --}}
                                                    @if ($paqueteId == 10)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas10 == $ts['id'])
                                                                    {{ $prendas10 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[3] as $ts)
                                                                @if ($Selecionprendas17 == $ts['id'])
                                                                    {{ $prendas17 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                    {{-- Paquete 10 CONTROL AMBIENTAL --}}
                                                    @if ($paqueteId == 11)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas10 == $ts['id'])
                                                                    {{ $prendas10 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                    {{-- Paquete 11 COMPONENTES (DETONADORES) --}}
                                                    @if ($paqueteId == 12)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas11 == $ts['id'])
                                                                    {{ $prendas11 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas17 == $ts['id'])
                                                                    {{ $prendas17 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[3] as $ts)
                                                                @if ($Selecionprendas16 == $ts['id'])
                                                                    {{ $prendas16 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[4] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                    {{-- Paquete 12 TROQUELADOS --}}
                                                    @if ($paqueteId == 13)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas2 == $ts['id'])
                                                                    {{ $prendas2 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas9 == $ts['id'])
                                                                    {{ $prendas9 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                    {{-- Paquete 13 PAILERIA --}}
                                                    @if ($paqueteId == 14)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas6 == $ts['id'])
                                                                    {{ $prendas6 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas10 == $ts['id'])
                                                                    {{ $prendas10 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                    {{-- Paqute 14 ENCERADOS --}}
                                                    @if ($paqueteId == 15)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas10 == $ts['id'])
                                                                    {{ $prendas10 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                    {{-- Paquete 15 SINDICATO --}}
                                                    @if ($paqueteId == 16)

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[0] as $ts)
                                                                @if ($Selecionprendas15 == $ts['id'])
                                                                    {{ $prendas15 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[1] as $ts)
                                                                @if ($Selecionprendas3 == $ts['id'])
                                                                    {{ $prendas3 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>


                                                        <p class="block text-base font-medium text-gray-700">
                                                            @foreach ($tallas[2] as $ts)
                                                                @if ($Selecionprendas17 == $ts['id'])
                                                                    {{ $prendas17 }}: {{ $ts['talla'] }}
                                                                @endif
                                                            @endforeach
                                                        </p>

                                                    @endif
                                                @endif

                                            </x-slot>

                                            <x-slot name="footer">
                                                <x-jet-danger-button wire:click="cerrarModal()">
                                                    {{ __('Cerrar') }}
                                                </x-jet-danger-button>

                                                <x-jet-secondary-button type="submit">
                                                    {{ __('Guardar') }}
                                                </x-jet-secondary-button>

                                            </x-slot>
                                </x-jet-dialog-modal>
                            
                        </form>

                    </div>

                    <button wire:click="showTabla" type="button"
                        class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Regresar</button>
                </div>

            </fieldset>
        @endif
        
        @if ($verRegistro == true && $busquedaNuevo == false)
            {{-- Ver registro --}}
            <fieldset class="grid  gap-6 p-6 rounded-lg shadow-md @if ($verRegistro == true && $busquedaNuevo == false)  @else hidden @endif">  

                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3 @if ($verRegistro == true && $busquedaNuevo == false) divide-y-2 divide-gray-200 @else hidden @endif">
                    
                    {{-- foto,Nombre,tags --}}
                    <div class="col-span-full sm:col-span-6">
                        
                        <div class="col-span-full sm:col-span-6">
                            <img src="{{ asset('storage') . '/' . $foto }}" alt="Profile face"
                                class="p-1 w-24 h-24 mx-auto rounded-full  object-cover ring-2 ring-offset-4 @if ($genero == 'Masculino') ring-blue-500 @else ring-pink-500 @endif"
                                loading="lazy">
                        </div>

                        <div class="col-span-full sm:col-span-6 p-3">

                            <p class="text-center w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 text-xl">
                                {{ $nombreCompleto }}
                            </p>

                            <div class="flex justify-center space-x-1">

                                <p class="text-center rounded-md text-xl">
                                    <span class="px-2 py-1  text-sm rounded text-white  bg-gray-400 ">
                                        {{ $tipo_usuario }}
                                    </span>
                                </p>

                                <p class="text-center rounded-full text-xl">
                                    @if ($genero == 'Masculino')
                                        <p class="px-3 py-2 text-base rounded-full text-white bg-blue-500 w-10 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                                            </svg>
                                        </p>
                                    @else
                                        <p class="px-3 py-2 text-base rounded-full text-white  bg-pink-500 w-10 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                                            </svg>
                                        </p>
                                    @endif
                                </p>

                            </div>

                        </div>

                    </div>
                

                    {{-- Area y seleccion de la operacion al que pertenece --}}
                    <div class="col-span-full sm:col-span-6 py-3">

                        <p class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                            Área: {{ $area }}
                        </p>
                        <p class="py-4 w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                            @if ( $areaTrabajoUnidadShow == [] )
                                Area de trabajo: {{ $areaTrabajoExtraShow }}
                            @else
                                Area de trabajo: {{ $areaTrabajoUnidadShow[0]->id_unidadnegocio }} {{ $areaTrabajoUnidadShow[0]->nombre_linea }} {{ $areaTrabajoUnidadShow[0]->nombre_sublinea }} / {{ $areaTrabajoUnidadShow[0]->nombre_operacion }}
                            @endif
                        </p>

                        <div class="sm:grid row-start-1 grid-cols-3 gap-2 py-4 justify-center">

                            {{-- Area --}}
                            <div class="mb-2 sm:m-2 col-span-full">

                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <caption>
                                                        <div class="mb-2 sm:m-2 col-span-full">
                                                            <p class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 text-lg text-center">
                                                                {{ $paqueteId }}
                                                            </p>
                                                        </div>
                                                    </caption>
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prenda</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Talla</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        @foreach ($uniformesShow as $uS)
                                                            <tr class="hover:bg-gray-300">
                                                                <td class="px-6 py-4 whitespace-nowrap">{{$uS->prenda}}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap">{{ $uS->talla }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>

                    </div>

                    <button wire:click="showTabla" type="button"
                        class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Regresar</button>
                </div>

            </fieldset>
        @endif

        @if ($verRegistro == false && $busquedaNuevo == false )
            <fieldset class="grid  gap-6 p-6 rounded-lg shadow-md @if ($verRegistro == false && $busquedaNuevo == false)  @else hidden @endif">
                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3 @if ($verRegistro == false && $busquedaNuevo == false) divide-y-2 divide-gray-200 @else hidden @endif">
                    {{-- foto,Nombre,tags --}}
                    <div class="col-span-full sm:col-span-6">
                        
                        <div class="col-span-full sm:col-span-6">
                            <img src="{{ asset('storage') . '/' . $foto }}" alt="Profile face"
                                class="p-1 w-24 h-24 mx-auto rounded-full  object-cover ring-2 ring-offset-4 @if ($genero == 'Masculino') ring-blue-500 @else ring-pink-500 @endif"
                                loading="lazy">
                        </div>

                        <div class="col-span-full sm:col-span-6 p-3">

                            <p class="text-center w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 text-xl">
                                {{ $nombreCompleto }}
                            </p>

                            <div class="flex justify-center space-x-1">

                                <p class="text-center rounded-md text-xl">
                                    <span class="px-2 py-1  text-sm rounded text-white  bg-gray-400 ">
                                        {{ $tipo_usuario }}
                                    </span>
                                </p>

                                <p class="text-center rounded-full text-xl">
                                    @if ($genero == 'Masculino')
                                        <p class="px-3 py-2 text-base rounded-full text-white bg-blue-500 w-10 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                                            </svg>
                                        </p>
                                    @else
                                        <p class="px-3 py-2 text-base rounded-full text-white  bg-pink-500 w-10 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                                            </svg>
                                        </p>
                                    @endif
                                </p>

                            </div>

                        </div>

                    </div>


                    <button wire:click="showTabla" type="button"
                        class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Regresar</button>

                </div>
            </fieldset>
        @endif
        

    </section>

    {{-- Mostrar todos que ya tienen registrado su talla --}}
    <section class="@if ($mostrarTabla)  @else hidden @endif">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                            <select wire:model='perPage'
                                class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>

                            <button type="button" wire:click="showRegistro"
                                class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Nuevo
                            </button>
                        </div>

                        <div class="col-span-3 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                            <input wire:model="search" type="text" placeholder="Buscar"
                                class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </tr>
            </thead>

            @if (count($colaborador_uniforme_paquete) > 0)
            
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($colaborador_uniforme_paquete as $cUp)
                        <tr class="hover:bg-gray-300">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                <div class="flex items-center">
                                    <div
                                        class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                        @if (file_exists(public_path('storage/' . $cUp->foto)))
                                            <img class="w-20 rounded shadow h-24"
                                                src="{{ asset('storage') . '/' . $cUp->foto }}" alt=""
                                                loading="lazy">
                                        @else
                                            <img class="w-20 rounded shadow h-24"
                                                src="{{ asset('images/user_toolkit.jpg') }}" alt="" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="ml-4 whitespace-pre-line">
                                        <div class="text-sm font-medium text-gray-900">
                                            <span class="sm:inline-block sm:-mt-6">{{ $cUp->nombre_desc }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <p><a class="text-black">Nombre paquete:</a> {{ $cUp->nombre_paquete }}</p>
                            </td>

                            <td class="@if ($mostrarBntEditar) @else hidden @endif">
                                <div class="flex justify-center py-4 cursor-pointer">
                                    <div class="px-2 transform text-green-500 hover:text-green-700 hover:scale-150">
                                        <a wire:click="ver({{ $cUp->no_colaborador }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="transform text-yellow-500 hover:text-yellow-700 hover:scale-150">
                                        <a wire:click="editar({{ $cUp->no_colaborador }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            @else
                {{-- Error search --}}
                <div
                    class="grid xs:grid-cols-1 sm:grid-cols-1 px-4 py-3 bg-white border-t border-gray-200 sm:px-6 text-center justify-center object-center">
                    <h6 class="text-center text-gray-500">No se encontró a ningún campo que coincida</h6>
                </div>
            @endif
        </table>
        <div class="grid xs:grid-cols-1 sm:grid-cols-1 bg-white border-t border-gray-200 sm:px-6 py-4">
            {{ $colaborador_uniforme_paquete->links() }}
        </div>
    </section>

</div>
