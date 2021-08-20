<style>
    .caja6:hover {
        -werbit-box-shadow: 10px 10px 14px 2px rgba(0, 0, 0, 0.47);
        box-shadow: 10px 10px 14px 2px rgba(0, 0, 0, 0.47);
    }

</style>



<div class="flex flex-wrap overflow-hidden bg-blue-800 py-10">

    <div class="w-full overflow-hidden">
        <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-xl shadow-md dark:bg-coolGray-900 bg-white">
        </fieldset>
    </div>
  
</div>


<div class="py-10 ">
    <div class="grid max-w-5xl grid-cols-1 px-6 mx-auto lg:px-8 md:grid-cols">

        <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-xl shadow-md dark:bg-coolGray-900 bg-white">

            <div class="space-y-2 col-span-full lg:col-span-4">
                <legend></legend>
                <div class="grid grid-cols-4">
                    <div class=" col-span-1 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                        <select wire:model='perPage'
                            class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4">
                            <option value="1">1</option>
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

                @if ($nuevosIngresos->count())

                    <div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-2 lg:-mx-2 xl:-mx-2">
                        @foreach ($nuevosIngresos as $nI)



                        @endforeach
                    </div>

                    <div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-3 md:-mx-2 lg:-mx-2 xl:-mx-2">

                        <div
                            class="my-2 px-2 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-1/2 md:my-2 md:px-2 md:w-1/4 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4">
                            <!-- Column Content -->
                        </div>

                        <div
                            class="my-2 px-2 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-1/2 md:my-2 md:px-2 md:w-1/4 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4">
                            <!-- Column Content -->
                        </div>

                        <div
                            class="my-2 px-2 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-1/2 md:my-2 md:px-2 md:w-1/4 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4">
                            <!-- Column Content -->
                        </div>

                        <div
                            class="my-2 px-2 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-1/2 md:my-2 md:px-2 md:w-1/4 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4">
                            <!-- Column Content -->
                        </div>

                    </div>

                    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                        {{ $nuevosIngresos->links() }}
                    </div>

                @else
                    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                        <h6 class="text-center text-gray-500">No se encontró a ningún campo que coincida con:
                            "{{ $search }}"</h6>
                    </div>
                @endif

            </div>

        </fieldset>

    </div>
</div>


<br>
<br>

<!-- This example requires Tailwind CSS v2.0+ -->
{{-- <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
  Background overlay, show/hide based on modal state.
  
  Entering: "ease-out duration-300"
  From: "opacity-0"
  To: "opacity-100"
  Leaving: "ease-in duration-200"
  From: "opacity-100"
  To: "opacity-0"
 -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!--
  Modal panel, show/hide based on modal state.
  
  Entering: "ease-out duration-300"
  From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
  To: "opacity-100 translate-y-0 sm:scale-100"
  Leaving: "ease-in duration-200"
  From: "opacity-100 translate-y-0 sm:scale-100"
  To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
 -->
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>

                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Deactivate account
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to deactivate your account? All of your data will be permanently
                                removed. This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Deactivate
                </button>
                <button type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div> --}}
