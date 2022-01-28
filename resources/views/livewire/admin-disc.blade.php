<div>
    
    <div class="mt-8  mb-8 max-w-6xl px-8 py-4 mx-auto bg-white rounded-lg shadow-xl border border-gray-300">

        @if (auth()->user()->role_id == 5)
            
            {{-- Candidato --}}
            <div class="mt-2 my-2">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <div class="grid grid-cols-4">                            
                                <div class=" col-span-4 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                                    <input wire:model="search" type="text" placeholder="Buscar"
                                        class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </tr>
    
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">
                                Curp
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase hidden sm:inline-block">
                                Personalidad
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Domensión principal
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Domensión secundaria
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Fecha
                            </th>
    
                        </tr>
    
                    </thead>
    
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                        @forelse ($resultados as $rs)
                            <tr>
                                <td class="sm:px-6 py-2 whitespace-nowrap">
                                    {{$rs->curp}}
                                </td>
                                <td class="sm:px-6 py-2 whitespace-nowrap">
                                    {{$rs->nombre_completo}}
                                </td>
    
                                <td class="px-6 py-2 whitespace-nowrap">
                                    {{ $rs->personalidad }}
                                </td>
    
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <p class=" @if(json_decode($rs->resultados)[0][0] == 'rojo') text-red-500 @elseif(json_decode($rs->resultados)[0][0] == 'amarillo') text-yellow-500 @elseif(json_decode($rs->resultados)[0][0] == 'verde') text-green-500 @elseif(json_decode($rs->resultados)[0][0] == 'azul') text-blue-500  @endif">
                                        {{ json_decode($rs->resultados)[0][0] }}
                                    </p>
                                </td>
    
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <p class=" @if(json_decode($rs->resultados)[1][0] == 'rojo') text-red-500 @elseif(json_decode($rs->resultados)[1][0] == 'amarillo') text-yellow-500 @elseif(json_decode($rs->resultados)[1][0] == 'verde') text-green-500 @elseif(json_decode($rs->resultados)[1][0] == 'azul') text-blue-500  @endif">
                                        {{ json_decode($rs->resultados)[1][0] }}
                                    </p>
                                </td>
    
                                <td class="px-6 py-2 whitespace-nowrap">
                                    {{ substr($rs->created_at,0,10) }}
                                </td>
    
                            </tr>
                        @empty
    
                            <p class="text-center">No existen resultados</p>
                            
                        @endforelse
    
                    </tbody>
    
                </table>
    
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $resultados->links() }}
                </div>
            </div>


        @else
            
            {{-- Colaborador --}}
            <div class="mt-2 my-2">
                
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <div class="grid grid-cols-4">                            
                                <div class=" col-span-3 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                                    <input wire:model="search" type="text" placeholder="Buscar"
                                        class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>

                                <div class=" col-span-1 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                                    <p>Contador: {{ $contador }}</p>
                                </div>
                            </div>
                        </tr>

                        <tr>

                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase hidden sm:inline-block">
                                Personalidad
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Domensión principal
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Domensión secundaria
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Fecha
                            </th>

                        </tr>

                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        
                        @forelse ($resultados as $rs)
                            <tr>
                                <td class="sm:px-6 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                            @if (file_exists(public_path('storage/'.$rs->foto)))
                                            <img class="w-20 rounded shadow h-24"
                                                src="{{ asset('storage') . '/' . $rs->foto }}" alt="">
                                            @else
                                            <img class="w-20 rounded shadow h-24" src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                            @endif
                                        </div>
                                        <div class="ml-4 whitespace-pre-line">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span class="sm:hidden"> {{ $rs->no_colaborador }}</span>
                                                <span class="sm:inline-block sm:-mt-6">{{ $rs->nombre }}
                                                    {{ $rs->ap_paterno }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    {{ $rs->personalidad }}
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <p class=" @if(json_decode($rs->resultados)[0][0] == 'rojo') text-red-500 @elseif(json_decode($rs->resultados)[0][0] == 'amarillo') text-yellow-500 @elseif(json_decode($rs->resultados)[0][0] == 'verde') text-green-500 @elseif(json_decode($rs->resultados)[0][0] == 'azul') text-blue-500  @endif">
                                        {{ json_decode($rs->resultados)[0][0] }}
                                    </p>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <p class=" @if(json_decode($rs->resultados)[1][0] == 'rojo') text-red-500 @elseif(json_decode($rs->resultados)[1][0] == 'amarillo') text-yellow-500 @elseif(json_decode($rs->resultados)[1][0] == 'verde') text-green-500 @elseif(json_decode($rs->resultados)[1][0] == 'azul') text-blue-500  @endif">
                                        {{ json_decode($rs->resultados)[1][0] }}
                                    </p>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    {{ substr($rs->created_at,0,10) }}
                                </td>

                            </tr>
                        @empty

                            <p class="text-center">No existen resultados</p>
                            
                        @endforelse

                    </tbody>

                </table>

                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $resultados->links() }}
                </div>

            </div>
            
        @endif

    </div>

</div>