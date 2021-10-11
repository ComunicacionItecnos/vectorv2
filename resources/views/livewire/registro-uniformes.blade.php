<div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

    {{-- Nuevo,editar y ver registro --}}
    <section class="@if ($mostrarNuevoRegistro) @else hidden @endif">
        <form wire:submit.prevent="triggerConfirm">

            {{-- Tallas --}}
            <fieldset class="grid gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900 @if ($busquedaNuevo) @else hidden @endif">
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

                </div>

                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                    <div class="col-span-full sm:col-span-6">
                        @if ($colaborador == 'ocultar')
                            
                        @elseif($colaborador == 'error')
                            <p class="text-center w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900 text-red-500">
                                {{ __("No existe el colaborador")}}
                            </p>
                        @else
                            <p class="text-center w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                                Nombre: {{ $nombreCompleto }}
                            </p>
                            <p class="text-center w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                                Área: {{ $area }}
                            </p>
                            
                        @endif

                    </div>

                    <div class="col-span-full sm:col-span-6">



                    </div>

                </div>

            </fieldset>

            <button wire:click="showTabla" type="button" class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent">Regresar</button>
        </form>

    </section>

    {{-- Mostrar todos que ya tienen registrado su talla --}}
    <section class="@if ($mostrarTabla)  @else hidden @endif">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <div class="grid grid-cols-4">
                        <div class=" col-span-1 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                            <select wire:model='perPage'
                                class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>

                            <button type="button" wire:click="showRegistro"
                                class="ml-1 inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent
                                                                                                                                                                    rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Nuevo
                            </button>

                        </div>
                        <div class=" col-span-3 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                            <input wire:model="search" type="text" placeholder="Buscar"
                                class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($colaborador_uniforme_paquete as $cUp)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                            <div class="flex items-center">
                                <div
                                    class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                    @if (file_exists(public_path('storage/' . $cUp->foto)))
                                        <img class="w-20 rounded shadow h-24"
                                            src="{{ asset('storage') . '/' . $cUp->foto }}" alt="" loading="lazy">
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
                                    <a wire:click="ver({{ $cUp->id }})">
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
                                    <a wire:click="editar({{ $cUp->id }})">
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

        </table>
    </section>
</div>
