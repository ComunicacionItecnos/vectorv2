<div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
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
                    </div>
                    <div class=" col-span-3 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                        <input wire:model="search" type="text" placeholder="Buscar"
                            class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
            </tr>
            @if ($colaboradores->count())

            {{-- Encabezado Tabla Super Usuario --}}

            @if (auth()->user()->role_id == 1)
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Nombre
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase hidden sm:inline-block">
                    <div class="flex justify-center text-center">
                        No. Colaborador
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Estado
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('estado_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('estado_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                    Opciones
                </th>
            </tr>

            {{-- Encabezado Tabla Comunicacion --}}

            @elseif (auth()->user()->role_id == 2)
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Nombre
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase hidden sm:inline-block">
                    <div class="flex justify-center text-center">
                        No. Colaborador
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Estado
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('estado_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('estado_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                    Opciones
                </th>
            </tr>

            {{-- Encabezado Tabla Administracion --}}

            @elseif (auth()->user()->role_id == 3)
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Nombre
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        No. Colaborador
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    No. IMSS
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Fecha de ingreso
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('fecha_ingreso')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('fecha_ingreso')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Datos de contacto
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Puesto y Área
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Opciones
                </th>
            </tr>

            {{-- Encabezado Tabla Relaciones Laborales --}}

            @elseif (auth()->user()->role_id == 4)
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Nombre
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        No. Colaborador
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Datos de contacto
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Estado
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('estado_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('estado_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Puesto y Área
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Opciones
                </th>
            </tr>

            {{-- Encabezado Tabla Reclutamiento y Seleccion --}}

            @elseif (auth()->user()->role_id == 5)
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Nombre
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        No. Colaborador
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Estado
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('estado_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('estado_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Fecha de ingreso
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('fecha_ingreso')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('fecha_ingreso')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Datos de contacto
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Puesto y Área
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Opciones
                </th>
            </tr>

            {{-- Encabezado Tabla Seguridad Patrimonial --}}
            @elseif (auth()->user()->role_id == 6)
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Nombre
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        No. Colaborador
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Puesto y Área
                </th>
            </tr>

            {{-- Encabezado Tabla Direcccion --}}

            @elseif (auth()->user()->role_id == 8)
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Nombre
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('ap_paterno')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase hidden sm:inline-block">
                    <div class="flex justify-center text-center">
                        No. Colaborador
                        @if ($sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                            </svg>
                        </span>
                        @endif
                        @if (!$sortAsc)
                        <span class="cursor-pointer" wire:click="sortBy('no_colaborador')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                        </span>
                        @endif
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Puesto y Area
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Opciones
                </th>
            </tr>
            @endif

        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

            {{-- Cuerpo Tabla Super Usuario --}}

            @if (auth()->user()->role_id == 1)

            @foreach ($colaboradores as $colaborador)
            <tr>
                <td class="sm:px-6 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div
                            class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                            <img class="w-20 rounded shadow h-24"
                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                            @else
                            <img class="w-20 rounded shadow h-24" src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="ml-4 whitespace-pre-line">
                            <div class="text-sm font-medium text-gray-900">
                                <span class="sm:hidden"> {{ $colaborador->no_colaborador }}</span>
                                <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                    {{ $colaborador->ap_paterno }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td
                    class="sm:px-6 sm:py-2 sm:pb-4 whitespace-nowrap hidden sm:inline text-sm sm:text-center text-gray-900">
                    {{ $colaborador->no_colaborador }}
                </td>
                <td class="px-6 py-2 whitespace-nowrap">
                    @if ($colaborador->estado_colaborador == 1)
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                        Activo
                    </span>
                    @else
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                        Inactivo
                    </span>
                    @endif

                </td>
                @if ($colaborador->estado_colaborador == 1)
                <td class="flex justify-center items-center pt-12">
                    <div class="w-4 pb-1 mr-6 transform hover:text-yellow-500 hover:scale-130">
                        <a href="{{ url('/edit/' . $colaborador->no_colaborador) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>

                    <div class="w-4 pb-1 mr-6 transform hover:text-indigo-500 hover:scale-130">
                        <a href="{{ url('/contrato/' . $colaborador->no_colaborador)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </a>
                    </div>

                    <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-130">
                        <button wire:click="baja({{ $colaborador->no_colaborador }})" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" />
                            </svg>
                        </button>
                    </div>
                </td>
                @else
                <td class="flex justify-center items-center pt-12 text-sm font-medium text-right
                        whitespace-nowrap">
                    <div class="w-4 pb-1 mr-6 transform hover:text-yellow-500 hover:scale-130">
                        <a href="{{ url('/edit/' . $colaborador->no_colaborador) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>

                    <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-130">
                        <button wire:click="alta({{ $colaborador->no_colaborador }})" type="submit">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </button>
                    </div>
                </td>
                @endif

            </tr>
            @endforeach
            {{-- Cuerpo tabla Comunicacion --}}
            @elseif (auth()->user()->role_id == 2)
            @foreach ($colaboradores as $colaborador)
            <tr>
                <td class="sm:px-6 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div
                            class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                            <img class="w-20 rounded shadow h-24"
                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                            @else
                            <img class="w-20 rounded shadow h-24" src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="ml-4 whitespace-pre-line">
                            <div class="text-sm font-medium text-gray-900">
                                <span class="sm:hidden"> {{ $colaborador->no_colaborador }}</span>
                                <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                    {{ $colaborador->ap_paterno }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td
                    class="sm:px-6 sm:py-2 sm:pb-4 whitespace-nowrap hidden sm:inline text-sm sm:text-left text-gray-900">
                    {{ $colaborador->no_colaborador }}
                </td>
                <td class="px-6 py-2 whitespace-nowrap">
                    @if ($colaborador->estado_colaborador == 1)
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                        Activo
                    </span>
                    @else
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                        Inactivo
                    </span>
                    @endif

                </td>

                <td class="flex justify-center items-center pt-12 text-sm font-medium text-right
                whitespace-nowrap">
                    <div class="w-4 pb-1 mr-6 transform hover:text-yellow-500 hover:scale-130">
                        <a href="{{ url('/edit/' . $colaborador->no_colaborador) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach

            {{-- Cuerpo tabla Administracion --}}

            @elseif (auth()->user()->role_id == 3)

            @foreach ($colaboradores as $colaborador)
            <tr>
                <td class="sm:px-6 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div
                            class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                            <img class="w-20 rounded shadow h-24"
                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                            @else
                            <img class="w-20 rounded shadow h-24" src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="ml-4 whitespace-pre-line">
                            <div class="text-sm font-medium text-gray-900">
                                <span class="sm:hidden"> {{ $colaborador->no_colaborador }}</span>
                                <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                    {{ $colaborador->ap_paterno }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->no_colaborador }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $colaborador->no_seguro_social }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->fecha_ingreso }}
                    </div>
                </td>
                <td class="px-3 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Fijo: {{ $colaborador->tel_fijo }}
                    </div>
                    <div class="text-sm text-gray-900">Movil: {{ $colaborador->tel_movil }}
                    </div>
                    <div class="text-sm text-gray-900">Recados:
                        {{ $colaborador->tel_recados }}</div>
                    <div class="text-sm text-gray-900">Correo:</div>
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->correo }}</div>
                </td>
                <td class="px-3 py-4">
                    <div class="flex flex-wrap text-sm text-gray-900">
                        {{ $colaborador->puesto }}</div>

                    <div class="text-sm text-gray-500">{{ $colaborador->area }}</div>

                </td>
                <td class="flex justify-center content-center pt-12">
                    <div class="w-4 pb-1 mr-6 transform hover:text-yellow-500 hover:scale-130">
                        <a href="{{ url('/edit/' . $colaborador->no_colaborador) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>
                    <div class="w-4 pb-1 mr-6 transform hover:text-indigo-500 hover:scale-130">
                        <a href="{{ url('/contrato/' . $colaborador->no_colaborador)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </a>
                    </div>
                </td>

            </tr>
            @endforeach

            {{-- Cuerpo tabla Relaciones Laborales --}}
            @elseif (auth()->user()->role_id == 4)
            @foreach ($colaboradores as $colaborador)
            <tr class="h-30">
                <td class="sm:px-6 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div
                            class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                            <img class="w-20 rounded shadow h-24"
                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                            @else
                            <img class="w-20 rounded shadow h-24" src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="ml-4 whitespace-pre-line">
                            <div class="text-sm font-medium text-gray-900">
                                <span class="sm:hidden"> {{ $colaborador->no_colaborador }}</span>
                                <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                    {{ $colaborador->ap_paterno }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->no_colaborador }}
                    </div>
                </td>
                <td class="px-3 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Fijo: {{ $colaborador->tel_fijo }}
                    </div>
                    <div class="text-sm text-gray-900">Movil: {{ $colaborador->tel_movil }}
                    </div>
                    <div class="text-sm text-gray-900">
                        Ext.: {{ $colaborador->numero_extension }}
                    </div>
                    <div class="text-sm text-gray-900">Correo:</div>
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->correo }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($colaborador->estado_colaborador == 1)
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                        Activo
                    </span>
                    @else
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                        Inactivo
                    </span>
                    @endif

                </td>
                <td class="px-3 py-4">
                    <div class="flex flex-wrap text-sm text-gray-900">
                        {{ $colaborador->puesto }}</div>

                    <div class="text-sm text-gray-500">{{ $colaborador->area }}</div>
                </td>
                @if ($colaborador->estado_colaborador == 1)
                <td class="flex justify-center items-center pt-12">
                    <div class="w-4 pb-1 mr-6 transform hover:text-yellow-500 hover:scale-130">
                        <a href="{{ url('/edit/' . $colaborador->no_colaborador) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>

                    <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-130">
                        <button wire:click="baja({{ $colaborador->no_colaborador }})" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" />
                            </svg>
                        </button>
                    </div>
                </td>
                @else
                <td class="flex justify-center items-center pt-12 text-sm font-medium text-right
                        whitespace-nowrap">
                    <div class="w-4 pb-1 mr-6 transform hover:text-yellow-500 hover:scale-130">
                        <a href="{{ url('/edit/' . $colaborador->no_colaborador) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>

                    <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-130">
                        <button wire:click="alta({{ $colaborador->no_colaborador }})" type="submit">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </button>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach

            {{-- Cuerpo tabla Reclutamiento y Seleccion --}}
            @elseif (auth()->user()->role_id == 5)
            @foreach ($colaboradores as $colaborador)
            <tr>
                <td class="sm:px-6 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div
                            class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                            <img class="w-20 rounded shadow h-24"
                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                            @else
                            <img class="w-20 rounded shadow h-24" src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="ml-4 whitespace-pre-line">
                            <div class="text-sm font-medium text-gray-900">
                                <span class="sm:hidden"> {{ $colaborador->no_colaborador }}</span>
                                <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                    {{ $colaborador->ap_paterno }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->no_colaborador }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($colaborador->estado_colaborador == 1)
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                        Activo
                    </span>
                    @else
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                        Inactivo
                    </span>
                    @endif

                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->fecha_ingreso }}
                    </div>
                </td>
                <td class="px-3 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Fijo: {{ $colaborador->tel_fijo }}
                    </div>
                    <div class="text-sm text-gray-900">Movil: {{ $colaborador->tel_movil }}
                    </div>
                    <div class="text-sm text-gray-900">
                        Ext.: {{ $colaborador->numero_extension }}
                    </div>
                    <div class="text-sm text-gray-900">Correo:</div>
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->correo }}</div>
                </td>
                <td class="px-3 py-4">
                    <div class="flex flex-wrap text-sm text-gray-900">
                        {{ $colaborador->puesto }}</div>

                    <div class="text-sm text-gray-500">{{ $colaborador->area }}</div>

                </td>
                <td class="px-6 py-3 whitespace-nowrap">
                    <div class="w-auto ml-6 transform hover:text-yellow-500 hover:scale-130">
                        <a href="{{ url('/edit/' . $colaborador->no_colaborador) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach

            {{-- Cuerpo Tabla Seguridad Patrimonial --}}

            @elseif (auth()->user()->role_id == 6)
            @foreach ($colaboradores as $colaborador)
            @if ($colaborador->estado_colaborador == 1)
            <tr>
                <td class="sm:px-6 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div
                            class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-32 h-38 border-2 shadow-sm">
                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                            <img class="w-32 rounded shadow h-38"
                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                            @else
                            <img class="w-32 rounded shadow h-38" src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="ml-4 whitespace-pre-line">
                            <div class="text-sm font-medium text-gray-900">
                                <span class="sm:hidden"> {{ $colaborador->no_colaborador }}</span>
                                <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                    {{ $colaborador->ap_paterno }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{ $colaborador->no_colaborador }}
                    </div>
                </td>
                <td class="px-3 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $colaborador->puesto }}</div>
                    <div class="text-sm text-gray-500">{{ $colaborador->area }}</div>
                </td>
            </tr>
            @else
            @endif
            @endforeach

            {{-- Cuerpo Tabla Direccion --}}

            @elseif (auth()->user()->role_id == 8)
            @foreach ($colaboradores as $colaborador)
            @if ($colaborador->estado_colaborador == 1)
            <tr>
                <td class="sm:px-6 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div
                            class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                            @if (file_exists(public_path('storage/' . $colaborador->foto)))
                            <img class="w-20 rounded shadow h-24"
                                src="{{ asset('storage') . '/' . $colaborador->foto }}" alt="">
                            @else
                            <img class="w-20 rounded shadow h-24" src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="ml-4 whitespace-pre-line">
                            <div class="text-sm font-medium text-gray-900">
                                <span class="sm:hidden"> {{ $colaborador->no_colaborador }}</span>
                                <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                    {{ $colaborador->ap_paterno }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td
                    class="sm:px-6 sm:py-2 sm:mt-11 whitespace-nowrap hidden sm:inline-block text-sm sm:text-left text-gray-900">
                    <div class="sm:flex sm:justify-start sm:px-2 sm:items-center text-sm">
                        {{ $colaborador->no_colaborador }}
                    </div>
                </td>
                <td class="px-3 py-4">
                    <div class="flex flex-wrap text-sm text-gray-900">
                        {{ $colaborador->puesto }}</div>

                    <div class="text-sm text-gray-500">{{ $colaborador->area }}</div>

                </td>
                <td class="flex justify-center items-center pt-12">
                    <div class="w-4 pb-1 mr-6 transform hover:text-yellow-500 hover:scale-130">
                        <a href="{{ url('/edit/' . $colaborador->no_colaborador) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>
                    <div class="w-4 pb-2 mr-6 transform hover:text-indigo-500 hover:scale-130">
                        <a href="{{ url('/insignias/' . $colaborador->no_colaborador)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            @else
            @endif
            @endforeach
            @endif


            <!-- More items... -->
        </tbody>
    </table>
    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
        {{ $colaboradores->links() }}
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
</div>