<div class="py-3 bg-white">
    <p class="text-center text-3xl font-bold text-red-800">
        Evaluación de desempeño
    </p>
    <p class="text-center mb-28 text-xl font-normal text-gray-500">
        Resultados
        <svg class="inline-block w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            stroke="currentColor" viewBox="0 0 24 24">
            <path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
            </path>
        </svg>
    </p>
    <div class="flex items-center space-y-24 md:space-y-0 flex-col">
        <div class="p-4 relative">
            <div class="text-center mb-4 absolute -top-16 right-1/2 transform translate-x-1/2">
                <a class="block relative">
                    @if (file_exists(public_path('storage/'.$foto)))
                        <img class="mx-auto object-cover rounded-lg h-40 w-40  border-2" style="border-color: #E9F0F2;" loading="lazy" src="{{ asset('storage') .'/'. $foto }}" alt="Foto">
                    @else
                        <img class="mx-auto object-cover rounded-lg h-40 w-40  border-2" style="border-color: #E9F0F2;" loading="lazy" src="{{ asset('images/user_toolkit.jpg') }}" alt="Foto">
                    @endif
                </a>
            </div>
            <div class="rounded-lg shadow px-8 py-4 pt-24" style="background-color: #E9F0F2;">
                <div class="text-center">
                    <p class="text-2xl text-gray-800 mr-2">
                        Hola ¡{{ $nombre }}!
                    </p>
                    <p class="text-xl text-gray-500 font-light">
                        Estos son tus resultados:
                    </p>
                </div>

                {{-- Director --}}
                @if ($puesto == 'Director')
                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $climaForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Clima laboral</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resFinancieroForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Resultado financiero</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de jefe directo</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacion_270Form }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de compañeros</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $autoevaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Autoevaluación</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-700 justify-center  text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resDesempeno }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Final</p>
                        </div>

                    </div>
                @elseif($puesto == 'Director_270')

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $climaForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Clima laboral</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resFinancieroForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Resultado financiero</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de jefe directo</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacion_270Form }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de compañeros</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $autoevaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Autoevaluación</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-700 justify-center  text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacion_270Form }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Final</p>
                        </div>

                    </div>

                @elseif($puesto == 'Gerente')
                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $climaForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Clima laboral</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resFinancieroForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Resultado financiero</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de jefe directo</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacion_270Form }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de compañero</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $autoevaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Autoevaluación</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-700 justify-center  text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resDesempeno }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Final</p>
                        </div>

                    </div>
                @elseif($puesto == 'Gerente_270')
                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $climaForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Clima laboral</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resFinancieroForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Resultado financiero</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de jefe directo</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacion_270Form }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de compañero</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $autoevaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Autoevaluación</p>
                        </div>

                    </div>

                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-700 justify-center  text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resDesempeno }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Final</p>
                        </div>

                    </div>
                @else
                    <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-10 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $climaForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Clima laboral</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $autoevaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Autoevaluación</p>
                        </div>

                    </div>

                    <div
                        class="pt-2 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $evaluacionForm }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Evaluación de jefe directo</p>
                        </div>

                    </div>

                    <div
                        class="pt-2 pb-2 flex w-full mx-auto text-gray-700 justify-center  text-center">

                        <div>
                            <p class="text-xl font-semibold leading-snug">{{ $resDesempeno }}</p>
                            <p class="font-semibold leading-snug" style="font-size: 10px;">Final</p>
                        </div>

                    </div>
                @endif

                {{-- NINEBOX --}}
                <div class="pt-2 pb-2 flex w-full mx-auto text-gray-500 justify-center text-center border-t border-gray-400 @if($puesto == 'Director_270' || $puesto == 'Gerente_270') hidden @endif">

                    <p class="text-xl text-gray-500 font-light">
                        Tu ubicación en 9 Box:
                    </p>

                </div>
                {{-- NINEBOX --}}
                <div class="pb-2 flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-2 lg:-mx-2 xl:-mx-2 items-center text-white @if($puesto == 'Director_270' || $puesto == 'Gerente_270') hidden @endif">

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md
                        @if ($box1 == null)
                            bg-yellow-100
                        @else
                            bg-yellow-400
                        @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box1 == null)
                            <br><br><br>
                        @else
                            {!! $box1 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md 
                    @if ($box2 == null)
                        bg-green-100
                    @else
                        bg-green-500
                    @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box2 == null)
                            <br><br><br>
                        @else
                            {!! $box2 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md
                    @if ($box3 == null)
                        bg-green-200
                    @else
                        bg-green-700
                    @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box3 == null)
                            <br><br><br>
                        @else
                            {!! $box3 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md 
                    @if ($box4 == null)
                        bg-red-100
                    @else
                        bg-red-500
                    @endif  box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box4 == null)
                            <br><br><br>
                        @else
                            {!! $box4 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md 
                    @if ($box5 == null)
                        bg-yellow-100
                    @else
                        bg-yellow-400
                    @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box5 == null)
                            <br><br><br>
                        @else
                            {!! $box5 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md 
                    @if ($box6 == null)
                        bg-green-100
                    @else
                        bg-green-400
                    @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box6 == null)
                            <br><br><br>
                        @else
                            {!! $box6 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md 
                    @if ($box7 == null)
                        bg-red-200
                    @else
                        bg-red-700
                    @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box7 == null)
                            <br><br><br>
                        @else
                            {!! $box7 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md 
                    @if ($box8 == null)
                        bg-red-100
                    @else
                        bg-red-500
                    @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box8 == null)
                            <br><br><br>
                        @else
                            {!! $box8 !!}
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md 
                    @if ($box9 == null)
                        bg-yellow-100
                    @else
                        bg-yellow-400
                    @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box9 == null)
                            <br><br><br>
                        @else
                            {!! $box9 !!}
                        @endif
                    </div>

                </div>

                {{-- Mensaje para mostrar el porcentaje del aumento --}}
                <div class="pt-4 pb-2 flex w-full mx-auto text-gray-500 justify-center text-center border-t border-gray-400 @if($puesto == 'Director_270' || $puesto == 'Gerente_270') hidden @endif">

                    @if ($puesto == 'Administrativo')
                        
                        @if ($resDesempeno <= 79.8)
                            <p class="text-xl text-gray-500 font-light">
                                Este año no eres acredor para un incremento salarial.
                            </p>
                        @elseif( ($resDesempeno >= 80 || $resDesemepno <=80.0 ) && ($resDesempeno <= 90 || $resDesempeno <= 90.0) )
                            {{-- Aqui solo se mostrara el porcentaje del incremento --}}
                            <p class="text-xl text-gray-500 font-light">
                                Este año eres acredor a un incremento del X% salarial.
                            </p>
                        @elseiF( ($resDesempeno >= 91 || $resDesempeno >= 91.0) && ($resDesempeno <= 95 || $resDesempeno <= 95.0) )
                            {{-- Aqui solo se mostrara el porcentaje del incremento+2 --}}
                            <p class="text-xl text-gray-500 font-light">
                                Este año eres acredor a un incremento del X+2% salarial.
                            </p>
                        @elseiF( ($resDesempeno >= 96 || $resDesempeno >= 96.0) && ($resDesempeno <= 100) )
                            {{-- Aqui solo se mostrara el porcentaje del incremento+3 --}}
                            <p class="text-xl text-gray-500 font-light">
                                Este año eres acredor a un incremento del X+3% salarial.
                            </p>
                        @endif

                    @else
  
                        <p class="text-xl text-gray-500 font-light">
                            Este año eres acredor a un bono del {{$resDesempeno}}%.
                        </p>
                        
                    @endif

                </div>

            </div>
        </div>
    </div>

    <!-- Accordion 2 start -->
    <div class="flex justify-center @if($puesto == 'Director_270' || $puesto == 'Gerente_270') hidden @endif">
        <div>
            <div class="px-10 py-2 space-y-4 shadow-xl"  style="background-color: #E9F0F2;">
                <h3 class="text-2xl text-gray-700 text-center">Más información</h3>
                <div class="flex justify-between p-2 bg-white divide-x-2">
                    <button type="button" onclick="abrir()">
                        <p class="text-xl text-center">
                            
                            @if ( ($resDesempeno >= 80 || $resDesempeno >= 80.0) && ($resDesempeno<= 82.5) )
                                Bajo desempeño / Alto potencial
                            @elseif ( ($resDesempeno >= 92.6) && ($resDesempeno<= 94.5) )
                                Medio desempeño / Alto potencial
                            @elseif ( ($resDesempeno >= 95 || $resDesempeno >=95.0) && ($resDesempeno<= 100) )
                               Alto desempeño / Alto potencial
                            @elseif ( ($resDesempeno >= 70 || $resDesempeno >=70.0) && ($resDesempeno<= 74.5) )
                               Bajo desempeño / Potencial medio 
                            @elseif ( ($resDesempeno >= 82.6) && ($resDesempeno<= 84.9) )
                               Desempeño medio / Potencial medio
                            @elseif ( ($resDesempeno >= 90 || $resDesempeno >=90.0) && ($resDesempeno<= 92.5) )
                               Alto desempeño / Potencial medio
                            @elseif ( $resDesempeno < 69 )
                               Bajo desempeño / Bajo potencial
                            @elseif ( ($resDesempeno >= 75 || $resDesempeno >= 75.0) && ($resDesempeno<= 79 || $resDesempeno <=79.9) )
                                Desempeño medio / Bajo potencial
                            @elseif ( ($resDesempeno >= 85 || $resDesempeno >= 85.0) && ($resDesempeno<= 89.9) )
                                Alto desempeño / Bajo potencial 
                            @endif

                        </p>
                        <span class="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </button>

                </div>
                <div class="p-2 border-l-4 border-black 
                @if ( ($resDesempeno >= 80 || $resDesempeno >=80.0) && ($resDesempeno<= 82.5) )
                    border-yellow-500
                @elseif ( ($resDesempeno >= 92.6) && ($resDesempeno<= 94.5) )
                    border-green-600
                @elseif ( ($resDesempeno >= 95 || $resDesempeno >=95.0) && ($resDesempeno<= 100) )
                    border-green-800
                @elseif ( ($resDesempeno >= 70 || $resDesempeno >=70.0) && ($resDesempeno<= 74.5) )
                    border-red-600
                @elseif ( ($resDesempeno >= 82.6) && ($resDesempeno<= 84.9) )
                    border-yellow-500
                @elseif ( ($resDesempeno >= 90 || $resDesempeno >=90.0) && ($resDesempeno<= 92.5) )
                    border-green-600
                @elseif ( $resDesempeno < 69 )
                    border-red-800
                @elseif ( ($resDesempeno >= 75 || $resDesempeno >= 75.0) && ($resDesempeno<= 79 || $resDesempeno <=79.9) )
                    border-red-600
                @elseif ( ($resDesempeno >= 85 || $resDesempeno >= 85.0) && ($resDesempeno<= 89.9) )
                    border-yellow-500
                @endif bg-white hidden" id="foo">

                    @if ( ($resDesempeno >= 80) && ($resDesempeno<= 82.5) )
                        <p>
                            Tienes potencial para mejorar tu desempeño con una gran capacidad para moverte lateralmente entre las funciones del negocio a fin de avanzar, 
                            a su vez, tienes un alto nivel de madurez y un fuerte compromiso con la empresa con potencial para crecer una posición hacia arriba.
                        </p>
                    @elseif ( ($resDesempeno >= 92.6) && ($resDesempeno<= 94.5) )
                        <p>
                            Cumples y ocasionalmente excedes los objetivos, tienes una gran capacidad de dirigir proyectos organizacionales, 
                            además, cuentas con la destreza para transferir habilidades y conocimientos con potencial para crecer una posición hacia arriba.
                        </p>
                    @elseif ( ($resDesempeno >= 95) && ($resDesempeno<= 100) )
                        <p>
                            Tienes excelentes resultados en la obtención de tus objetivos organizacionales, 
                            además estas dispuesto a moverte lateralmente entre las funciones del negocio a fin de avanzar y eres un modelo a seguir para la organización.
                        </p>
                    @elseif ( ($resDesempeno >= 70) && ($resDesempeno<= 74.5) )
                        <p>
                            Tienes potencial para moverte lateralmente entre las funciones del negocio a fin de avanzar, 
                            muy constantemente muestras habilidades y competencias requeridas para tu rol, a veces no cumples con los resultados definidos y esperados, 
                            pero sabes reconocer emociones y sentimientos propios y de los demás, así como su impacto.
                        </p>
                    @elseif ( ($resDesempeno >= 82.6) && ($resDesempeno<= 84.9) )
                        <p>
                            Constantemente cumples los objetivos definidos por la organización demostrando que tienes un compromiso con la empresa y tu equipo.
                        </p>
                        <p>
                            Además, tienes potencial para moverte dentro del negocio para adaptarte al rol que se te asigne con el fin de desarrollarte y crecer como un futuro líder, 
                            sólo necesitas un poco de guía y orientación.
                        </p>
                    @elseif ( ($resDesempeno >= 90) && ($resDesempeno<= 92.5) )
                        <p>
                            Excedes tus resultados asignados mientras modelas la cultura organizacional tomando el liderazgo de varios proyectos con ayuda de la mejora continua y actualizando a mejores prácticas, 
                            esto demuestra que tienes el potencial para moverte alrededor de la organización siempre y cuando mantengas el alto desempeño.
                        </p>
                        <p>
                            Tienes potencial para convertirte en un líder en desempeño y tener la posibilidad de crecer una posición hacia arriba.
                        </p>
                    @elseif ( $resDesempeno < 69 )
                        <p>
                            No vives los valores Aguila, tienes una brecha significativa en tus competencias, demostrando falta de habilidad, madurez emocional, agilidad en el aprendizaje, 
                            pasión por el negocio, deseo de tomar e incrementar tus responsabilidades y roles asignados.
                        </p>
                    @elseif ( ($resDesempeno >= 75) && ($resDesempeno<= 79) )
                        <p>
                            Cumples con los objetivos de acuerdo con las competencias y valores de Aguila, pero a su vez demuestras una falta de madurez emocional, 
                            agilidad en el aprendizaje, pasión por el negocio y la habilidad y deseo de tomar o incrementar tus responsabilidades y roles.
                        </p>
                    @elseif ( ($resDesempeno >= 85) && ($resDesempeno<= 89.9) )
                        <p>
                            Cumples tus objetivos de una manera sobresaliente, pero te hace falta madurez emocional, agilidad en el aprendizaje, 
                            habilidad y deseo de tomar o incrementar tus responsabilidades y roles. 

                            Esto podría deberse a que el alcance de tu pasión se limita a tu área de competencia o experiencia.
                        </p>
                    @endif

                </div>

            </div>
        </div>
    </div>

    <script defer>
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