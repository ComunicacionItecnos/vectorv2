<div class="sm:p-8 p-2 mx-auto bg-gray-100">
    <header class="bg-white rounded-md shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-xl text-center font-semibold leading-tight text-red-700 uppercase">
                día del niño
            </h2>
        </div>
    </header>

    <div class="p-2 grid grid-rows-1 rounded-md shadow-2xl">
        @if ($banderaCupo === false)
            <div class="p-4 grid">
                @if (count($dianinoRegistro) >= 1)
                    <div class="">
                        <div class="text-xl text-center font-medium text-gray-800 mb-4">
                            <p>
                                <p>
                                    Has registrado con éxito los siguientes niño(s)
                                </p>
                                <br>

                                @for ($i = 0; $i < count($dianinoRegistro); $i++)
                                    <p>
                                        Niño {{$i+1}}

                                        Edad {{$dianinoRegistro[$i]->edadHijo}}
                                    </p>
                                @endfor
                            </p>

                            <br>
                            <p>
                                Ya no puedes añadir más niños.
                            </p>
                            <br>
                        </div>
                        <div class="flex justify-center px-4 col-span-1 col-start-1">
                            <a href="https://factoraguila.com/blog/2021/07/28/paquetes/"
                                class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Regresar</a>
                        </div>
                    </div>

                @else

                    <div class="mb-4">
                        <a wire:click="setTrue" class="text-blue-700 hover:text-red-700 cursor-pointer">
                            Toca aquí para leer las Instrucciones
                        </a>
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
                                        Usa el selector para elegir el número de hijos
                                        que deseas registrar para obtener el regalo del Día del Niño. Además,
                                        deberas seleccionar su edad.
                                    </p>
                                    <br>
                                    <p>
                                        Al final, presiona el botón de "Registrar", para almacenar tus datos.
                                    </p>
                                    <br>
                                    <p class="text-red-500">
                                        Puedes registrar un máximo de 5 niños.
                                    </p>
                                    <br>
                                    <p>
                                        Si necesitas eliminar alguno de los registros, debes acudir al área de comunicación para realizar la
                                        cancelación de
                                        estos.
                                    </p>
                                    <br>
                                    <p>
                                      Nota:
                                        Si tienes más de un mes ó menos de 1 año de antiguedad deberás traer el acta de
                                        nacimiento de cada niño que registraste.
                                    </p>
                                </p>
                            </div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="setNull()">
                                {{ __('Cerrar') }}
                            </x-jet-secondary-button>
                        </x-slot>
                    </x-jet-dialog-modal>

                    <form wire:submit.prevent="triggerConfirm" enctype="multipart/form-data">
                        <div class="">
                            <div class=""></div>
                            <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                <label for="no_kids" class="block text-sm font-medium text-gray-700">
                                    Número de niños
                                </label>
                                <select id="no_kids" wire:model="no_kids" name="no_kids"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('no_kids')
                                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <br>

                            @if ($no_kids == 1)
                                <div class="mt-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor1" class="block text-sm font-medium text-gray-700">Niño 1</label>
                                    <select name="kidsValor1" id="kidsValor1" wire:model="kidsValor1"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            @elseif ($no_kids == 2)
                                <div class="mt-4  mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor1" class="block text-sm font-medium text-gray-700">Niño 1</label>
                                    <select name="kidsValor1" id="kidsValor1" wire:model="kidsValor1"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor2" class="block text-sm font-medium text-gray-700">Niño 2</label>
                                    <select name="kidsValor2" id="kidsValor2" wire:model="kidsValor2"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor2')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            @elseif ($no_kids == 3)
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor1" class="block text-sm font-medium text-gray-700">Niño 1</label>
                                    <select name="kidsValor1" id="kidsValor1" wire:model="kidsValor1"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor2" class="block text-sm font-medium text-gray-700">Niño 2</label>
                                    <select name="kidsValor2" id="kidsValor2" wire:model="kidsValor2"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor2')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor3" class="block text-sm font-medium text-gray-700">Niño 3</label>
                                    <select name="kidsValor3" id="kidsValor3" wire:model="kidsValor3"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor3')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            @elseif ($no_kids == 4)
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor1" class="block text-sm font-medium text-gray-700">Niño 1</label>
                                    <select name="kidsValor1" id="kidsValor1" wire:model="kidsValor1"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor2" class="block text-sm font-medium text-gray-700">Niño 2</label>
                                    <select name="kidsValor2" id="kidsValor2" wire:model="kidsValor2"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor2')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor3" class="block text-sm font-medium text-gray-700">Niño 3</label>
                                    <select name="kidsValor3" id="kidsValor3" wire:model="kidsValor3"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor3')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor4" class="block text-sm font-medium text-gray-700">Niño 4</label>
                                    <select name="kidsValor4" id="kidsValor4" wire:model="kidsValor4"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor4')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            @elseif ($no_kids == 5)
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor1" class="block text-sm font-medium text-gray-700">Niño 1</label>
                                    <select name="kidsValor1" id="kidsValor1" wire:model="kidsValor1"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor2" class="block text-sm font-medium text-gray-700">Niño 2</label>
                                    <select name="kidsValor2" id="kidsValor2" wire:model="kidsValor2"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor2')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor3" class="block text-sm font-medium text-gray-700">Niño 3</label>
                                    <select name="kidsValor3" id="kidsValor3" wire:model="kidsValor3"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor3')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 mb-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor4" class="block text-sm font-medium text-gray-700">Niño 4</label>
                                    <select name="kidsValor4" id="kidsValor4" wire:model="kidsValor4"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor4')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-4 sm:m-0 col-span-1 col-start-2">
                                    <label for="kidsValor5" class="block text-sm font-medium text-gray-700">Niño 5</label>
                                    <select name="kidsValor5" id="kidsValor5" wire:model="kidsValor5"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option></option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    @error('kidsValor5')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            @endif

                            @if($no_kids != '')
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
                            @endif

                        </div>
                    </form>

                @endif
            </div>
        @else
            <div class="">
                <div class="text-xl text-center font-medium text-gray-800 mb-4">
                    <p>
                        Lo sentimos, el cupo ha llegado a su límite, puedes regresar a
                        Factor usando el siguiente
                        botón.
                    </p>
                    <br>
                </div>
                <div class="flex justify-center px-4 col-span-1 col-start-1">
                    <a href="https://factoraguila.com/blog/2021/07/28/paquetes/"
                        class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Regresar</a>
                </div>
            </div>
        @endif
    </div>

</div>
