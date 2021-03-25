<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

            <div class="grid grid-cols-2 m-2">
                <div class="col-span-1 sm:col-span-1 flex justify-start items-center">
                    <label for="clave" class="block text-3xl font-medium text-gray-700">Claves de Radio</label>
                </div>
                <div class="col-span-1 sm:col-span-1 flex justify-end items-center">
                    <button wire:click="confirmClaveRadioAdd"
                        class="inline-flex justify-center px-4 py-2 ml-10 mt-6 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Agregar Clave
                    </button>
                </div>
            </div>
        </div>
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <div class="grid grid-cols-4">
                                <div class=" col-span-1 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                                    <select wire:model='perPage'
                                        class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4">
                                        <option value="5">5 por página</option>
                                        <option value="10">10 por página</option>
                                        <option value="25">25 por página</option>
                                        <option value="50">50 por página</option>
                                        <option value="100">100 por página</option>
                                    </select>
                                </div>
                                <div class=" col-span-3 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                                    <input wire:model="search" type="text" placeholder="Buscar"
                                        class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </tr>
                        @if ($clavesRadio->count())
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex justify-center text-center">
                                        ID
                                        @if ($sortAsc)
                                            <span class="cursor-pointer" wire:click="sortBy('id')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                                                </svg>
                                            </span>
                                        @endif
                                        @if (!$sortAsc)
                                            <span class="cursor-pointer" wire:click="sortBy('id')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex text-left">
                                        Clave
                                        @if ($sortAsc)
                                            <span class="cursor-pointer" wire:click="sortBy('clave')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                                                </svg>
                                            </span>
                                        @endif
                                        @if (!$sortAsc)
                                            <span class="cursor-pointer" wire:click="sortBy('clave')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex text-left">
                                        Compartida
                                        @if ($sortAsc)
                                            <span class="cursor-pointer" wire:click="sortBy('compartida')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                                                </svg>
                                            </span>
                                        @endif
                                        @if (!$sortAsc)
                                            <span class="cursor-pointer" wire:click="sortBy('compartida')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex text-left">
                                        Disponible
                                        @if ($sortAsc)
                                            <span class="cursor-pointer" wire:click="sortBy('disponibilidad')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                                                </svg>
                                            </span>
                                        @endif
                                        @if (!$sortAsc)
                                            <span class="cursor-pointer" wire:click="sortBy('disponibilidad')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Operaciones
                                </th>
                            </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($clavesRadio as $clave)
                            @if ($clave->id != 1)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        {{ $clave->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $clave->clave }}
                                    </td>
                                    <td class="px-14 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($clave->compartida == 1)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Si
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                No
                                            </span>
                                        @endif

                                    </td>
                                    <td class="px-14 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($clave->disponibilidad == 1)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Si
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                No
                                            </span>
                                        @endif
                                    </td>
                                    <td class="flex justify-items-center px-6 py-4 text-sm font-medium text-right
                                        whitespace-nowrap">
                                        <button wire:click="confirmClaveRadioEdit({{ $clave->id }})"
                                            class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Editar</button>

                                        <button wire:click="triggerConfirm({{ $clave->id }})"
                                            class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">Eliminar</button>
                                    </td>
                                </tr>
                            @else

                            @endif
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $clavesRadio->links() }}
                </div>
            @else
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    <h6 class="text-center text-gray-500">No se encontró a ningún campo que coincida con:
                        "{{ $search }}"</h6>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal para agregar una nueva area --}}
    <x-jet-dialog-modal wire:model="confirmClaveRadioAdd">
        <x-slot name="title">
            {{ __('Agregar nueva clave') }}
        </x-slot>

        <x-slot name="content">

            <div class="mt-4">
                <label for="nombreClaveRadio" class="block text-sm font-medium text-gray-700">Clave</label>
                <input type="text" wire:model="nombreClaveRadio" name="nombreClaveRadio" id="nombreClaveRadio"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('nombreClaveRadio')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="compartida" class="block text-sm font-medium text-gray-700">¿Es compartida?</label>
                <select id="compartida" wire:model="compartida" name="compartida"
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option></option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
                @error('compartida')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="disponibilidad" class="block text-sm font-medium text-gray-700">¿Está disponible?</label>
                <select id="disponibilidad" wire:model="disponibilidad" name="disponibilidad"
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option></option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
                @error('disponibilidad')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="setNull" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" dusk="confirm-password-button" wire:click="registrar"
                wire:loading.attr="disabled">
                {{ __('Agregar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal para editar un area existente --}}

    <x-jet-dialog-modal wire:model="confirmClaveRadioEdit">
        <x-slot name="title">
            {{ __('Actualizar clave') }}
        </x-slot>

        <x-slot name="content">

            <div class="mt-4">
                <label for="nombreClaveRadio" class="block text-sm font-medium text-gray-700">Clave</label>
                <input type="text" wire:model="nombreClaveRadio" name="nombreClaveRadio" id="nombreClaveRadio"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('nombreClaveRadio')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="compartida" class="block text-sm font-medium text-gray-700">¿Es compartida?</label>
                <select id="compartida" wire:model="compartida" name="compartida"
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option></option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
                @error('compartida')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="disponibilidad" class="block text-sm font-medium text-gray-700">¿Está disponible?</label>
                <select id="disponibilidad" wire:model="disponibilidad" name="disponibilidad"
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option></option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
                @error('disponibilidad')
                    <p class="mt-1 mb-1 text-xs text-red-600 italic">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="setNull" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" dusk="confirm-password-button" wire:click="guardar" wire:loading.attr="disabled">
                {{ __('Actualizar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
