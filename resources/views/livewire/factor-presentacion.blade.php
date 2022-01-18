<div style="margin-left: 5%; margin-right: 5%;">
    <header class="p-4 bg-white">
        <a aria-label="Back to homepage" class="flex justify-center p-2 content-center">
            <img src="{{ asset('images/disc/FACTOR_logo_new.svg') }}" loading="lazy" class="h-20 w-100">
        </a>
    </header>

    <div class="mb-8 max-w-7xl px-8 py-4 mx-auto bg-white rounded-lg shadow-xl" >

        <div class="grid grid-cols-7 gap-4 text-center place-items-center">

            <div>
                <p>Plataformas</p>
            </div>
        
            <div>
                <img src="{{ asset('images/disc/FACTOR_logo_new.svg') }}" loading="lazy" class="h-20 w-100">
            </div>

            <div>
                <img src="{{ asset('images/factor2/hu.png') }}" loading="lazy" class="h-20 w-100" wire:click="comparar(1)">
            </div>

            <div>
                <img src="{{ asset('images/factor2/factorial.svg') }}" loading="lazy" class="h-20 w-100" wire:click="comparar(2)">
            </div>

            <div>
                <img src="{{ asset('images/factor2/pysmex.png') }}" loading="lazy" class="h-20 w-100" wire:click="comparar(3)">
            </div>

            <div>
                <img src="{{ asset('images/factor2/oracle.png') }}" loading="lazy" class="h-20 w-100" wire:click="comparar(4)">
            </div>

            <div>
                <img src="{{ asset('images/factor2/timeblock.png') }}" loading="lazy" class="h-20 w-100" wire:click="comparar(4)">
            </div>
        
        </div>


        <div class="grid grid-cols-7 gap-4 text-center place-items-center pt-2">

            <div>Precios</div>
            
            <div>
                <p>
                    $5,500,000.00
                </p> 
                <span class="text-sm">+ iva</span>
                <br>
                <span class="text-sm">aproximado del 10%.</span>
            </div>

            <div>
                <p>$3,456,000.00</p> 
                <span class="text-sm">+ iva</span>
            </div>

            <div>
                <p>$48,360.00</p>
                <span class="text-sm"> + iva</span>
            </div>

            <div>
                <p>Cotizando el presupuesto</p>
                <span class="text-sm"></span>
            </div>

            <div>
                <p>
                    $9,000,000.00 por modulo 
                </p>
                
                <span class="text-sm">+ costos de implementación</span>
            </div>

            <div>
                <p>
                    $43,000.00
                </p>
                
                <span class="text-sm">+ iva</span>
            </div>

        </div>


        <div class="grid grid-cols-7 gap-4 text-center place-items-center pt-4">

            <div>Total incluyendo IVA por plataforma</div>
            
            <div>
                <p>
                    $5,588,000.00
                </p> 
                <span class="text-sm">un solo pago </span>
                
            </div>

            <div>
                <p>$4,008,960.00</p> 
                <span class="text-sm">por año</span>
            </div>

            <div>
                <p>$56,097.06</p>
                <span class="text-sm">por año</span>
            </div>

            <div>
                <p>Cotizando el presupuesto</p>
                <span class="text-sm"></span>
            </div>

            <div>
                <p>
                    $10,440,000.00 por modulo 
                </p>
                <span class="text-sm">por año</span>
                <br>
                <span class="text-sm">+ costos de implementación</span>
            </div>

            <div>
                <p>
                    $43,000.00
                </p>
                
                <span class="text-sm">por año</span>
            </div>

        </div>


        <div class="grid grid-cols-7 gap-4 text-center place-items-center pt-4 border-t border-gray-600">

            <div>Total</div>
            
            <div>
                <p>
                    $5,588,000.00
                </p> 
            </div>

            <div class="col-span-5">
                <p>
                    $14,505,057.06

                    <span class="text-sm">por año</span>
                </p> 
                
            </div>


        </div>



        <!-- Modal -->
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="fixed z-10 inset-0 overflow-y-auto @if($modal) @else hidden @endif" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full {{-- {{$bgIcono}} --}} sm:mx-0 sm:h-10 sm:w-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    {{ $titulomsj }}
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{$msj}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm bg-red-600 text-white hover:bg-red-700 focus:ring-red-500" 
                        wire:click="ocultarModal">
                            {{$btnTexto}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fin modal --}}


    </div>

</div>
