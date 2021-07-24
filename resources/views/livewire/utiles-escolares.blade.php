<div class="sm:p-8 p-2 mx-auto bg-gray-100">
    <header class="bg-white rounded-md shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-xl text-center font-semibold leading-tight text-red-700">
                alpha v.0.1 utiles
            </h2>
        </div>
    </header>

    <div class="p-4 grid grid-rows-1 rounded-md shadow-2xl">

        <div class="p-4 grid">
            @if (count($utiles) >= 2)
                <p>No puedes añadir mas kits de utiles.</p>
                <p>Solo dos kits por colaborador.</p>
            @else
                @if ($no_colaborador->tipo_contrato_id == 3)
                    <p>Tienes {{ count($utiles)}} te faltan {{ 2-count($utiles) }}</p>
                    <form wire:submit.prevent="triggerConfirm" enctype="multipart/form-data">
                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                            <label for="no_kits" class="block text-sm font-medium text-gray-700">Numero de kits de
                                utiles
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

                        <button type="submit">Guardar</button>
                    </form>

                @else
                    <p>No puedes por que eres temporal</p>
                @endif
            @endif
        </div>
    </div>
</div>
