{{-- Funciona con jquery --}}
{{-- <div class="py-10 grid max-w-5xl grid-cols-1 px-6 mx-auto lg:px-8 md:grid-cols">

    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4 bg-white shadow-lg rounded-xl  page__style perfil fixed w-2/3">
        
        <header class="flex items-center justify-between">
            <h2 class="text-lg leading-6 font-medium text-black">Candidatos</h2>
        </header>
        <form class="relative">
            <svg width="20" height="20" fill="currentColor"
                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
             </svg>
            <input
                class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10"
                type="text" aria-label="Filter projects" placeholder="Filter projects" />
        </form>

        <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4  page__description">

            <div class="scaled flex flex-col justify-center max-w-xs p-4 shadow-md rounded-xl sm:px-8 dark:bg-coolGray-900 dark:text-coolGray-100 bg-gray-600 hover:bg-blue-500 hover:border-transparent 
                hover:shadow-lg group  perfil">

                <button class="btn_nav home_link">regresar</button>
                    
            </div>

        </div>

    </section>

    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4 bg-white shadow-lg rounded-xl  page__style fixed w-2/3">
        <header class="flex items-center justify-between">
            <h2 class="text-lg leading-6 font-medium text-black">Candidatos</h2>
        </header>
        <form class="relative">
            <svg width="20" height="20" fill="currentColor"
                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
             </svg>
            <input
                class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10"
                type="text" aria-label="Filter projects" placeholder="Filter projects" />
        </form>

        <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4  page__description">

            @foreach ($nuevosIngresos as $nI)

                <div class="scaled flex flex-col justify-center max-w-xs p-4 shadow-md rounded-xl sm:px-8 dark:bg-coolGray-900 dark:text-coolGray-100 bg-gray-600 hover:bg-blue-500 hover:border-transparent 
                hover:shadow-lg group  home">

                    <div class="block relative  btn_nav perfil_link">
                        <img src="{{ Storage::url($nI->foto) }}" alt="Profile face"
                            class="p-1 w-20 h-20 mx-auto rounded-full  object-cover">
                        <span class="absolute w-3 border-2 left-1/2 -bottom-1 transform -translate-x-1/2 border-white h-3 bg-green-500 rounded-full">
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
                            <p id="curp" class="sm:text-xs md:text-xs lg:text-xs xl:text-xs dark:text-coolGray-400">{{ $nI->curp }}</p>
                        </div>
                        <div class="flex justify-center pt-2 space-x-4 align-center">
                            <a href="whatsapp://send?phone=+521{{ $nI->tel_movil }}" target="_blank"
                                aria-label="Dribble"
                                class="p-2 rounded-md dark:text-coolGray-100 hover:dark:text-violet-400">
                                <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 fill-current">
                                    <path
                                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                                    </path>
                                </svg>
                            </a>
                            <a href="tel:+521{{ $nI->tel_movil }}" aria-label="Telephone"
                                class="p-2 rounded-md dark:text-coolGray-100 hover:dark:text-violet-400">
                                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 fill-current">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </a>
                            <a href="mailto:{{ $nI->correo }}" aria-label="Email"
                                class="p-2 rounded-md dark:text-coolGray-100 hover:dark:text-violet-400">
                                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 fill-current">
                                    <path
                                        d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </section>
    
    
</div> --}}

