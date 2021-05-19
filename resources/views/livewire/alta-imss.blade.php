<div class="sm:p-8 p-2 mx-auto bg-gray-100">
    <header class="bg-white rounded-md shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-red-700">
                Descarga tu alta del IMSS
            </h2>
        </div>
    </header>

    <form wire:submit.prevent="descargarAlta">
        <div class="p-2 mt-20">
            @if ($bandera_volver == true)
            <div class="grid grid-cols-1 col-start-1">
                <a href="https://factoraguila.com/"
                    class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Volver a Factor</a>
            </div>
            @else
            <div class="grid grid-cols-2 mx-auto">
                <div class="col-start-1 mx-auto">
                    <button wire:click="descargarAlta" type="submit"
                        class="inline-flex items-center px-4 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-green-900 focus:outline-none focus:border-green-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Descargar</button>
                </div>
                <div class="col-start-2 mx-auto">
                    <a href="https://factoraguila.com/"
                        class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Volver a Factor</a>
                </div>
            </div>
            @endif
        </div>
    </form>
</div>