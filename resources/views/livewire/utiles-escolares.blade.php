<div class="sm:p-8 p-2 mx-auto bg-gray-100">
    <header class="bg-white rounded-md shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-xl text-center font-semibold leading-tight text-red-700">
                UTILES ESCOLARES
            </h2>
        </div>
    </header>

    <div class="p-2 grid grid-rows-1 rounded-md shadow-2xl">

        <div class="p-4 grid">
            @if (count($utiles) == 1)
            <div class="mb-4">
                <p class="text-red-700 italic animate-pulse">
                    Has registrado un kit, puedes registrar uno más o volver a Factor.
                </p>
            </div>
            @else

            @endif
            @if (count($utiles) >= 2)

            <div class="">
                <div class="text-xl text-center font-medium text-gray-800 mb-4">
                    <p>
                        No puedes añadir mas kits de útiles.
                    </p>
                    <br>
                    <p>
                        Solo dos kits por colaborador.
                    </p>
                </div>
                <div class="flex justify-center px-4 col-span-1 col-start-1">
                    <a href="https://factoraguila.com/blog/2021/07/28/paquetes/"
                        class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Regresar</a>
                </div>
            </div>

            <p></p>
            <p></p>
            @else
            @if ($colaborador->tipo_contrato_id == 3)
            <div class="mb-4">
                <a wire:click="setTrue" class="text-blue-700 hover:text-red-700 cursor-pointer">
                    Toca aquí para leer las Instrucciones
                </a>
            </div>


            <form wire:submit.prevent="triggerConfirm" enctype="multipart/form-data">
                <div class="">
                    <div class="">

                    </div>

                </div>
                <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                    <label for="no_kits" class="block text-sm font-medium text-gray-700">Número de kits de
                        útiles
                        escolares</label>
                    <select id="no_kits" wire:model="no_kits" name="no_kits"
                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option></option>
                        @if (count($utiles)==0)
                        <option value="1">1</option>
                        <option value="2">2</option>
                        @endif
                        @if ( count($utiles)== 1 )
                        <option value="1">1</option>
                        @endif
                    </select>
                    @error('no_kits')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                @if (($no_kits == '') | ($no_kits == 0))

                @else
                <br>
                @if ($no_kits == 1)
                <div class="mb-4 sm:m-0 col-span-1 col-start-2">
                    <label for="no_kits" class="block text-sm font-medium text-gray-700">Kit 1</label>
                    <select id="escolaridad_id1" wire:model="escolaridad_id1" name="escolaridad_id1"
                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option></option>
                        @if ($escolaridad)
                        @foreach ($escolaridad as $Es)
                        <option value="{{ $Es->id }}"> {{ $Es->nombre_escolaridad }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                    @error('escolaridad_id1')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                @endif
                @if ($no_kits == 2)
                @if (count($utiles) ==1)
                <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                    <label for="no_kits" class="block text-sm font-medium text-gray-700">Kit 1</label>
                    <select id="escolaridad_id1" wire:model="escolaridad_id1" name="escolaridad_id1"
                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option></option>
                        @if ($escolaridad)
                        @foreach ($escolaridad as $Es)
                        <option value="{{ $Es->id }}"> {{ $Es->nombre_escolaridad }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                    @error('escolaridad_id1')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                @endif
                @if (count($utiles)==0)
                <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                    <label for="no_kits" class="block text-sm font-medium text-gray-700">Kit 1</label>
                    <select id="escolaridad_id1" wire:model="escolaridad_id1" name="escolaridad_id1"
                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option></option>
                        @if ($escolaridad)
                        @foreach ($escolaridad as $Es)
                        <option value="{{ $Es->id }}"> {{ $Es->nombre_escolaridad }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                    @error('escolaridad_id1')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                    <label for="no_kits" class="block text-sm font-medium text-gray-700">Kit 2</label>
                    <select id="escolaridad_id2" wire:model="escolaridad_id2" name="escolaridad_id2"
                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option></option>
                        @if ($escolaridad)
                        @foreach ($escolaridad as $Es)
                        <option value="{{ $Es->id }}"> {{ $Es->nombre_escolaridad }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                    @error('escolaridad_id2')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                @endif

                @endif
                @endif

                <div class="h-16 p-3 mt-6 grid grid-cols-2">
                    <div class="flex justify-start px-4 col-span-1 col-start-1">
                        <a href="https://factoraguila.com/blog/2021/07/28/paquetes/"
                            class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Regresar</a>
                    </div>
                    <div class="flex justify-end px-4 col-span-1 col-start-2">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-red-900 focus:outline-none focus:border-green-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Registrar
                    </div>
                </div>
            </form>

            @else
            <div class="">
                <div class="text-xl text-center font-medium text-gray-800 mb-4">
                    <p>
                        Lo sentimos, el registro solo está habilitado para colaboradores con contrato de planta.
                    </p>
                    <br>
                    <p>
                        Puedes regresar a Factor usando el siguiente botón.
                    </p>
                </div>
                <div class="flex justify-center px-4 col-span-1 col-start-1">
                    <a href="https://factoraguila.com/blog/2021/07/28/paquetes/"
                        class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Regresar</a>
                </div>
            </div>

            @endif
            @endif
        </div>
    </div>

    <x-jet-dialog-modal wire:model="popupRegistro">
        <x-slot name="title">
            <p class="text-center text-2xl font-medium text-red-700">
                Instrucciones
            </p>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4 ml-3">
                <p class="text-center text-xl font-medium text-gray-700">
                    <p>
                        Usa el selector para elegir el número de Kits
                        que deseas registrar, en seguida tendrás que elegir cuál es el nivel
                        de estudios para el que necesitas el kit.
                    </p>
                    <br>
                    <p>
                        Al final toca el botón verde que dice: "Registrar" para almacenar los datos de tu kit.
                    </p>
                    <br>
                    <p>
                        Puedes registrar un máximo de 2 kits, si ya registraste uno y necesitas otro,
                        puedes agregarlo ingresando de nuevo a este formulario.
                    </p>
                    <br>
                    <p>
                        Si necesitas eliminar alguno de los kits, debes acudir al área de comunicación para realizar la
                        cancelación de
                        estos.
                    </p>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="setNull()">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>