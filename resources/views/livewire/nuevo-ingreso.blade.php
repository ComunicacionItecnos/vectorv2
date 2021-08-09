<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">

        {{-- Step 1 --}}
        @if ($currentStep == 1)
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
                            class="h-7 sm:h-8" />
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <p>Ingresa tu CURP para proseguir el registro</p>

                            <div class="sm:grid row-start-1 grid-cols-1 gap-1">
                                <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                    <input type="text" name="curp" id="curp" wire:model="curp"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('curp')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
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

                        </div>

                    </div>
                </div>
            </div>
        @endif

        @if ($curpValida == false)

            <form wire:submit.prevent="registro" enctype="multipart/form-data">

                {{-- Step 2 --}}
                @if ($currentStep == 2)
                    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                        <div class="max-w-md mx-auto">
                            <div>
                                <img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
                                    class="h-7 sm:h-8" />
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <p>Datos personales - parte 1</p>

                                </div>
                                <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                    <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="nombre_1">Primer nombre</label>
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
                                                for="ap_paterno">Apellido paterno</label>
                                            <input type="text" wire:model="ap_paterno" name="ap_paterno" id="ap_paterno"
                                                value="{{ old('ap_paterno') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('ap_paterno')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="ap_materno">Apellido materno</label>
                                            <input type="text" wire:model="ap_materno" name="ap_materno" id="ap_materno"
                                                value="{{ old('ap_materno') }}"
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
                                                for="fecha_nacimiento">Fecha de nacimiento</label>
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
                                                class="block text-sm font-medium text-gray-700">Genero</label>
                                            <select id="genero_id" wire:model="genero_id" name="genero_id"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option></option>
                                                @if ($genero)
                                                    @foreach ($genero as $g)
                                                        <option value="{{ $g->id }}">{{ $g->nombre_genero }}
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

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Step 3 --}}
                @if ($currentStep == 3)
					<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
						<div class="max-w-md mx-auto">
							<div>
								<img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
									class="h-7 sm:h-8" />
							</div>
							<div class="divide-y divide-gray-200">
								<div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
									<p>Datos personales - parte 2</p>

								</div>
								<div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

									<div class="sm:grid row-start-1 grid-cols-2 gap-2">

										<div class="mb-2 sm:m-0 col-span-1 col-start-1">
											<label for="estado_civil_id"
												class="block text-sm font-medium text-gray-700">Estado civil</label>
											<select id="estado_civil_id" wire:model="estado_civil_id" name="estado_civil_id"
												class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
												<option></option>
												@if ($estado_civil)
													@foreach ($estado_civil as $ec)
														<option value="{{ $ec->id }}">{{ $ec->nombre_estado }}
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
											<label class="block text-base font-medium text-gray-700"
												for="actaMatrimonio">Acta de matrimonio</label>
												@if ($estado_civil_id == 2)
													<label
														class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
														<svg xmlns="http://www.w3.org/2000/svg"
															class="h-5 w-5" viewBox="0 0 20 20"
															fill="currentColor">
															<path
																d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
															<path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
														</svg>
														<input type='file' wire:model="actaMatrimonio"
															accept=".pdf" class="hidden"/>
													</label>
												@else
													<label
														class="cursor-not-allowed opacity-50 flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
														<svg xmlns="http://www.w3.org/2000/svg"
															class="h-5 w-5" viewBox="0 0 20 20"
															fill="currentColor">
															<path
																d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
															<path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
														</svg>
														<input type='file' wire:model="actaMatrimonio"
															accept=".pdf" class="hidden" disabled />
													</label>
												@endif
										</div>

									</div>

									<div class="sm:grid row-start-1 grid-cols-2 gap-2">

										<div class="mb-2 sm:m-0 col-span-1 col-start-1">
											<label class="block text-base font-medium text-gray-700"
												for="paternidad_id">¿Tienes hijos?</label>
                                                <select id="paternidad_id" wire:model="paternidad_id" name="paternidad_id"
												class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
											<label class="block text-base font-medium text-gray-700"
												for="actasHijo">Actas de los hijos</label>
											@if ($paternidad_id == 1)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="actasHijo"
                                                    accept=".pdf" class="hidden" multiple />
                                                </label>
                                            @else
                                                <label
                                                    class="cursor-not-allowed opacity-50 flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="actasHijo"
                                                        accept=".pdf" class="hidden" disabled />
                                                </label>
                                            @endif
										</div>

									</div>

									<div class="sm:grid row-start-1 grid-cols-2 gap-2">

										<div class="mb-2 sm:m-0 col-span-1 col-start-1">
											<label class="block text-base font-medium text-gray-700"
												for="curpDoc">CURP documento</label>

                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="curpDoc"
                                                    accept=".pdf" class="hidden"/>
                                            </label>
											@error('curpDoc')
												<p class="mt-1 mb-1 text-xs text-red-600 italic">
													{{ $message }}
												</p>
											@enderror
                                            
										</div>

										<div class="mb-2 sm:m-0 col-span-1 col-start-2">
											<label for="actaNacimiento"
												class="block text-sm font-medium text-gray-700">Acta de nacimiento</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="actaNacimiento"
                                                    accept=".pdf" class="hidden"/>
                                            </label>
											@error('actaNacimiento')
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
                @endif

                {{-- Step 4 --}}
                @if ($currentStep == 4)
                    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                        <div class="max-w-md mx-auto">
                            <div>
                                <img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
                                    class="h-7 sm:h-8" />
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <p>Datos personales - parte 3</p>
                                </div>
                                <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                                    
                                    <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="rfc">RFC</label>
                                            <input type="text" wire:model="rfc" name="rfc" id="rfc"
                                                value="{{ old('rfc') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('rfc')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
											<label for="rfcDoc"
												class="block text-sm font-medium text-gray-700">RFC documento</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="rfcDoc"
                                                    accept=".pdf" class="hidden"/>
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
                                                for="no_social_social">Numero de seguro social</label>
                                            <input type="text" wire:model="no_social_social" name="no_social_social" id="no_social_social"
                                                value="{{ old('no_social_social') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('no_social_social')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
											<label for="altaImssDoc"
												class="block text-sm font-medium text-gray-700">Alta del IMSS documento</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="altaImssDoc"
                                                    accept=".pdf" class="hidden"  />
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
												class="block text-sm font-medium text-gray-700">Credencial IFE</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="credencialIFE"
                                                    accept=".pdf" class="hidden"  />
                                            </label>
											@error('credencialIFE')
												<p class="mt-1 mb-1 text-xs text-red-600 italic">
													{{ $message }}
												</p>
											@enderror
										</div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
											<label for="cartillaMilitar"
												class="block text-sm font-medium text-gray-700">Cartilla militar</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="cartillaMilitar"
                                                    accept=".pdf" class="hidden"  />
                                            </label>
											@error('cartillaMilitar')
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
                @endif

                {{-- Step 5 --}}
                @if ($currentStep == 5)
                    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                        <div class="max-w-md mx-auto">
                            <div>
                                <img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
                                    class="h-7 sm:h-8" />
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <p>Datos personales - parte 4</p>
                                </div>
                                <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                                    
                                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                                    
                                        <div class="sm:grid row-start-1 grid-cols-2 gap-2">
                                            @if ($genero_id == 1 )
                                                <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                                    <label class="block text-base font-medium text-gray-700"
                                                        for="tallaPantalon">Talla de pantalon hombre</label>
                                                    <select id="tallaPantalon" wire:model="tallaPantalon" name="tallaPantalon"
                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                                                        for="tallaPantalon">Talla de pantalon mujer</label>
                                                    <select id="tallaPantalon" wire:model="tallaPantalon" name="tallaPantalon"
                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
    
                                            @if ($genero_id == 1 )
                                                <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                    <label class="block text-base font-medium text-gray-700"
                                                        for="tallaPlayera">Talla de playera hombre</label>
                                                    <select id="tallaPlayera" wire:model="tallaPlayera" name="tallaPlayera"
                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                                            @elseif ($genero_id == 2)
                                                <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                                    <label class="block text-base font-medium text-gray-700"
                                                        for="tallaPlayera">Talla de playera mujer</label>
                                                    <select id="tallaPlayera" wire:model="tallaPlayera" name="tallaPlayera"
                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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

                                            @if ($genero_id == 1 )
                                                <div class="mb-2 sm:m-0 col-span-2 col-start-1">
                                                    <label class="block text-base font-medium text-gray-700"
                                                        for="tallazapatos">Talla de calzado hombre</label>
                                                    <select id="tallazapatos" wire:model="tallazapatos" name="tallazapatos"
                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                                                        for="tallazapatos">Talla de calzado mujer</label>
                                                    <select id="tallazapatos" wire:model="tallazapatos" name="tallazapatos"
                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                                            @endif
    
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Step 6 --}}
                @if ($currentStep == 6)
                    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                        <div class="max-w-md mx-auto">
                            <div>
                                <img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
                                    class="h-7 sm:h-8" />
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <p>Domicilio particular</p>
                                </div>
                                <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                                    
                                    <div class="sm:grid row-start-1 grid-cols-3 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="domicilio">Calle</label>
                                            <input type="text" wire:model="domicilio" name="domicilio" id="domicilio"
                                                value="{{ old('domicilio') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('domicilio')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="numeroExterior">Numero exterior</label>
                                            <input type="text" wire:model="numeroExterior" name="numeroExterior" id="numeroExterior"
                                                value="{{ old('numeroExterior') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('numeroExterior')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="numeroInterior">Numero interior</label>
                                            <input type="text" wire:model="numeroInterior" name="numeroInterior" id="numeroInterior"
                                                value="{{ old('numeroInterior') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('numeroInterior')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="colonia">Colonia</label>
                                            <input type="text" wire:model="colonia" name="colonia" id="colonia"
                                                value="{{ old('colonia') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('colonia')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="municipio">Municipio</label>
                                            <input type="text" wire:model="municipio" name="municipio" id="municipio"
                                                value="{{ old('municipio') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('municipio')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="codigo_postal">Codigo postal</label>
                                            <input type="text" wire:model="codigo_postal" name="codigo_postal" id="codigo_postal"
                                                value="{{ old('codigo_postal') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('codigo_postal')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="estado">Estado</label>
                                            <input type="text" wire:model="estado" name="estado" id="estado"
                                                value="{{ old('estado') }}"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                                            @error('estado')
                                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="nacionalidad_id"
                                                class="block text-sm font-medium text-gray-700">Nacionalidad</label>
                                            <select id="nacionalidad_id" wire:model="nacionalidad_id" name="nacionalidad_id"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option></option>
                                                @if ($nacionalidad)
                                                    @foreach ($nacionalidad as $n)
                                                        <option value="{{ $n->id }}">{{ $n->pais }}
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

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
											<label for="comprobranteDomicilio"
												class="block text-sm font-medium text-gray-700">Comprobante de domicilio</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="comprobranteDomicilio"
                                                    accept=".pdf" class="hidden"  />
                                            </label>
											@error('comprobranteDomicilio')
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
                @endif

                {{-- Step 7 --}}
                @if ($currentStep == 7)
                    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                        <div class="max-w-md mx-auto">
                            <div>
                                <img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
                                    class="h-7 sm:h-8" />
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <p>Datos de contacto</p>
                                </div>
                                <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                                    
                                    <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="tel_fijo">Telefono fijo</label>
                                            <input type="text" wire:model="tel_fijo" name="tel_fijo" id="tel_fijo"
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
                                                for="tel_movil">Telefono celular</label>
                                            <input type="text" wire:model="tel_movil" name="tel_movil" id="tel_movil"
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
                                                for="correo">Correo electronico</label>
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
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Step 8 --}}
                @if ($currentStep == 8)
                    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                        <div class="max-w-md mx-auto">
                            <div>
                                <img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
                                    class="h-7 sm:h-8" />
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <p>Escolaridad</p>
                                    
                                </div>
                                <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                                   
                                    <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                            <label for="escolaridad_id"
                                                class="block text-sm font-medium text-gray-700">Nivel de estudios</label>
                                            <select id="escolaridad_id" wire:model="escolaridad_id" name="escolaridad_id"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
												class="block text-sm font-medium text-gray-700">Constancia de estudios</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="constanciaEstudios"
                                                    accept=".pdf" class="hidden"  />
                                            </label>
											@error('constanciaEstudios')
												<p class="mt-1 mb-1 text-xs text-red-600 italic">
													{{ $message }}
												</p>
											@enderror
										</div>

                                    </div>

                                    @if ($escolaridad_id >=4)
                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                            <label class="block text-base font-medium text-gray-700"
                                                for="especialidadEstudios">Especialidad de estudios</label>
                                            <input type="text" wire:model="especialidadEstudios" name="especialidadEstudios" id="especialidadEstudios"
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
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Step 9 --}}
                @if ($currentStep == 9)
                    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                        <div class="max-w-md mx-auto">
                            <div>
                                <img src="https://www.aguilaammo.com.mx/assets/images/aguila-ammunition.svg"
                                    class="h-7 sm:h-8" />
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <p>Anexos</p>
                                </div>
                                <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                                    
                                    <div class="sm:grid row-start-1 grid-cols-2 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
											<label for="cvOsolicitudEmpleo"
												class="block text-sm font-medium text-gray-700">Cv ó solicitud de empleo</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="cvOsolicitudEmpleo"
                                                    accept=".pdf" class="hidden"  />
                                            </label>
											@error('cvOsolicitudEmpleo')
												<p class="mt-1 mb-1 text-xs text-red-600 italic">
													{{ $message }}
												</p>
											@enderror
										</div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
											<label for="cartasRecomendacion"
												class="block text-sm font-medium text-gray-700">Cartas de recomendación</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="cartasRecomendacion"
                                                    accept=".pdf" multiple class="hidden"  />
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
												class="block text-sm font-medium text-gray-700">Carta de antecedentes no penales</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="cartaNoPenales"
                                                    accept=".pdf" class="hidden"  />
                                            </label>
											@error('cartaNoPenales')
												<p class="mt-1 mb-1 text-xs text-red-600 italic">
													{{ $message }}
												</p>
											@enderror
										</div>

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
											<label for="buroCredito"
												class="block text-sm font-medium text-gray-700">Buro de credito</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="buroCredito"
                                                    accept=".pdf" class="hidden"  />
                                            </label>
											@error('buroCredito')
												<p class="mt-1 mb-1 text-xs text-red-600 italic">
													{{ $message }}
												</p>
											@enderror
										</div>

                                    </div>

                                    <div class="sm:grid row-start-1 grid-cols-1 gap-2">

                                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
											<label for="foto"
												class="block text-sm font-medium text-gray-700">Fotografia</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="foto"
                                                    accept="image/png,image/jpeg" class="hidden"  />
                                            </label>
											@error('foto')
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
                @endif


                <div class="h-16 p-4 grid grid-cols-3">

                    @if ($currentStep == 3 || $currentStep == 4 || $currentStep == 5 || $currentStep == 6 || $currentStep == 7 || $currentStep == 8 || $currentStep == 9)
                        <div class="flex justify-start px-2 col-span-1 col-start-1 col-end-3">
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                wire:click="decreaseStep()">
                                Regresar
                            </button>
                        </div>
                    @endif

                    @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5 || $currentStep == 6 || $currentStep == 7 || $currentStep == 8)
                        <div class="flex justify-start px-2 col-end-7 col-span-2">
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                wire:click="increaseStep()">
                                Siguiente
                            </button>
                        </div>
                    @endif

                    @if ($currentStep == 9)
                        <div class="flex justify-end px-2 col-end-7 col-span-2">
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
