<div class="py-4 mx-auto">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="grid sm:grid-cols-4 sm:grid-rows-1 gap-2">
                        <div class="col-span-3 bg-red-300">
                            <form wire:submit.prevent="asigna">
                                <div class="grid grid-rows-3 grid-cols-3 gap-2">
                                    <div class="row-span-1 col-span-1 col-start-1 row-start-1 bg-indigo-300 h-32">
                                        <div
                                            class="mx-auto mt-2 rounded opacity-100 flex-grow-0 flex-shrink-0 w-24 h-28 border-2 shadow-sm">

                                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                                            <img class="w-24 rounded shadow h-28"
                                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                                            @else
                                            <img class="w-24 rounded shadow h-28"
                                                src="{{ asset('images/user_toolkit.jpg') }}" alt="">

                                            @endif

                                        </div>
                                    </div>
                                    <div class="row-span-1 col-span-1 col-start-2 row-start-1 bg-purple-300 h-32 pt-5">
                                        <label for="inputNoColaborador"
                                            class="block text-sm font-black text-gray-700">No.
                                            Col.</label>
                                        <input type="text" wire:model="col_premiado" name="col_premiado"
                                            id="inputNoColaborador" disabled value="{{ old('col_premiado') }}"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('col_premiado')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="row-span-1 col-span-1 col-start-3 row-start-1 bg-yellow-300 h-32 pt-5">
                                        <label for="selectSupervisor"
                                            class="block text-sm font-black text-gray-700">Nombre del
                                            colaborador</label>
                                        <select id="selectSupervisor" wire:model="col_premiado" name="supervisor"
                                            disabled
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value=""></option>
                                            <option value="1">Ninguno</option>
                                            @if (isset($premiados))
                                            @foreach ($premiados as $premiado)
                                            <option value="{{ $premiado->no_colaborador }}">
                                                {{ $premiado->ap_paterno }}
                                                {{ $premiado->ap_materno }}
                                                {{ $premiado->nombre_1 }}
                                                {{ $premiado->nombre_2 }}
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
                                    <div class="row-span-1 col-span-1 row-start-2 col-start-1 bg-green-300 h-32 pt-5">
                                        <label for="inputInsignia"
                                            class="block text-sm font-black text-gray-700">Seleccionar insignia</label>
                                        <select id="inputInsignia" wire:model="tipo_insignia" name="tipo_insignia"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value=""></option>
                                            <option value="1">Oro</option>
                                            <option value="2">Plata</option>
                                            <option value="3">Bronce</option>
                                        </select>
                                        @error('tipo_insignia')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="row-span-1 col-span-2 row-start-2 col-start-2 bg-green-300 h-32 pt-5">
                                        <label for="textAreaMensaje"
                                            class="block text-sm font-black text-gray-700">Mensaje</label>
                                        <textarea name="textAreaMensaje" wire:model.defer="mensaje"
                                            class="overflow-y-auto resize-none p-4 w-full rounded-md"></textarea>
                                    </div>
                                    <div class="row-span-1 col-span-3 row-start-3 bg-indigo-300 h-32">
                                        <div
                                            class="px-4 py-3 text-right sm:px-6 flex justify-center sm:justify-end">
                                            <button wire:click="update" type="submit"
                                                class="inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                Asignar insignia
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-span-1 flex flex-col h-screen">
                            <div class="flex-grow overflow-auto">
                                <table class="relative w-full border">
                                    <thead>
                                        <tr>
                                            <th class="sticky top-0 px-6 py-3 text-blue-900 bg-blue-300">Colaboradores
                                                premiados</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y bg-blue-100">
                                        @foreach ($colaboradores as $colaborador)
                                        <tr>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center">
                                                    <div
                                                        class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                                        @if (file_exists(public_path('storage/' . $colaborador->foto)))
                                                        <img class="w-20 rounded shadow h-24"
                                                            src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                            alt="">
                                                        @else
                                                        <img class="w-20 rounded shadow h-24"
                                                            src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="ml-4 whitespace-pre-line">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            <span class="sm:hidden">
                                                                {{ $colaborador->no_colaborador }}</span>
                                                            <span
                                                                class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                                                {{ $colaborador->ap_paterno }}</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24">
                                                        <img class="px-4 mt-8 mx-2"
                                                            src="{{ asset('images/insignia.png') }}" alt="">
                                                    </div>
                                                </div>
                                            </td>
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
</div>