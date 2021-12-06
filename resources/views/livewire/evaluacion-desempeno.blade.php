<div class="py-2">
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
    <div class="flex items-center space-y-24 md:space-y-0 flex-col {{-- md:flex-row --}} {{-- justify-center --}}">
        <div class="p-4 relative">
            <div class="text-center mb-4 absolute -top-16 right-1/2 transform translate-x-1/2">
                <a href="#" class="block relative">
                    <img alt="profil" src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png" class="mx-auto object-cover rounded-lg h-40 w-40  border-2 border-white dark:border-gray-800" loading="lazy" />
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

                {{-- Director --}}
                @if ($puesto == 'Director')

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $climaValor }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Clima</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resFinanciero }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Res.Financiero</p>
                        </div>

                    </div>

                    <div
                        class="pt-2 pb-2 flex w-full mx-auto text-gray-500 {{-- items-center --}} space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacionValor }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $valor270 }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación 270</p>
                        </div>

                    </div>

                    <div
                        class="pt-2 pb-2 flex w-full mx-auto text-gray-300 {{-- items-center --}} justify-center  text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resDesempeno }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">total</p>
                        </div>

                    </div>


                @elseif($puesto == 'Gerente')

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $climaValor }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Clima</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resFinanciero }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Auto evaluación</p>
                        </div>

                    </div>

                    <div
                        class="pt-2 pb-2 flex w-full mx-auto text-gray-500 {{-- items-center --}} space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacionValor }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $valor270 }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación 270</p>
                        </div>

                    </div>

                    <div
                        class="pt-2 pb-2 flex w-full mx-auto text-gray-300 {{-- items-center --}} justify-center  text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resDesempeno }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">total</p>
                        </div>

                    </div>

                @else

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $climaValor }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Clima</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resFinanciero }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Auto evaluación</p>
                        </div>

                    </div>

                    <div
                        class="pt-2 pb-2 flex w-full mx-auto text-gray-500 {{-- items-center --}} space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacionValor }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación</p>
                        </div>

                    </div>

                    <div
                        class="pt-2 pb-2 flex w-full mx-auto text-gray-300 {{-- items-center --}} justify-center  text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resDesempeno }}%</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">total</p>
                        </div>

                    </div>

                @endif

                <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 justify-center text-center border-t border-gray-200">

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
                        @if ($box1 == null)
                            <br><br>
                        @else
                            {!! $box1 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-green-600 box-border border-2 border-gray-800">
                        @if ($box2 == null)
                            <br><br>
                        @else
                            {!! $box2 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-green-600 box-border border-2 border-gray-800">
                        @if ($box3 == null)
                            <br><br>
                        @else
                            {!! $box3 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-red-600 box-border border-2 border-gray-800">
                        @if ($box4 == null)
                            <br><br>
                        @else
                            {!! $box4 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-yellow-600 box-border border-2 border-gray-800">
                        @if ($box5 == null)
                            <br><br>
                        @else
                            {!! $box5 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-green-600 box-border border-2 border-gray-800">
                        @if ($box6 == null)
                            <br><br>
                        @else
                            {!! $box6 !!}
                        @endif

                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-red-600 box-border border-2 border-gray-800">
                        @if ($box7 == null)
                            <br><br>
                        @else
                            {!! $box7 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-red-600 box-border border-2 border-gray-800">
                        @if ($box8 == null)
                            <br><br>
                        @else
                            {!! $box8 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md bg-yellow-600 box-border border-2 border-gray-800">
                        @if ($box9 == null)
                            <br><br>
                        @else
                            {!! $box9 !!}
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Accordion 2 start -->
    <div class="flex justify-center">
        <div>
            <div class="px-10 py-12 space-y-4 bg-gray-100 shadow-xl">
                <h3 class="text-2xl font-bold">Más iformación</h3>
                <div class="flex justify-between p-2 bg-white divide-x-2">
                    <button type="button" onclick="abrir()">
                        <p class="text-lg text-center">Alto desempeño / Potencial medio</p>
                        <span class="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </button>

                </div>
                <div class="p-2 border-l-4 border-black border-red-400 bg-green-50 hidden" id="foo">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.lorem </p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.lorem </p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.lorem </p>
                </div>

            </div>
        </div>
    </div>

    <script>
        function abrir() {
            acordion = document.getElementById("foo");

            var acordionValor = acordion.classList;
            var arrayAcordion = Array.from(acordionValor);
            var buscarHidden = arrayAcordion.includes('hidden');

            if (buscarHidden == true) {
                acordion.classList.remove('hidden');
            } else {
                acordion.classList.add('hidden');
            }
        }
    </script>
    <!-- Accordion 2 end -->

</div>
