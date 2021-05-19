<div class="sm:p-8 p-2 mx-auto bg-gray-100">
    <header class="bg-white rounded-md shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-red-700">
                Descarga tu alta del IMSS
            </h2>
        </div>
    </header>

    <form wire:submit.prevent="descargarAlta">
        <div class="flex justify-center p-8 mt-20">
            <button wire:click="descargarAlta" type="submit"
                class="inline-flex items-center px-4 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-red-900 focus:outline-none focus:border-green-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Descargar</button>
        </div>
    </form>
</div>