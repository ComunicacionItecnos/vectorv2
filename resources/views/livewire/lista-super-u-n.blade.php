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
            @if (auth()->user()->role_id == 9)
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    <div class="flex justify-start text-left">
                        Nombre
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Puesto y Area
                </th>
                <th scope="col"
                    class="text-center px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                    Opciones
                </th>
            </tr>
            @endif

        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if (auth()->user()->role_id == 9)
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
                                <span class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre_completo }}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-3 py-4">
                    <div class="flex flex-wrap text-sm text-gray-900">
                        {{ $colaborador->puesto }}</div>
                    <div class="text-sm text-gray-500">{{ $colaborador->area }}</div>
                    <div class="mt-1">
                        <a class=" text-sm text-gray-900">UN:</a> <a
                            class="text-sm text-gray-500">{{ $colaborador->nombre_unidad  }}</a>
                    </div>
                    <div class="">
                        <a class=" text-sm text-gray-900">FAM:</a> <a
                            class="text-sm text-gray-500">{{ $colaborador->nombre_familia }}</a>
                    </div>
                    <div class="">
                        <a class=" text-sm text-gray-900">GPO:</a> <a
                            class="text-sm text-gray-500">{{ $colaborador->nombre_grupo  }}</a>
                    </div>
                </td>
                <td class="flex flex-col sm:flex-wrap sm:flex-row sm:justify-center p-4">
                    <div class="pb-2 sm:pl-1 sm:pt-4 my-8">
                        <a href="{{ url('/insignias-unidad-negocio/' . $colaborador->no_colaborador) }}"
                            class="inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-indigo-600 border border-transparent
                                                                            rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Insignia
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