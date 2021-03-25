<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre de la tabla
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acción
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if(auth()->user()->role_id == 1 | auth()->user()->role_id == 3)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap sm:text-base md:sm:text-base md:text-sm text-gray-500">
                                Área
                            </td>
                            <td class="sm:px-2 md:px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                <a href="{{route('tabla-area')}}"
                                class="inline-flex items-center h-8 px-4 m-2 sm:text-base md:text-sm text-indigo-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800"
                                >Mostrar</a>
                            </td>
                        </tr>
                        @endif
                        @if(auth()->user()->role_id == 1 | auth()->user()->role_id == 6)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                Claves de radio
                            </td>
                            <td class="sm:px-2 md:px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                <a href="{{route('tabla-claves-radio')}}"
                                    class="inline-flex items-center h-8 px-4 m-2 sm:text-base md:text-sm text-indigo-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Mostrar</a>
                            </td>
                        </tr>
                        @endif
                        @if(auth()->user()->role_id == 1 | auth()->user()->role_id == 2)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                Eventos especiales
                            </td>
                            <td class="sm:px-2 md:px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                <a href="{{route('tabla-eventos-especiales')}}"
                                    class="inline-flex items-center h-8 px-4 m-2 sm:text-base md:text-sm text-indigo-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Mostrar</a>
                            </td>
                        </tr>
                        @endif
                        @if(auth()->user()->role_id == 1 | auth()->user()->role_id == 3)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                Extensiones telefónicas
                            </td>
                            <td class="sm:px-2 md:px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                <a href="{{route('tabla-extensiones')}}"
                                    class="inline-flex items-center h-8 px-4 m-2 sm:text-base md:text-sm text-indigo-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Mostrar</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                Nivel
                            </td>
                            <td class="sm:px-2 md:px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                <a href="{{route('tabla-niveles')}}"
                                    class="inline-flex items-center h-8 px-4 m-2 sm:text-base md:text-sm text-indigo-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Mostrar</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                Puesto
                            </td>
                            <td class="sm:px-2 md:px-6 py-4 whitespace-nowrap sm:text-base md:text-sm text-gray-500">
                                <a href="{{route('tabla-puestos')}}"
                                    class="inline-flex items-center h-8 px-4 m-2 sm:text-base md:text-sm text-indigo-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Mostrar</a>
                            </td>
                        </tr>
                        @endif

                        <!-- More items... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
