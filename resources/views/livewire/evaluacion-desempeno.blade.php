<div class="p-4">
    <p class="text-center text-3xl font-bold text-red-800">
        Evaluación de desempeño
    </p>
    <p class="text-center mb-28 text-xl font-normal text-gray-500">
        Resultados
        <svg class="inline-block w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            stroke="currentColor" viewBox="0 0 24 24">
            <path
                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
            </path>
        </svg>
    </p>
    <div class="flex items-center space-y-24 md:space-y-0 flex-col {{-- md:flex-row --}} justify evenly">
        <div class="p-4 relative">
            <div class="text-center mb-4 absolute -top-16 right-1/2 transform translate-x-1/2">
                <a href="#" class="block relative">
                    <img alt="profil" src="{{ $fotoRandom }}"
                        class="mx-auto object-cover rounded-lg h-40 w-40  border-2 border-white dark:border-gray-800"
                        loading="lazy" />
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow px-8 py-4 pt-24">
                <div class="text-center">
                    <p class="text-2xl text-gray-800 dark:text-white mr-2">
                        Hola ¡{{ $nombre }}!
                    </p>
                    <p class="text-xl text-gray-500 dark:text-gray-200 font-light">
                        Estos son tus resultados:
                    </p>
                </div>

                <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                    <div>
                        <p class="text-xl font-semibold leading-snug">90%</p>
                        <p class="font-semibold leading-snug" style="font-size: 10px;">Clima</p>
                    </div>
                    <div>
                        <p class="text-xl font-semibold leading-snug">95%</p>
                        <p class="font-semibold leading-snug" style="font-size: 10px;">Res.Financiero</p>
                    </div>

                </div>

                <div
                    class="pt-2 pb-2 flex w-full mx-auto text-gray-500 {{-- items-center --}} space-x-8 justify-center text-center">

                    <div>
                        <p class="text-xl font-semibold leading-snug">90%</p>
                        <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación</p>
                    </div>
                    <div>
                        <p class="text-xl font-semibold leading-snug">95%</p>
                        <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación 270</p>
                    </div>

                </div>

                <div
                    class="pt-2 pb-2 flex w-full mx-auto text-gray-300 {{-- items-center --}} justify-center  text-center">

                    <div>
                        <p class="text-xl font-semibold leading-snug">90%</p>
                        <p class="font-semibold leading-snug" style="font-size: 10px;">total</p>
                    </div>

                </div>


                <div
                    class="pt-2 pb-2 flex w-full mx-auto text-gray-500 justify-center text-center border-t border-gray-200">

                    <p class="text-xl text-gray-500 dark:text-gray-200 font-light">
                        NINEBOX

                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                            <path fill-rule="evenodd"
                                d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>

                    </p>

                </div>


                <div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-2 lg:-mx-2 xl:-mx-2 items-center text-white">

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-yellow-600 box-border border-2 border-gray-800">
                        <br><br>
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-green-600 box-border border-2 border-gray-800">
                        <br><br>
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-green-600 box-border border-2 border-gray-800">
                        <br><br>
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-red-600 box-border border-2 border-gray-800">
                        <br><br>
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-yellow-600 box-border border-2 border-gray-800">
                        <br><br>
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-green-600
                         box-border border-2 border-gray-800">
                        {{-- <br><br> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                clip-rule="evenodd" />
                        </svg>
                        {{-- <br> --}}
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-red-600 box-border border-2 border-gray-800">
                        <br><br>
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-red-600 box-border border-2 border-gray-800">
                        <br><br>
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-yellow-600 box-border border-2 border-gray-800">
                        <br><br>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
