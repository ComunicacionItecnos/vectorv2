<section class="py-10 ">
    <div class="grid max-w-6xl grid-cols-1 px-6 mx-auto lg:px-8 md:grid-cols">

        <form novalidate="" action=""
            class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">

            <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-xl shadow-md dark:bg-coolGray-900 bg-white">

                <div class="space-y-2 col-span-full lg:col-span-1">

                    <p class="font-medium text-center">Información personal</p>

                    <div class="flex flex-col items-center justify-center">
                        <div class="flex space-x-5 py-4">
                            <img alt=""
                                class="w-36 h-36 rounded-full ring-2 ring-offset-4 ring-red-400 ring-offset-coolGray-800"
                                src="{{ Storage::url($nuevoIngreso[0]->foto) }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 py-4 text-center">
                        <div class="col-span-1">
                            <label
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white"
                                wire:click="modal(1,)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>

                </div>

                <div
                    class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3 px-6 md:border-l-2 lg:border-l-2 border-red-400">
                    <div class="col-span-full sm:col-span-3">
                        <label for="firstname" class="text-medium">First name</label>
                        <input id="firstname" type="text" placeholder="First name"
                            class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                    </div>
                    <div class="col-span-full sm:col-span-3">
                        <label for="lastname" class="text-medium">Last name</label>
                        <input id="lastname" type="text" placeholder="Last name"
                            class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                    </div>
                    <div class="col-span-full sm:col-span-3">
                        <label for="email" class="text-medium">Email</label>
                        <input id="email" type="email" placeholder="Email"
                            class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                    </div>
                    <div class="col-span-full">
                        <label for="address" class="text-medium">Address</label>
                        <input id="address" type="text" placeholder=""
                            class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                    </div>
                    <div class="col-span-full sm:col-span-2">
                        <label for="city" class="text-medium">City</label>
                        <input id="city" type="text" placeholder=""
                            class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                    </div>
                    <div class="col-span-full sm:col-span-2">
                        <label for="state" class="text-medium">State / Province</label>
                        <input id="state" type="text" placeholder=""
                            class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                    </div>
                    <div class="col-span-full sm:col-span-2">
                        <label for="zip" class="text-medium">ZIP / Postal</label>
                        <input id="zip" type="text" placeholder=""
                            class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900">
                    </div>

                    <div class="flex justify-start px-2 py-2 col-end-7 col-span-2 ">
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                            wire:click="increaseStep()">
                            Siguiente
                        </button>
                    </div>

                </div>

            </fieldset>

        </form>

    </div>
</section>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
</div>



{{-- <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
	Open regular modal
</button>

<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-id">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div
            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    Modal Title
                </h3>
                <button
                    class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                    onclick="toggleModal('modal-id')">
                    <span
                        class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                        ×
                    </span>
                </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">




                <object data="{{ Storage::url($nuevoIngreso[0]->credencialIFE) }}" type="application/pdf" width="100%"
                    height="100%" typemustmatch>
                    <p>No se pudo acceder al pdf, puedes hacerlo desde aqui <a
                            href="{{ Storage::url($nuevoIngreso[0]->credencialIFE) }}">click</a> </p>
                </object>

                <p class="my-4 text-blueGray-500 text-lg leading-relaxed">

                </p>
            </div>
            <!--footer-->
            <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                <button
                    class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" onclick="toggleModal('modal-id')">
                    Close
                </button>
                <button
                    class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" onclick="toggleModal('modal-id')">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<script type="text/javascript">
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
</script> --}}
