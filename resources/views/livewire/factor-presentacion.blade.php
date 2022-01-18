<div style="margin-left: 5%; margin-right: 5%;">
    <header class="p-4 bg-white">
        <a aria-label="Back to homepage" class="flex justify-center p-2 content-center">
            <img src="{{ asset('images/disc/FACTOR_logo_new.svg') }}" loading="lazy" class="h-20 w-100">
        </a>
    </header>

    <div class="mb-8 max-w-7xl px-8 py-4 mx-auto bg-white rounded-lg shadow-xl" >

        <div class="grid grid-cols-6 gap-4 text-center place-items-center">

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
        
        </div>


        <div class="grid grid-cols-6 gap-4 text-center place-items-center pt-2">

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

        </div>


        <div class="grid grid-cols-6 gap-4 text-center place-items-center pt-4">

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

        </div>


        <div class="grid grid-cols-6 gap-4 text-center place-items-center pt-4 border-t border-gray-600">

            <div>Total</div>
            
            <div>
                <p>
                    $5,588,000.00
                </p> 
            </div>

            <div class="col-span-4">
                <p>
                    $14,505,057.06

                    <span class="text-sm">por año</span>
                </p> 
                
            </div>


        </div>


    </div>

</div>
