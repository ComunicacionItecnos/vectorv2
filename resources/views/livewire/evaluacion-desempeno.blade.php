<div class="p-4">
    <p class="text-center text-3xl font-bold text-red-800">
        Evaluación de desempeño
    </p>
    <p class="text-center mb-28 text-xl font-normal text-gray-500">
        Resultados 
        <svg class="inline-block w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
            <path
                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
            </path>
        </svg>
    </p>
    <div class="flex items-center space-y-24 md:space-y-0 flex-col {{-- md:flex-row --}} justify evenly">
        <div class="p-4 relative">
            <div class="text-center mb-4 absolute -top-16 right-1/2 transform translate-x-1/2">
                <a href="#" class="block relative">
                    <img alt="profil" src="{{ $fotoRandom }}" class="mx-auto object-cover rounded-lg h-40 w-40  border-2 border-white dark:border-gray-800"
                    loading="lazy"/>
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

                <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 {{-- items-center --}} space-x-8 justify-center text-center">
                    
                    <div>
                        <p class="text-xl font-semibold leading-snug">90%</p>
                        <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación</p>
                    </div>
                    <div>
                        <p class="text-xl font-semibold leading-snug">95%</p>
                        <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación 270</p>
                    </div>

                </div>

                <div class="pt-2 pb-2 flex w-full mx-auto text-gray-300 {{-- items-center --}} justify-center  text-center">
                    
                    <div>
                        <p class="text-xl font-semibold leading-snug">90%</p>
                        <p class="font-semibold leading-snug" style="font-size: 10px;">total</p>
                    </div>

                </div>


                <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 justify-center text-center border-t border-gray-200">

                    <p class="text-xl text-gray-500 dark:text-gray-200 font-light">
                        NINEBOX

                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                            <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                          </svg>

                    </p>
                
                </div>

                <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 justify-center text-center">

                    <div class="flex-1 h-16 box-border border-red-600">
                        h1
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
