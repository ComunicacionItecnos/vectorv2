<div class="sm:p-8 p-2 mx-auto my-auto bg-white">
    <div class="p-2 grid grid-rows-1 rounded-md shadow-2xl">
        <div class="p-2 grid">
            <div class="mb-2">
                <p class="mt-4 antialiased text-left text-gray-700 font-semibold text-xl">
                    {{ $nombrePaquete }} {{ $currentStep }} - {{ $totalSteps }}
                </p>
                </p>
            </div>
            <form wire:submit.prevent="registro">
                <div class="grid gap-2">
                    <div class="sm:grid row-start-1 grid-cols-4 gap-2">
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">

                            <div class="grid grid-rows-1 h-80 w-full mb-4">
                                <div class="row-start-1 col-start-1 p-4">
                                    @if($paqueteId == 1)
                                    <div class="h-full w-full rounded-lg shadow-lg">
                                        <img class="h-full w-full rounded-lg shadow-lg"
                                            src="{{ asset('images/Uniformes/Paquete_Aniversario/0.jpg') }}" alt="">
                                    </div>
                                    @endif
                                    @if($paqueteId == 2)
                                    @if($currentStep == 0)
                                    <div class="h-full w-full rounded-lg shadow-lg">
                                        <img class="h-full w-full rounded-lg shadow-lg"
                                            src="{{ asset('images/Uniformes/Paquete_1/0.jpg') }}" alt="">
                                    </div>
                                    @endif
                                    @if($currentStep == 1)
                                    <div class="h-full w-full rounded-lg shadow-lg">
                                        <img class="h-full w-full rounded-lg shadow-lg"
                                            src="{{ asset('images/Uniformes/Paquete_1/1.png') }}" alt="">
                                    </div>
                                    @endif
                                    @if($currentStep == 2)
                                    <div class="h-full w-full rounded-lg shadow-lg">
                                        <img class="h-full w-full rounded-lg shadow-lg"
                                            src="{{ asset('images/Uniformes/Paquete_1/2.jpg') }}" alt="">
                                    </div>
                                    @endif
                                    @if($currentStep == 3)
                                    <div class="h-full w-full rounded-lg shadow-lg">
                                        <img class="h-full w-full rounded-lg shadow-lg"
                                            src="{{ asset('images/Uniformes/Paquete_1/3.jpg') }}" alt="">
                                    </div>
                                    @endif
                                    @endif
                                    @if($paqueteId == 3)
                                    @if($currentStep == 0)
                                    <div class="h-full w-full rounded-lg shadow-lg">
                                        <img class="h-full w-full rounded-lg shadow-lg"
                                            src="{{ asset('images/Uniformes/Paquete_2/0.jpg') }}" alt="">
                                    </div>
                                    @endif
                                    @if($currentStep == 1)
                                    <div class="h-full w-full rounded-lg shadow-lg">
                                        <img class="h-full w-full rounded-lg shadow-lg"
                                            src="{{ asset('images/Uniformes/Paquete_2/1.png') }}" alt="">
                                    </div>
                                    @endif
                                    @if($currentStep == 2)
                                    <div class="h-full w-full rounded-lg shadow-lg">
                                        <img class="h-full w-full rounded-lg shadow-lg"
                                            src="{{ asset('images/Uniformes/Paquete_2/2.jpg') }}" alt="">
                                    </div>
                                    @endif
                                    @endif
                                </div>
                                {{-- <div class="row-start-1 col-start-1">
                                <div class="grid grid-rows-5 grid-cols-4 h-80 w-full">
                                    <div
                                        class="mx-auto row-start-3 col-start-1 transform border-0 hover:text-red-700 hover:scale-130 opacity-50 hover:opacity-100">
                                        <button class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div
                                        class="mx-auto row-start-3 col-start-4 transform border-0 hover:text-red-700 hover:scale-130 opacity-50 hover:opacity-100">
                                        <button class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                            </div>
                        </div>

                        @if ($paqueteId == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Playera polo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif


                        @if ($paqueteId == 2)

                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="pantalon_mezclilla" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalón de mezclilla
                            </label>
                            <select id="pantalon_mezclilla" wire:model="pantalon_mezclilla" name="plantalon_mezclilla"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('pantalon_mezclilla')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="pantalon_mezclilla" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dieléctrica
                            </label>
                            <select id="pantalon_mezclilla" wire:model="pantalon_mezclilla" name="plantalon_mezclilla"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('pantalon_mezclilla')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="pantalon_mezclilla" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Metatarzal
                            </label>
                            <select id="pantalon_mezclilla" wire:model="pantalon_mezclilla" name="plantalon_mezclilla"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('pantalon_mezclilla')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 3)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="pantalon_mezclilla" class="block text-xl font-medium text-gray-700">
                                Camisola Mezclilla
                            </label>
                            <select id="pantalon_mezclilla" wire:model="pantalon_mezclilla" name="plantalon_mezclilla"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('pantalon_mezclilla')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if ($paqueteId == 3)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="pantalon_mezclilla" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalón de mezclilla
                            </label>
                            <select id="pantalon_mezclilla" wire:model="pantalon_mezclilla" name="plantalon_mezclilla"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('pantalon_mezclilla')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="pantalon_mezclilla" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dieléctrica
                            </label>
                            <select id="pantalon_mezclilla" wire:model="pantalon_mezclilla" name="plantalon_mezclilla"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('pantalon_mezclilla')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Playera polo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 4)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon 100 % Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Playera Tipo Polo Blanca
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Cofia 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 3)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantaleta 100 % Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 4)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Truza 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 5)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Brasiere Blanco
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 6)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Calcetas 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 7)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dielectrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 8)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Zapato Conductivo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 9)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Mandil 100 % Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 10)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Sudadera
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 5)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Playera Tipo Polo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Cofia 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 3)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                @if($genero_id == 1)
                                Talla de Truza 100 % Algodón
                                @else
                                Talla de Pantaleta 100 % Algodón
                                @endif
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 4)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Brasiere Blanco
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 5)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Bota Dieléctrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 6)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Calcetas 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 6)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Playera Tipo Polo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Cofia 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 3)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                @if($genero_id == 1)
                                Talla de Truza 100 % Algodón
                                @else
                                Talla de Pantaleta 100 % Algodón
                                @endif
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 4)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Brasiere Blanco
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 5)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Zapato Conductivo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 6)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dieléctrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 7)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Calcetas 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 7)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Camisola Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Cofia 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 3)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dielectrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 4)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Truza 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 5)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Calcetas 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 8)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Poliester
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dielectrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Camisola Poliester
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 9)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dielectrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Camisola Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 10)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dielectrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Camisola Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 3)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Playera Tipo Polo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 11)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dielectrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Playera Tipo Polo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 12)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Camisola Poliester
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Playera Tipo Polo
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 3)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Poliester
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 4)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dielectrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 5)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Calcetas 100% Algodón
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 13)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Antivibracion
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Camisa de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 14)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Para Soldador
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Camisola de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                        @if($paqueteId == 15)
                        @if($currentStep == 0)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Pantalon de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 1)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Bota Dielectrica
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @if($currentStep == 2)
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1 px-4">
                            <label for="playera60" class="block text-xl font-medium text-gray-700">
                                Talla de Camisola de Mezclilla
                            </label>
                            <select id="playera60" wire:model="playera60" name="playera_60"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                                @endforeach
                            </select>
                            @error('playera60')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @endif
                        @endif

                    </div>
                </div>
        </div>
        <div class="mt-4 h-16 p-2 grid @if ($currentStep == 0) grid-cols-1 @else grid-cols-2 @endif">
            <div class="flex justify-start px-4 col-span-1 col-start-1">
                <button type="button"
                    class="@if ($currentStep == 0) hidden @else @endif inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    @if($paqueteId==5 || $paqueteId==6) @if ($currentStep==5) wire:click="doubleDecreaseStep()" @else
                    wire:click="decreaseStep()" @endif @else wire:click="decreaseStep()" @endif>
                    Regresar
                </button>
            </div>
            <div
                class="flex px-4 col-span-1 @if($currentStep == 0 && $totalSteps >= 1) col-start-1 justify-center @elseif($totalSteps >= 1 && $currentStep < $totalSteps) col-star-2 justify-end @else col-start-2 justify-end hidden @endif">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    wire:click="increaseStep()">
                    Siguiente
                </button>
            </div>
            <div
                class="flex px-4 col-span-1 @if ($totalSteps == 0) col-star-1 justify-center @elseif($currentStep == $totalSteps) col-start-2 justify-end @else hidden @endif">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Finalizar
                </button>
            </div>
        </div>
    </div>
    </form>
</div>