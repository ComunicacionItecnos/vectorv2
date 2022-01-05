<div class="py-10 grid max-w-6xl grid-cols-1 {{-- px-6 --}} mx-auto lg:px-8 md:grid-cols">
    <section
        class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4 bg-white shadow-lg rounded-xl
        @if($buscarOcultar) @else hidden @endif">

        <header class="flex items-center justify-between">
            <h2 class="text-lg leading-3 font-medium text-black">Resultados</h2>
        </header>
        {{-- <form class="relative"> --}}
        <div class="grid {{-- grid-cols-3 --}} border-t border-gray-200">
            <div class="px-2 py-2 bg-white sm:px-2">
                <label for="">Empresa</label>
                    <select wire:model.debounce.200ms='empresa'
                        class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4 w-full">
                        <option value=""></option>
                        <option value="0">AGUILA AMMUNITION</option>
                        <option value="1">TXAT LATAM / GRUPO AGUILA</option>
                    </select>
                    
                </div>

            <div class="px-2 py-2 bg-white sm:px-2">
                <input wire:model.debounce.200ms="search" type="search" placeholder="Buscar"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

        </div>

        {{-- </form> --}}


        <div>
            @if ($resultados2 == null)

                <div>
                    <p class="text-center">Sin resultados </p>
                </div>

            @else

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    Nombre
                                </div>
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    No. Colaborador
                                </div>
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex text-left">
                                    Accion
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($resultados2 as $rs)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                    <div class="flex items-center">
                                        <div
                                            class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                            @if (file_exists(public_path('storage/' . $rs->foto)))
                                                <img class="w-20 rounded shadow h-24"
                                                    src="{{ asset('storage') . '/' . $rs->foto }}" alt="" loading="lazy">
                                            @else
                                                <img class="w-20 rounded shadow h-24"
                                                    src="{{ asset('images/user_toolkit.jpg') }}" alt="" loading="lazy">
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

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                    <div class="flex items-center">
                                        {{ $rs->no_colaborador }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-800 text-center">
                                    <button
                                        class="px-4 py-2 font-base tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-800 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-80"
                                        wire:click="abrirModalInfo(0,'{{$rs->no_colaborador}}')">
                                        ver
                                    </button>
                                </td>

                            </tr>


                        @endforeach
                    </tbody>


                    <tfoot>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center" colspan="3">
                                <div class="grid grid-cols-1 bg-white sm:px-6 pt-4">
                                    {{ $resultados2->links() }}
                                </div>
                            </td>
                        </tr>
                    </tfoot>

                </table>

            @endif
        </div>

    </section>

    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4 bg-white shadow-lg rounded-xl
        @if($abriModal) @else hidden @endif">

        <div class="grid grid-cols-1 justify-items-center">
            
            @if ($evaDesColaborador == null)
                
            @else
                <div>
                    <iframe class="w-96 h-screen" src="https://toolkit.factoraguila.com/evaluacionDesempeno/{{$evaDesColaborador}}" frameborder="0" id="pdfDescargar"></iframe>
                </div>
                
            @endif

            <div class="pb-4 pt-4">
                <a target="_blank" href="https://toolkit.factoraguila.com/evaluacionDesempeno/{{$evaDesColaborador}}" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-800 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-80">
                    Interactuar
                </a>
            </div>
            
            <div class="pb-4 pt-4">
                <button type="button" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-400 focus:ring-opacity-80"
                wire:click="abrirModalInfo(1,0)">
                    Regresar
                </button>
            </div>
            
        
        </div>
        
    </section>
   
    

</div>