<div class="py-10 grid max-w-5xl grid-cols-1 px-6 mx-auto lg:px-8 md:grid-cols">

    <section
        class="sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4 bg-white shadow-lg rounded-xl  page__style perfil">
        @if ($candidatoDoc == [])
            <p>Sin candidato</p>
        @else
            <section class="p-6 dark:bg-coolGray-800 dark:text-coolGray-50">
                <form novalidate="" action=""
                    class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">

                    {{-- Credencial --}}
                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-coolGray-900">
                        <div class="space-y-2 col-span-full lg:col-span-1">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current text-red-400"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>

                            <p class="text-base">
                                Documento de identidad
                            </p>
                        </div>
                        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                            <div class="block relative col-span-full sm:col-span-6">
                                <img src="{{ Storage::url($candidatoDoc[0]->foto) }}" alt="Profile face"
                                    class="p-1 w-20 h-20 mx-auto rounded-full  object-cover">
                                <span
                                    class="absolute w-3 border-2 left-1/2 -bottom-1 transform -translate-x-1/2 border-white h-3 bg-green-500 rounded-full">
                                </span>
                            </div>

                            @if ($candidatoDoc[0]->nombre_2 == '')
                                <div class="col-span-full sm:col-span-3">
                                    <label for="firstname" class="text-sm">Primer nombre</label>
                                    <input id="firstname" type="text" placeholder="First name"
                                        class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                        value="{{ $candidatoDoc[0]->nombre_1 }}" disabled>
                                </div>
                            @else
                                <div class="col-span-full sm:col-span-3">
                                    <label for="firstname" class="text-sm">Primer nombre</label>
                                    <input id="firstname" type="text" placeholder="First name"
                                        class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                        value="{{ $candidatoDoc[0]->nombre_1 }}" disabled>
                                </div>
                                <div class="col-span-full sm:col-span-3">
                                    <label for="lastname" class="text-sm">Segundo nombre</label>
                                    <input id="lastname" type="text" placeholder="Last name"
                                        class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                        value="{{ $candidatoDoc[0]->nombre_2 }}" disabled>
                                </div>
                            @endif

                            <div class="col-span-full sm:col-span-3">
                                <label for="email" class="text-sm">Apellido paterno</label>
                                <input id="email" type="email" placeholder="Email"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    value="{{ $candidatoDoc[0]->ap_paterno }}" disabled>
                            </div>
                            <div class="col-span-full sm:col-span-3">
                                <label for="address" class="text-sm">Apellido materno</label>
                                <input id="address" type="text" placeholder=""
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-coolGray-700 dark:text-coolGray-900"
                                    value="{{ $candidatoDoc[0]->ap_materno }}" disabled>
                            </div>
                            <div class="col-span-full sm:col-span-4 text-center object-center justify-center">
                                <label for="city" class="text-sm">Credencial INE</label>
                                <a href="{{ Storage::url($candidatoDoc[0]->credencialIFE) }}" target="_blank"
                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-white uppercase bg-blue-500 border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-white hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                {{-- <embed src="{{ Storage::url($candidatoDoc->credencialIFE) }}" type="application/pdf" width="100%"> --}}
                            </div>

                            <div class="col-span-full sm:col-span-2">

                                <label for="city" class="text-sm">¿Datos correctos?</label>

                                <div class="flex items-center gap-8">
                                    <label class="inline-flex items-center">
                                        <input type="radio"  name="vehicle" class="h-5 w-5 text-red-600" wire:model="curpValue" wire:click="curpToogle" value="0"/>
                                        <span class="ml-2 text-gray-700">
                                            No
                                        </span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio"  name="vehicle" class="h-5 w-5 text-red-600" wire:model="curpValue" wire:click="curpToogle" value="1"/>
                                        <span class="ml-2 text-gray-700">
                                            Si
                                        </span>
                                    </label>
                                </div>

                            </div>

                            <div class="col-span-full sm:col-span-6  @if ($curpValue == 0) hidden @else @endif">
                                <label for="observacionCurp" class="text-sm">Observaciones</label>
                                <textarea id="observacionCurp" wire:model="observacionCurp" type="text"
                                    class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400 dark:border-coolGray-700 dark:text-coolGray-900"></textarea>
                            </div>



                        </div>
                    </fieldset>
                   

                </form>
            </section>
        @endif


    </section>

    <section
        class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4 bg-white shadow-lg rounded-xl  page__style hidden">
        <header class="flex items-center justify-between">
            <h2 class="text-lg leading-6 font-medium text-black">Candidatos</h2>
        </header>
        <form class="relative">
            <svg width="20" height="20" fill="currentColor"
                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
            </svg>
            <input
                class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10"
                type="text" aria-label="Filter projects" placeholder="Filter projects" />
        </form>

        <div
            class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4  page__description">

            @foreach ($nuevosIngresos as $nI)

                <div class="scaled flex flex-col justify-center max-w-xs p-4 shadow-md rounded-xl sm:px-8 dark:bg-coolGray-900 dark:text-coolGray-100 bg-gray-600 hover:bg-blue-500 hover:border-transparent 
                hover:shadow-lg group  home">

                    <div class="block relative  btn_nav perfil_link">
                        <img src="{{ Storage::url($nI->foto) }}" alt="Profile face"
                            class="p-1 w-20 h-20 mx-auto rounded-full  object-cover">
                        <span
                            class="absolute w-3 border-2 left-1/2 -bottom-1 transform -translate-x-1/2 border-white h-3 bg-green-500 rounded-full">
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
                            <p id="curp" class="sm:text-xs md:text-xs lg:text-xs xl:text-xs dark:text-coolGray-400">
                                {{ $nI->curp }}</p>
                        </div>
                        <div class="flex justify-center pt-2 space-x-4 align-center">
                            <a href="whatsapp://send?phone=+521{{ $nI->tel_movil }}" target="_blank"
                                aria-label="Dribble"
                                class="p-2 rounded-md dark:text-coolGray-100 hover:dark:text-violet-400">
                                <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 fill-current">
                                    <path
                                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                                    </path>
                                </svg>
                            </a>
                            <a href="tel:+521{{ $nI->tel_movil }}" aria-label="Telephone"
                                class="p-2 rounded-md dark:text-coolGray-100 hover:dark:text-violet-400">
                                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 fill-current">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </a>
                            <a href="mailto:{{ $nI->correo }}" aria-label="Email"
                                class="p-2 rounded-md dark:text-coolGray-100 hover:dark:text-violet-400">
                                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 fill-current">
                                    <path
                                        d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </section>

