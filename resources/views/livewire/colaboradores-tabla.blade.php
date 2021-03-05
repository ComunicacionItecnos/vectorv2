<form>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
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
                            @if ($colaboradores->count())

                                {{-- Encabezado Tabla Super Usuario --}}

                                @if (auth()->user()->role_id == 1)
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            No. Colaborador </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Estado
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Opciones
                                        </th>
                                    </tr>

                                    {{-- Encabezado Tabla Comunicacion --}}

                                @elseif (auth()->user()->role_id == 2)
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            No. Colaborador </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Estado
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Opciones
                                        </th>
                                    </tr>

                                    {{-- Encabezado Tabla Administracion --}}

                                @elseif (auth()->user()->role_id == 3)
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            No. Colaborador </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            No. IMSS
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Fecha de ingreso
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Datos de contacto
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Puesto y Área
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Opciones
                                        </th>
                                    </tr>

                                    {{-- Encabezado Tabla Relaciones Laborales --}}

                                @elseif (auth()->user()->role_id == 4)
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            No. Colaborador </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Teléfonos
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Correo
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Puesto y Área
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Opciones
                                        </th>
                                    </tr>

                                    {{-- Encabezado Tabla Reclutamiento y Seleccion --}}

                                @elseif (auth()->user()->role_id == 5)
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        No. Colaborador </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Estado
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Fecha de ingreso
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Datos de contacto
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Puesto y Área
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Opciones
                                    </th>
                                </tr>

                                    {{-- Encabezado Tabla Seguridad Patrimonial --}}
                                @elseif (auth()->user()->role_id == 6)
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            No. Colaborador </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Estado
                                        </th>
                                    </tr>
                                @endif

                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            {{-- Cuerpo Tabla Super Usuario --}}

                            @if (auth()->user()->role_id == 1)
                                @foreach ($colaboradores as $colaborador)
                                    <tr class="h-30">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-25 h-25">
                                                    <img class="w-10 rounded shadow h-35"
                                                        src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                        alt="{{ $colaborador->nombre }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $colaborador->nombre }} {{ $colaborador->ap_paterno }}
                                                        {{ $colaborador->ap_materno }}
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
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                    Inactivo
                                                </span>
                                            @endif

                                        </td>
                                        @if ($colaborador->estado_colaborador == 1)
                                            <td class="flex justify-items-center px-6 py-4 text-sm font-medium text-right
                                            whitespace-nowrap">
                                                <a wire:click="showNotification" href="#"
                                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Editar</a>
                                                <button wire:click="baja({{ $colaborador->no_colaborador }})"
                                                    type="submit"
                                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">Dar
                                                    de baja</button>
                                            </td>
                                        @else
                                            <td class="flex justify-items-center px-6 py-4 text-sm font-medium text-right
                                        whitespace-nowrap">
                                                <a href="#"
                                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Editar</a>
                                                <button wire:click="alta({{ $colaborador->no_colaborador }})"
                                                    type="submit"
                                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Dar
                                                    de alta</button>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                                {{-- Cuerpo tabla Comunicacion --}}
                            @elseif (auth()->user()->role_id == 2)
                                @foreach ($colaboradores as $colaborador)
                                    <tr class="h-30">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-25 h-25">
                                                    <img class="w-10 rounded shadow h-35"
                                                        src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                        alt="{{ $colaborador->nombre }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $colaborador->nombre }} {{ $colaborador->ap_paterno }}
                                                        {{ $colaborador->ap_materno }}
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
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                    Inactivo
                                                </span>
                                            @endif
                                        </td>
                                        <td
                                            class="flex justify-items-center px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <a href="#"
                                                class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Mostrar</a>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- Cuerpo tabla Relaciones Administracion --}}
                            @elseif (auth()->user()->role_id == 3)
                                @foreach ($colaboradores as $colaborador)
                                    <tr class="h-30">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-25 h-25">
                                                    <img class="w-10 rounded shadow h-35"
                                                        src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                        alt="{{ $colaborador->nombre }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $colaborador->nombre }}
                                                    </div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $colaborador->ap_paterno }}
                                                        {{ $colaborador->ap_materno }}
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
                                        <td class="px-3 py-4 whitespace-nowrap">
                                            @foreach ($puestos as $puesto)
                                                @if ($puesto->id == $colaborador->puesto_id)
                                                    <div class="text-sm text-gray-900">{{ $puesto->nombre_nivel }}
                                                        {{ $puesto->especialidad_puesto }}</div>
                                                @endif
                                            @endforeach


                                            @foreach ($areas as $area)
                                                @if ($area->id == $colaborador->area_id)
                                                    <div class="text-sm text-gray-500">{{ $area->nombre_area }}</div>
                                                @endif

                                            @endforeach

                                        </td>
                                        <td class="flex justify-items-center px-3 py-4 text-sm font-medium text-right
                                        whitespace-nowrap">
                                            <a href="#"
                                                class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Mostrar</a>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- Cuerpo tabla Relaciones Laborales --}}
                            @elseif (auth()->user()->role_id == 4)
                                @foreach ($colaboradores as $colaborador)
                                    <tr class="h-30">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-25 h-25">
                                                    <img class="w-10 rounded shadow h-35"
                                                        src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                        alt="{{ $colaborador->nombre }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $colaborador->nombre }} {{ $colaborador->ap_paterno }}
                                                        {{ $colaborador->ap_materno }}
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
                                            <div class="text-sm text-gray-900">Fijo: {{ $colaborador->tel_fijo }}
                                            </div>
                                            <div class="text-sm text-gray-900">Movil: {{ $colaborador->tel_movil }}
                                            </div>
                                            <div class="text-sm text-gray-900">Recados:
                                                {{ $colaborador->tel_recados }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $colaborador->correo }}
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 whitespace-nowrap">
                                            @foreach ($puestos as $puesto)
                                                @if ($puesto->id == $colaborador->puesto_id)
                                                    <div class="text-sm text-gray-900">{{ $puesto->nombre_nivel }}
                                                        {{ $puesto->especialidad_puesto }}</div>
                                                @endif
                                            @endforeach


                                            @foreach ($areas as $area)
                                                @if ($area->id == $colaborador->area_id)
                                                    <div class="text-sm text-gray-500">{{ $area->nombre_area }}</div>
                                                @endif

                                            @endforeach

                                        </td>
                                        <td class="flex justify-items-center px-3 py-4 text-sm font-medium text-right
                                        whitespace-nowrap">
                                            <a href="#"
                                                class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Mostrar</a>
                                        </td>
                                    </tr>
                                @endforeach

                                    {{-- Cuerpo tabla Relaciones Reclutamiento y Seleccion --}}
                            @elseif (auth()->user()->role_id == 5)
                            @foreach ($colaboradores as $colaborador)
                                <tr class="h-30">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-25 h-25">
                                                <img class="w-10 rounded shadow h-35"
                                                    src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                    alt="{{ $colaborador->nombre }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $colaborador->nombre }}
                                                </div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $colaborador->ap_paterno }}
                                                    {{ $colaborador->ap_materno }}
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
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
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


                                        @foreach ($extensiones as $ext)
                                            @if ($ext->id == $colaborador->extension_id)
                                                <div class="text-sm text-gray-900">Ext.:{{ $ext->numero_extension }}</div>
                                            @endif
                                        @endforeach


                                        <div class="text-sm text-gray-900">Correo:</div>
                                        <div class="text-sm text-gray-900">
                                            {{ $colaborador->correo }}</div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        @foreach ($puestos as $puesto)
                                            @if ($puesto->id == $colaborador->puesto_id)
                                                <div class="text-sm text-gray-900">{{ $puesto->nombre_nivel }}
                                                    {{ $puesto->especialidad_puesto }}</div>
                                            @endif
                                        @endforeach


                                        @foreach ($areas as $area)
                                            @if ($area->id == $colaborador->area_id)
                                                <div class="text-sm text-gray-500">{{ $area->nombre_area }}</div>
                                            @endif
                                        @endforeach

                                    </td>
                                    <td class="flex justify-items-center px-3 py-4 text-sm font-medium text-right
                                    whitespace-nowrap">
                                        <a href="#"
                                            class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Mostrar</a>
                                    </td>
                                </tr>
                            @endforeach

                                {{-- Cuerpo Tabla Seguridad Patrimonial --}}

                            @elseif (auth()->user()->role_id == 6)
                                @foreach ($colaboradores as $colaborador)
                                    <tr class="h-30">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-25 h-25">
                                                    <img class="w-15 rounded shadow h-25"
                                                        src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                        alt="{{ $colaborador->nombre }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $colaborador->nombre }} {{ $colaborador->ap_paterno }}
                                                        {{ $colaborador->ap_materno }}
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
                                                <span
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                    Inactivo
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
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
</form>
