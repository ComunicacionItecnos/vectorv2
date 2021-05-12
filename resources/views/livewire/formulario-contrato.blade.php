@if (auth()->user()->role_id != 6)
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-red-700">
        Contrato
    </h2>
</x-slot>

<div class="py-4 mx-auto">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

            <form wire:submit.prevent="createPDF">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6 flex justify-center sm:justify-end">
                            <button wire:click="createPDF" type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-black text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Generar contrato
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@else
<h3 class="text-center text-4xl font-black ">
    Sal de aqui :p
</h3>
@endif