</div>



<style>
    /* <-| Animación de las cards |-> */
    .scaled {
        transition: all .2s ease-in-out;
    }

    .scaled:hover {
        transform: scale(1.02);
    }

    .animate_content {
        animation: animate 3s ease;
    }

    .fadeIn {
        z-index: 10;
    }

    /*****************************************************************
        ~ Mobile media-queries (max-width: 767px)
    ******************************************************************/
    @media only screen and (max-width: 767px) {
        .page__description h1 {
            margin-top: 100px;
        }
    }

    @-moz-keyframes animate {
        10% {
            transform: scale(1, 0.002);
        }

        35% {
            transform: scale(0.2, 0.002);
            opacity: 1;
        }

        50% {
            transform: scale(0.2, 0.002);
            opacity: 0;
        }

        85% {
            transform: scale(1, 0.002);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
        }
    }

    @-webkit-keyframes animate {
        10% {
            transform: scale(1, 0.002);
        }

        35% {
            transform: scale(0.2, 0.002);
            opacity: 1;
        }

        50% {
            transform: scale(0.2, 0.002);
            opacity: 0;
        }

        85% {
            transform: scale(1, 0.002);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
        }
    }

    @-o-keyframes animate {
        10% {
            transform: scale(1, 0.002);
        }

        35% {
            transform: scale(0.2, 0.002);
            opacity: 1;
        }

        50% {
            transform: scale(0.2, 0.002);
            opacity: 0;
        }

        85% {
            transform: scale(1, 0.002);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
        }
    }

    @keyframes animate {
        10% {
            transform: scale(1, 0.002);
        }

        35% {
            transform: scale(0.2, 0.002);
            opacity: 1;
        }

        50% {
            transform: scale(0.2, 0.002);
            opacity: 0;
        }

        85% {
            transform: scale(1, 0.002);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
        }
    }

</style>



{{-- <script>
    $('.btn_nav').click(function() {
        // animate content
        $('.page__style').addClass('animate_content');
        $('.page__description').fadeOut(100).delay(2800).fadeIn();

        setTimeout(function() {
            $('.page__style').removeClass('animate_content');
        }, 3200);

        //remove fadeIn class after 1500ms
        setTimeout(function() {
            $('.page__style').removeClass('fadeIn');
        }, 1500);

    });

    // on click show page after 1500ms
    $('.perfil_link').click(function() {

        $('.home').addClass('hidden');
        $('.perfil').addClass('hidden');

        setTimeout(function() {
            $('.perfil').addClass('fadeIn');

        }, 1500);
        $('.perfil').removeClass('hidden');

    });

    $('.home_link').click(function() {

        $('.perfil').addClass('hidden');
        $('.home').addClass('hidden');

        setTimeout(function() {
            $('.home').addClass('fadeIn');

        }, 1500);
        $('.home').removeClass('hidden');

    });
</script> --}}


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
