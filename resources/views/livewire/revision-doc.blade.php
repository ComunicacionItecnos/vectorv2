<div class="py-10 grid max-w-5xl grid-cols-1 px-6 mx-auto lg:px-8 md:grid-cols">

    {{-- Mostrar mas detallada --}}
    <section class="sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4 bg-white shadow-lg rounded-xl @if ($mostrarCandidato) @else hidden @endif">
        @if ($candidatoDoc == [])
            <p>Sin candidato</p>
            <button type="button" wire:click="showMore">Regresar</button>
        @else
            <form wire:submit.prevent="triggerConfirm">

                {{-- Credencial --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current text-red-400"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                        <div class="col-span-full sm:col-span-6">
                            <img src="{{ Storage::url($foto) }}" alt="Profile face"
                                class="p-1 w-24 h-24 mx-auto rounded-full  object-cover ring-2 ring-offset-4 violet-800
                                @if ($status == 0)
                                    ring-gray-500 
                                @elseif($status == 1)
                                    ring-yellow-500
                                @elseif($status == 2)
                                    ring-green-500
                                @elseif($status == 3)
                                    ring-red-500
                                @endif"
                                loading="lazy">
                        </div>

                        @if ($nombre2 == '')
                            <div class="col-span-full sm:col-span-3">
                                <label for="firstname" class="text-sm">Primer nombre</label>
                                <input id="firstname" type="text" placeholder="First name"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    value="{{ $nombre1 }}" disabled>
                            </div>
                        @else
                            <div class="col-span-full sm:col-span-3">
                                <label for="firstname" class="text-sm">Primer nombre</label>
                                <input id="firstname" type="text" placeholder="First name"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    value="{{ $nombre1 }}" disabled>
                            </div>
                            <div class="col-span-full sm:col-span-3">
                                <label for="lastname" class="text-sm">Segundo nombre</label>
                                <input id="lastname" type="text" placeholder="Last name"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    value="{{ $nombre2 }}" disabled>
                            </div>
                        @endif

                        <div class="col-span-full sm:col-span-3">
                            <label for="ap_pat" class="text-sm">Apellido paterno</label>
                            <input id="ap_pat" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $ap_paterno }}" disabled>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="ap_mat" class="text-sm">Apellido materno</label>
                            <input id="ap_mat" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $ap_materno }}" disabled>
                        </div>
                        <div class="col-span-full sm:col-span-4 text-center object-center justify-center">
                            <label class="text-sm">Credencial INE</label>
                            <a href="{{ Storage::url($credencialIFE) }}" target="_blank"
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label class="text-sm">¿Datos correctos?</label>

                            <label for="Toggle" class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="Toggle" type="checkbox" class="hidden peer"
                                        wire:model="credencialValue" wire:click="credencialToogle">
                                    @if ($credencialValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>

                        @if ($r_obscredencial != NULL || $a_obscredencial != NULL)

                        @else
                            <div class="col-span-full sm:col-span-6  @if ($credencialValue) hidden @else  @endif">
                                <label for="observacionCredencial" class="text-sm">Observaciones</label>
                                <textarea id="observacionCredencial" name="observacionCredencial"
                                    wire:model="observacionCredencial" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    @if ($credencialValue) @else required @endif></textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $r_obscredencial != NULL && $status == 1)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionCredencial" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="r_observacionCredencial" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obscredencial }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obscredencial != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionCredencial" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por administración</label>
                                <textarea id="a_observacionCredencial" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obscredencial }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- Acta nacimiento --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        <div class="col-span-full sm:col-span-3">
                            <label for="fech_nac" class="text-sm">Fecha de nacimiento</label>
                            <input id="fech_nac" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $fecha_nacimiento }}" disabled>
                        </div>
                        <div class="col-span-full sm:col-span-4 text-center object-center justify-center">
                            <label for="city" class="text-sm">Acta de nacimiento</label>
                            <a href="{{ Storage::url($actaNacimiento) }}" target="_blank"
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label for="city" class="text-sm">¿Datos correctos?</label>

                            <label for="actaNacValue"
                                class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="actaNacValue" type="checkbox" class="hidden peer"
                                        wire:model="actaNacValue" wire:click="actaNacToogle">
                                    @if ($actaNacValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>

                        @if ($r_obsfecNac != NULL || $a_obsfecNac != NULL)

                        @else
                            <div class="col-span-full sm:col-span-6  @if ($actaNacValue) hidden @else @endif">
                                <label for="observacionActaNac" class="text-sm">Observaciones</label>
                                <textarea id="observacionActaNac" name="observacionActaNac"
                                    wire:model="observacionActaNac" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    @if ($actaNacValue) @else required @endif></textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $r_obsfecNac != NULL && $status == 1)
                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionActaNac" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="a_observacionActaNac" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obsfecNac }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obsfecNac != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionActaNac" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por administración</label>
                                <textarea id="a_observacionActaNac" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obsfecNac }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- Direccion --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        <div class="col-span-full sm:col-span-3">
                            <label for="estado" class="text-sm">Estado</label>
                            <input id="estado" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $estado }}" disabled>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="municipio" class="text-sm">Municipio</label>
                            <input id="municipio" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $municipio }}" disabled>
                        </div>
                        <div class="col-span-full sm:col-span-4">
                            <label for="calle" class="text-sm">Calle</label>
                            <input id="calle" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $calle }}" disabled>
                        </div>

                        <div class="col-span-full sm:col-span-1">
                            <label for="numExt" class="text-sm">Núm Exterior</label>
                            <input id="numExt" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $numExt }}" disabled>
                        </div>
                        <div class="col-span-full sm:col-span-1">
                            <label for="numInt" class="text-sm">Núm Interior</label>
                            <input id="numInt" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $numInt }}" disabled>
                        </div>

                        <div class="col-span-full sm:col-span-4">
                            <label for="colonia" class="text-sm">Colonia</label>
                            <input id="colonia" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $colonia }}" disabled>
                        </div>
                        <div class="col-span-full sm:col-span-2">
                            <label for="cod_postal" class="text-sm">codigo postal</label>
                            <input id="cod_postal" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $codigo_postal }}" disabled>
                        </div>
                        <div class="col-span-full sm:col-span-4 text-center object-center justify-center">
                            <label for="city" class="text-sm">Comprobante de domicilio</label>
                            <a href="{{ Storage::url($comprobanteDomicilio) }}" target="_blank"
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label for="dirValue" class="text-sm">¿Datos correctos?</label>

                            <label for="dirValue"
                                class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="dirValue" type="checkbox" class="hidden peer" wire:model="dirValue"
                                        wire:click="direccionToggle">
                                    @if ($dirValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>


                        @if ($r_obsdomicilio != NULL || $a_obsdomicilio != NULL)

                        @else
                            <div class="col-span-full sm:col-span-6  @if ($dirValue) hidden @else @endif">
                                <label for="observacionDir" class="text-sm">Observaciones</label>
                                <textarea id="observacionDir" wire:model="observacionDir" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    @if ($dirValue) @else required @endif></textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $r_obsdomicilio != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionDir" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="r_observacionDir" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obsdomicilio }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obsdomicilio != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionDir" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por administración</label>
                                <textarea id="a_observacionDir" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obsdomicilio }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- Curp --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        <div class="col-span-full sm:col-span-3">
                            <label for="curp" class="text-sm">CURP</label>
                            <input id="curp" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $curp }}" disabled>
                        </div>

                        <div class="col-span-full sm:col-span-4 text-center object-center justify-center">
                            <label for="city" class="text-sm">CURP Documento</label>
                            <a href="{{ Storage::url($curpDoc) }}" target="_blank"
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label for="curpDocValue" class="text-sm">¿Datos correctos?</label>

                            <label for="curpDocValue"
                                class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="curpDocValue" type="checkbox" class="hidden peer"
                                        wire:model="curpDocValue" wire:click="curpDocToogle">
                                    @if ($curpDocValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>

                        @if ($r_obscurp != NULL || $a_obscurp != NULL)

                        @else
                            <div class="col-span-full sm:col-span-6  @if ($curpDocValue) hidden @else @endif">
                                <label for="a_observacionCurpDoc" class="text-sm">Observaciones</label>
                                <textarea id="a_observacionCurpDoc" wire:model="observacionCurpDoc" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    @if ($curpDocValue) @else required @endif></textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $r_obscurp != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionCurpDoc" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="r_observacionCurpDoc" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obscurp }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obscurp != NULL)

                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionCurpDoc" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por administración</label>
                                <textarea id="a_observacionCurpDoc" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obscurp }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- Rfc --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        <div class="col-span-full sm:col-span-3">
                            <label for="rfc" class="text-sm">RFC</label>
                            <input id="rfc" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $rfc }}" disabled>
                        </div>

                        <div class="col-span-full sm:col-span-4 text-center object-center justify-center">
                            <label for="city" class="text-sm">RFC Documento</label>
                            <a href="{{ Storage::url($rfcDocumento) }}" target="_blank"
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label for="rfcValue" class="text-sm">¿Datos correctos?</label>

                            <label for="rfcValue"
                                class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="rfcValue" type="checkbox" class="hidden peer" wire:model="rfcValue"
                                        wire:click="rfcToogle">
                                    @if ($rfcValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>

                        @if ($r_obsrfc != NULL || $a_obsrfc != NULL)

                        @else
                            <div class="col-span-full sm:col-span-6  @if ($rfcValue) hidden @else @endif">
                                <label for="observacionrfc" class="text-sm">Observaciones</label>
                                <textarea id="observacionrfc" wire:model="observacionrfc" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    @if ($rfcValue) @else required @endif></textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $r_obsrfc != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionrfc" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="r_observacionrfc" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obsrfc }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obsrfc != NULL)

                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionrfc" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por administración</label>
                                <textarea id="a_observacionrfc" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obsrfc }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- Num seguro social --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        <div class="col-span-full sm:col-span-3">
                            <label for="numImss" class="text-sm">Número de seguridad social </label>
                            <input id="numImss" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $no_seguro_social }}" disabled>
                        </div>

                        <div class="col-span-full sm:col-span-4 text-center object-center justify-center">
                            <label for="city" class="text-sm">Documento IMSS</label>
                            <a href="{{ Storage::url($altaImssDoc) }}" target="_blank"
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label for="imssValue" class="text-sm">¿Datos correctos?</label>

                            <label for="imssValue"
                                class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="imssValue" type="checkbox" class="hidden peer" wire:model="imssValue"
                                        wire:click="imssToogle">
                                    @if ($imssValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>

                        @if ($r_obsimss != NULL || $a_obsimss != NULL)

                        @else
                            <div class="col-span-full sm:col-span-6  @if ($imssValue) hidden @else @endif">
                                <label for="observacionimss" class="text-sm">Observaciones</label>
                                <textarea id="observacionimss" wire:model="observacionimss" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    @if ($imssValue) @else required @endif></textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $r_obsimss != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionimss" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="r_observacionimss" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obsimss }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obsimss != NULL)

                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionimss" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por administración</label>
                                <textarea id="a_observacionimss" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obsimss }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- Nivel estudios --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        <div class="col-span-full sm:col-span-3">
                            <label for="escolaridad" class="text-sm">Escolaridad</label>
                            <input id="escolaridad" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $escolaridad }}" disabled>
                        </div>

                        @if ($escolaridad_id > 5)
                            <div class="col-span-full sm:col-span-3">
                                <label for="esp_estudios" class="text-sm">Especialidad de estudios</label>
                                <input id="esp_estudios" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    value="{{ $especialidadEstudios }}" disabled>
                            </div>
                        @endif

                        <div class="col-span-full sm:col-span-4 text-center object-center justify-center">
                            <label for="city" class="text-sm">Constancia de estudios</label>
                            <a href="{{ Storage::url($constanciaEstudios) }}" target="_blank"
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label for="escolaridadValue" class="text-sm">¿Datos correctos?</label>

                            <label for="escolaridadValue"
                                class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="escolaridadValue" type="checkbox" class="hidden peer"
                                        wire:model="escolaridadValue" wire:click="escolaridadToogle">
                                    @if ($escolaridadValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>

                        @if ($r_obsNivelEstudios != NULL || $a_obsNivelEstudios != NULL)

                        @else
                            <div class="col-span-full sm:col-span-6  @if ($escolaridadValue) hidden @else @endif">
                                <label for="observacionescolaridad" class="text-sm">Observaciones</label>
                                <textarea id="observacionescolaridad" wire:model="observacionescolaridad" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    @if ($escolaridadValue)  @else required @endif></textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $r_obsNivelEstudios != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionNivelEstudios" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="r_observacionNivelEstudios" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obsNivelEstudios }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obsNivelEstudios != NULL)

                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionNivelEstudios" class="text-sm"><span
                                        class="text-red-600">*</span> Observaciones realizadas por
                                    administración</label>
                                <textarea id="a_observacionNivelEstudios" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obsNivelEstudios }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- Antecedentes no penales --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                            <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        @if ($cartaNoPenales == NULL)
                            <div class="col-span-full sm:col-span-3 text-center object-center justify-center">
                                <label for="email" class="text-sm">Carta de antecedentes no penales</label>
                                <p class="flex items-center text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 sm:mr-6 text-red-600"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <span>{{ __('No tiene archivos') }}</span>
                                </p>
                            </div>
                        @else
                            <div class="col-span-full sm:col-span-3 text-center object-center justify-center">
                                <label for="city" class="text-sm">Carta de antecedentes no penales</label>
                                <a href="{{ Storage::url($cartaNoPenales) }}" target="_blank"
                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>

                            </div>
                        @endif

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label for="nopenalesValue" class="text-sm">¿Datos correctos?</label>

                            <label for="nopenalesValue"
                                class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="nopenalesValue" type="checkbox" class="hidden peer"
                                        wire:model="nopenalesValue" wire:click="escolaridadToogle">
                                    @if ($nopenalesValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>

                        @if ($r_obscartaNoPenales != NULL || $a_obscartaNoPenales != NULL)

                        @else
                            <div class="col-span-full sm:col-span-6  @if ($nopenalesValue) hidden @else @endif">
                                <label for="observacionnopenalesValue" class="text-sm">Observaciones</label>
                                <textarea id="observacionnopenalesValue" wire:model="observacionnopenalesValue" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    @if ($nopenalesValue)  @else required @endif></textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $r_obscartaNoPenales != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionnopenalesValue" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="r_observacionnopenalesValue" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obscartaNoPenales }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obscartaNoPenales != NULL)

                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionnopenalesValue" class="text-sm"><span
                                        class="text-red-600">*</span> Observaciones realizadas por
                                    administración</label>
                                <textarea id="a_observacionnopenalesValue" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obscartaNoPenales }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- documentos faltantes --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                            <path fill-rule="evenodd"
                                d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        @if ($estado_civil == 'Casado (a)')
                            <div class="col-span-full sm:col-span-6">
                                <label for="email" class="text-sm">Acta de matrimonio</label>
                                <a href="{{ Storage::url($actaMatrimonio) }}" target="_blank"
                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        @if ($paternidad == 1)
                        
                            @if ($actasHijo == NULL)

                            @else
                                <div class="col-span-full sm:col-span-6 text-center object-center justify-center">
                                    <label for="email" class="text-sm">Acta de hijo(s)</label>
                                    @foreach (json_decode($actasHijo) as $ac)
                                        <a href="{{ Storage::url($ac) }}" target="_blank"
                                            class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                        @endif

                        <div class="col-span-full sm:col-span-6 text-center object-center justify-center">
                            <label for="email" class="text-sm">Cv ó solicitud de empleo</label>
                            <a href="{{ Storage::url($cvOsolicitudEmpleo) }}" target="_blank"
                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>

                        @if ($cartasRecomendacion == NULL || $cartasRecomendacion == NULL)
                            <div class="col-span-full sm:col-span-3 text-center object-center justify-center">
                                <label for="email" class="text-sm">Cartas de recomendación</label>
                                <p class="flex items-center text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 sm:mr-6 text-red-600"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <span>{{ __('No tiene archivos') }}</span>
                                </p>
                            </div>
                        @else
                            <div class="col-span-full sm:col-span-6 text-center object-center justify-center">
                                <label for="email" class="text-sm">Cartas de recomendación</label>
                                @foreach (json_decode($cartasRecomendacion) as $cR)
                                    <a href="{{ Storage::url($cR) }}" target="_blank"
                                        class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        @if ($cartillaMilitar == NULL)
                            <div class="col-span-full sm:col-span-3 text-center object-center justify-center">
                                <label for="email" class="text-sm">Cartilla Militar</label>
                                <p class="flex items-center text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 sm:mr-6 text-red-600"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <span>{{ __('No tiene archivos') }}</span>
                                </p>
                            </div>
                        @else
                            <div class="col-span-full sm:col-span-3 text-center object-center justify-center">
                                <label for="city" class="text-sm">Cartilla Militar</label>
                                <a href="{{ Storage::url($cartillaMilitar) }}" target="_blank"
                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>

                            </div>
                        @endif

                        @if ($buroCredito == NULL)
                        @else
                            <div class="col-span-full sm:col-span-3 text-center object-center justify-center">
                                <label for="city" class="text-sm">Buro de credito</label>
                                <a href="{{ Storage::url($buroCredito) }}" target="_blank"
                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>

                            </div>
                        @endif

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <label for="obsExtValue" class="text-sm">¿Quieres dejar observaciones
                                extras?</label>

                            <label for="obsExtValue"
                                class="inline-flex items-center space-x-4 cursor-pointer dark:text-coolGray-100">
                                <span>No</span>
                                <span class="relative">
                                    <input id="obsExtValue" type="checkbox" class="hidden peer"
                                        wire:model="obsExtValue" wire:click="obsExToogle">
                                    @if ($obsExtValue)
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-green-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 right-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-6 rounded-full shadow-inner dark:bg-coolGray-400 peer-checked:dark:bg-violet-400 bg-red-600">
                                        </div>
                                        <div
                                            class="absolute inset-y-0 left-0 w-4 h-4 m-1 rounded-full shadow peer-checked:right-0 peer-checked:left-auto dark:bg-coolGray-800 bg-white">
                                        </div>
                                    @endif

                                </span>
                                <span>Si</span>
                            </label>
                        </div>

                        <div class="col-span-full sm:col-span-6  @if ($obsExtValue) @else hidden @endif">
                            <label for="observacionobsExt" class="text-sm">Observaciones</label>
                            <textarea id="observacionobsExt" wire:model="observacionobsExt" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"></textarea>
                        </div>

                        @if ($userLogin == 5 && $r_obsExtra != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionExtra" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por reclutamiento</label>
                                <textarea id="r_observacionExtra" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obsExtra }}</textarea>
                            </div>
                        @elseif($userLogin == 3 && $a_obsExtra != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionExtra" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones realizadas por administración</label>
                                <textarea id="a_observacionExtra" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obsExtra }}</textarea>
                            </div>
                        @endif

                        @if ($userLogin == 5 && $a_obsExtra != NULL)

                            <div class="col-span-full sm:col-span-6">
                                <label for="a_observacionExtra" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones de administración</label>
                                <textarea id="a_observacionExtra" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $a_obsExtra }}</textarea>
                            </div>

                        @elseif($userLogin == 3 && $r_obsExtra != NULL)
                            <div class="col-span-full sm:col-span-6">
                                <label for="r_observacionExtra" class="text-sm"><span
                                        class="text-red-600">*</span>
                                    Observaciones de reclutaminto</label>
                                <textarea id="a_observacionExtra" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    disabled>{{ $r_obsExtra }}</textarea>
                            </div>
                        @endif

                    </div>
                </fieldset>

                {{-- Revision --}}
                <fieldset
                    class="grid grid-cols-2 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900 @if ($r_userId == NULL && $a_userId == NULL) hidden @else @endif">
                    <div
                        class="grid grid-cols-4 gap-4 col-span-full lg:col-span-3 object-center justify-center text-center">

                        <div class="col-span-full sm:col-span-2 @if ($r_userId != NULL) @else hidden @endif">
                            <label for="r_userId" class="text-sm">Revisado por</label>
                            <input id="r_userId" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $r_userId }}" disabled>
                        </div>

                        <div class="col-span-full sm:col-span-2 @if ($a_userId != NULL) @else hidden @endif">
                            <label for="a_userId" class="text-sm">Revisado por </label>
                            <input id="a_userId" type="text"
                                class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                value="{{ $a_userId }}" disabled>
                        </div>

                    </div>
                </fieldset>

                {{-- Botones --}}
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                    <div
                        class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3 object-center justify-center text-center">

                        <div class="col-span-full sm:col-span-2">
                            <button type="button"
                                class="px-8 py-3 font-semibold rounded-full dark:bg-coolGray-100 dark:text-coolGray-800 bg-gray-500 text-white"
                                wire:click="showMore">
                                Regresar
                            </button>
                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <button type="button"
                                class="px-8 py-3 font-semibold rounded-full dark:bg-coolGray-100 dark:text-coolGray-800 bg-red-500 text-white"
                                wire:click="showMore">
                                Cancelar
                            </button>
                        </div>

                        <div class="col-span-full sm:col-span-2 @if($userLogin == 3 && $status == 2) hidden @endif">
                            <button type="submit"
                                class="px-8 py-3 font-semibold rounded-full dark:bg-coolGray-100 dark:text-coolGray-800 bg-green-700 text-white">
                                Guardar
                            </button>
                        </div>

                    </div>
                </fieldset>

            </form>

        @endif
    </section>

    {{-- Cards --}}
    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4 bg-white shadow-lg rounded-xl  page__style @if ($mostrarTodos) @else hidden @endif">

        <header class="flex items-center justify-between">
            <h2 class="text-lg leading-6 font-medium text-black">Candidatos</h2>
        </header>
        <form class="relative">
            <div class="grid grid-cols-4">
                <div class=" col-span-1 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                    <select wire:model.debounce.200ms='mostrarStatus'
                        class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4">
                        <option value="" selected>Todos</option>
                        <option value="0">Sin revisar</option>
                        <option value="1">Incompleto</option>
                        <option value="3">Rechazado</option>
                        <option value="2" class="@if ($userLogin == 5) hidden @else @endif">Completado</option>
                    </select>
                </div>
                <div class="col-span-3 flex px-2 py-2 bg-white border-t border-gray-200 sm:px-3">
                    <input wire:model.debounce.200ms="search" type="search" placeholder="Buscar"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

        </form>

        @if (count($nuevosIngresos))
            <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">

                @foreach ($nuevosIngresos as $nI)
                    @if ($userLogin == $nI->areaRd || $userLogin == NULL)

                        <div class="flex flex-col justify-center max-w-xs p-4 rounded-xl sm:px-8 border-2 border-light-gray-500 border-opacity-100 
                        transition duration-500 ease-in-out hover:shadow-xl transform hover:-translate-y-1 hover:scale-10">
                            <div class="block relative">
                                <img src="{{ Storage::url($nI->foto) }}" alt="Profile face"
                                    class="p-1 w-20 h-20 mx-auto rounded-full object-cover" loading="lazy">
                                <span
                                    class="absolute w-3 border-2 left-1/2 -bottom-1 transform -translate-x-1/2 border-white h-3 
                                        @if ($nI->status == 0)
                                        bg-gray-500 animate-bounce
                                        @elseif($nI->status == 1)
                                            bg-yellow-500
                                        @elseif($nI->status == 2)
                                            bg-green-500
                                        @elseif($nI->status == 3)
                                            animate-pulse bg-red-500
                                        @endif
                                        rounded-full">
                                </span>
                            </div>

                            <div class="space-y-4 text-center divide-y divide-coolGray-700">
                                <div class="my-2 space-y-1">
                                    <h2 class="text-sm font-semibold sm:text-sm">
                                        @if ($nI->nombre_2 == '')
                                            {{ $nI->nombre_1 . ' ' . $nI->ap_paterno . ' ' . $nI->ap_materno }}
                                        @else
                                            {{ $nI->nombre_1 . ' ' . $nI->nombre_2 . ' ' . $nI->ap_paterno . ' ' . $nI->ap_materno }}
                                        @endif
                                    </h2>
                                    <p class="sm:text-xs md:text-xs lg:text-xs xl:text-xs">
                                        {{ $nI->curp }}
                                    </p>
                                       
                                    <button type="button" class="px-8 py-3 rounded-full text-gray-600" wire:click="showInfo({{ $nI->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex justify-center pt-2 space-x-4 align-center">
                                    <a href="whatsapp://send?phone=+521{{ $nI->tel_movil }}" target="_blank" aria-label="Dribble" class="p-2 rounded-md text-gray-500">
                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 fill-current">
                                            <path xmlns="http://www.w3.org/2000/svg" d="M8.002 0h-.004C3.587 0 0 3.588 0 8a7.94 7.94 0 0 0 1.523 4.689l-.997 2.972 3.075-.983A7.93 7.93 0 0 0 8.002 16C12.413 16 16 12.411 16 8s-3.587-8-7.998-8zm4.655 11.297c-.193.545-.959.997-1.57 1.129-.418.089-.964.16-2.802-.602-2.351-.974-3.865-3.363-3.983-3.518-.113-.155-.95-1.265-.95-2.413s.583-1.707.818-1.947c.193-.197.512-.287.818-.287.099 0 .188.005.268.009.235.01.353.024.508.395.193.465.663 1.613.719 1.731.057.118.114.278.034.433-.075.16-.141.231-.259.367-.118.136-.23.24-.348.386-.108.127-.23.263-.094.498.136.23.606.997 1.298 1.613.893.795 1.617 1.049 1.876 1.157.193.08.423.061.564-.089.179-.193.4-.513.625-.828.16-.226.362-.254.574-.174.216.075 1.359.64 1.594.757.235.118.39.174.447.273.056.099.056.564-.137 1.11z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="tel:+521{{ $nI->tel_movil }}" aria-label="Telephone"
                                        class="p-2 rounded-md text-gray-500">
                                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 fill-current">
                                            <path
                                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                    </a>
                                    <a href="mailto:{{ $nI->correo }}" aria-label="Email" class="p-2 rounded-md text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                          </svg>
                                    </a>
                                    @if ($userLogin == 5 && ($nI->status == 1 || $nI->status == 3))
                                        <a href="mailto:{{ $nI->correo }}?subject=Actualización%20de%20documentos&body=Link de acceso para actualizar los documentos:%20https://toolkit.factoraguila.com/actualizar/nuevo-ingreso/{{$nI->id}}" aria-label="Email"
                                            class="p-2 rounded-md text-gray-500 transform rotate-45">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @elseif($userLogin == 3 && $nI->status ==2)
                                        <a wire:click="descargarZip({{$nI->id}})"
                                            class="p-2 rounded-md text-gray-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v4m0 0l-2-2m2 2l2-2" />
                                            </svg>
                                        </a>
                                    @endif

                                    
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach

            </div>
        @else
            {{-- Error search --}}
            <div class="grid xs:grid-cols-1 sm:grid-cols-1 px-4 py-3 bg-white border-t border-gray-200 sm:px-6 text-center justify-center object-center">
                <h6 class="text-center text-gray-500">No se encontró a ningún campo que coincida con:
                    "{{ $search }}"</h6>
            </div>
        @endif
        {{-- Pagination --}}
        <div class="grid xs:grid-cols-1 sm:grid-cols-1 bg-white border-t border-gray-200 sm:px-6">
            {{ $nuevosIngresos->links() }}
        </div>
    </section>

</div>
