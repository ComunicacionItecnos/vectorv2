<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <div class="max-w-md mx-auto">
                <div>
                    <p class="block font-black text-gray-700 text-2xl text-center">Actualización de documentos</p>
                </div>

                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

                        {{-- Step 1 --}}
                        @if ($currentStep == 1)
                            <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                <p class="block text-base font-medium text-gray-700">
                                    1) Actualiza tus documentos que tengan el siguiente signo <span
                                        class="mt-1 mb-1 text-base text-red-600 italic m-1">*</span>.
                                </p>
                                <br>
                                <p class="space-y-6 block text-base font-medium text-gray-700">
                                    2) Los campos con el siguiente signo <span
                                        class="mt-1 mb-1 text-base text-red-600 italic m-1">+</span> te permiten
                                    subir
                                    más de un archivo.
                                </p>

                            </div>
                        @endif

                        <form wire:submit.prevent="triggerConfirm" enctype="multipart/form-data">

                            {{-- Step 2 --}}
                            @if ($currentStep == 2)
                                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                                    @if ($r_obscurp != null || $a_obscurp != null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="curp" class="block text-base font-medium text-gray-700"><span
                                                    class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                CURP</label>
                                            @if ($curp)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="curp" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="curp" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('curp')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            @if ($r_obscurp != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $r_obscurp }}</p>
                                            @endif
                                            @if ($a_obscurp != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $a_obscurp }}</p>
                                            @endif
                                        </div>
                                    @endif

                                    @if ($r_obsactaNac != null || $a_obsactaNac != null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="actaNac" class="block text-base font-medium text-gray-700"><span
                                                    class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                Acta de nacimiento</label>
                                            @if ($actaNac)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="actaNac" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="actaNac" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('actaNac')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            @if ($r_obsactaNac != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $r_obsactaNac }}</p>
                                            @endif
                                            @if ($a_obsactaNac != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $a_obsactaNac }}</p>
                                            @endif
                                        </div>
                                    @endif

                                    @if ($r_obsrfc != null || $a_obsrfc != null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="rfc" class="block text-base font-medium text-gray-700"><span
                                                    class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                RFC</label>
                                            @if ($rfc)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="rfc" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="rfc" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('rfc')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            @if ($r_obsrfc != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $r_obsrfc }}</p>
                                            @endif
                                            @if ($a_obsrfc != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $a_obsrfc }}</p>
                                            @endif
                                        </div>
                                    @endif

                                    @if ($r_obsimss != null || $a_obsimss != null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="imss" class="block text-base font-medium text-gray-700"><span
                                                    class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                Alta del IMSS documento</label>
                                            @if ($imss)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="imss" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="imss" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('imss')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            @if ($r_obsimss != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $r_obsimss }}</p>
                                            @endif
                                            @if ($a_obsimss != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $a_obsimss }}</p>
                                            @endif
                                        </div>
                                    @endif

                                    @if ($r_obscredencial != null || $a_obscredencial != null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="credencialIFE"
                                                class="block text-base font-medium text-gray-700"><span
                                                    class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                Credencial IFE</label>
                                            @if ($credencialIFE)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="credencialIFE" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="credencialIFE" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('credencialIFE')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror


                                            @if ($r_obscredencial != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $r_obscredencial }}</p>
                                            @endif
                                            @if ($a_obscredencial != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $a_obscredencial }}</p>
                                            @endif
                                        </div>
                                    @else
                                    @endif

                                    @if ($r_obsDir != null || $a_obsDir != null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="domicilio"
                                                class="block text-base font-medium text-gray-700"><span
                                                    class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                Comprobante de domicilio</label>
                                            @if ($domicilio)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="domicilio" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="domicilio" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('domicilio')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            @if ($r_obsDir != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $r_obsDir }}</p>
                                            @endif
                                            @if ($a_obsDir != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $a_obsDir }}</p>
                                            @endif
                                        </div>
                                    @endif

                                    @if ($r_obsEstudios != null || $a_obsEstudios != null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="Estudios"
                                                class="block text-base font-medium text-gray-700"><span
                                                    class="mt-1 mb-1 text-base text-red-600 italic">*</span>
                                                Constancia de estudios</label>
                                            @if ($Estudios)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="Estudios" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="Estudios" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('Estudios')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            @if ($r_obsEstudios != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $r_obsEstudios }}</p>
                                            @endif
                                            @if ($a_obsEstudios != null)
                                                <p class="py-2 block text-xs font-medium text-gray-500">Observaciones:
                                                    {{ $a_obsEstudios }}</p>
                                            @endif
                                        </div>
                                    @endif

                                </div>
                            @endif

                            {{-- Step 3 --}}
                            @if ($currentStep == 3)
                                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                                    @if ($paternidad == 1)
                                        @if ($actaHijos == null)
                                            <div class="col-span-full sm:col-span-3">
                                                <label for="actaHijos_update"
                                                    class="block text-base font-medium text-gray-700"><span
                                                        class="mt-1 mb-1 text-base text-red-600 italic">+</span>
                                                    Actas de los hijos</label>
                                                @if ($actaHijos_update)
                                                    <label
                                                        class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <input type='file' wire:model="actaHijos_update" accept=".pdf"
                                                            class="hidden" multiple />
                                                    </label>
                                                @else
                                                    <label
                                                        class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                        </svg>
                                                        <input type='file' wire:model="actaHijos_update" accept=".pdf"
                                                            class="hidden" multiple />
                                                    </label>
                                                @endif

                                                @error('actaHijos_update')
                                                    <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        @endif
                                    @endif

                                    @if ($cartillaMilitar == null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="cartillaMilitar_update"
                                                class="block text-base font-medium text-gray-700">
                                                Cartilla Militar</label>
                                            @if ($cartillaMilitar_update)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="cartillaMilitar_update" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="cartillaMilitar_update" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('cartillaMilitar_update')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    @endif

                                    @if ($cartaRecomendacion == null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="cartaRecomendacion_update"
                                                class="block text-base font-medium text-gray-700">
                                                Cartas de recomendación</label>
                                            @if ($cartaRecomendacion_update)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="cartaRecomendacion_update"
                                                        accept=".pdf" class="hidden" multiple />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="cartaRecomendacion_update"
                                                        accept=".pdf" class="hidden" multiple />
                                                </label>
                                            @endif

                                            @error('cartaRecomendacion_update')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    @endif

                                    @if ($cartaNoPenales == null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="cartaNoPenales_update"
                                                class="block text-base font-medium text-gray-700">
                                                Antecedentes no penales</label>
                                            @if ($cartaNoPenales_update)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="cartaNoPenales_update" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="cartaNoPenales_update" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('cartaNoPenales_update')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    @endif

                                    @if ($buroCredito == null)
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="buroCredito_update"
                                                class="block text-base font-medium text-gray-700">
                                                Buro de credito</label>
                                            @if ($buroCredito_update)
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-green-500 border border-green-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <input type='file' wire:model="buroCredito_update" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @else
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="buroCredito_update" accept=".pdf"
                                                        class="hidden" />
                                                </label>
                                            @endif

                                            @error('buroCredito_update')
                                                <p class="mt-1 mb-1 text-sm text-red-600 italic">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    @endif

                                </div>
                            @endif

                            <div class="h-16 p-8 grid grid-cols-3">
                                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                                    <div
                                        class="flex justify-start px-2 col-span-1 col-start-1 col-end-3 @if ($currentStep == 1) hidden @endif">
                                        <button type="button"
                                            class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                            wire:click="decreaseStep()">
                                            Regresar
                                        </button>
                                    </div>


                                    <div class="flex justify-start px-2 col-end-7 col-span-2 @if ($currentStep == 3) hidden @endif">
                                        <button type="button"
                                            class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                            wire:click="increaseStep()">
                                            Siguiente
                                        </button>
                                    </div>



                                    <div class="flex justify-end px-2 col-end-7 col-span-2 @if ($currentStep != 3) hidden @endif">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-red-900 focus:outline-none focus:border-green-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Finalizar
                                        </button>
                                    </div>
                                @endif
                            </div>

                        </form>

                        @if ($currentStep == 4)
                            <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">

                                <p class="block text-base font-medium text-gray-700">
                                    Haz finalizado correctemente la actualización de tus documentos.
                                </p>

                                <p class="block text-base font-medium text-gray-700">
                                    Cierra esta ventana
                                </p>
                        
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
