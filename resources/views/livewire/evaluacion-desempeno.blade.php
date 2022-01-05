<div class="py-3 bg-white" id="resultadoDesempenoPDF">
    
    <div class="relative mb-20">
        <img src="{{asset('images/nineBox/Resultados-Banner.png')}}" class="mx-auto object-cover" style="width:300px;height:auto;" loading="lazy">
    </div>

    <div class="flex items-center space-y-24 md:space-y-0 flex-col">

        <div class="p-3 pb-10 relative  max-w-lg">
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
                    <p class="text-2xl text-gray-800 mr-2 pt-2 pb-4 border-b border-gray-400">
                        Hola ¡{{ $nombre }}!
                    </p>
                    <p class="text-xl text-gray-500 pt-2 font-light">
                        Estos son tus resultados:
                    </p>
                </div>

                {{-- Director --}}
                @if ($puesto == 'Director')

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center font-bold border-b border-gray-400">

                        <div>

                            <div class="grid grid-cols-5">

                                <div class="col-start-1 col-span-2">
                                    <p class="text-xl font-semibold leading-snug text-gray-800" wire:click="modalClima(1)">{{ $climaForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;" wire:click="modalClima(1)">Clima laboral</p>
                                    <br>
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $evaluacionForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Evaluación de jefe directo</p>
                                </div>
                            
                                <div class="col-start-4 col-span-2">
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $resFinancieroForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Resultado financiero</p>
                                    <br>
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $evaluacion_270Form }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Evaluación de compañeros</p>
                                </div>
                            
                            </div>
                
                        </div>

                    </div>

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center border-b border-gray-400">

                        <div>

                            <div class="grid grid-cols-3">

                                <div class="col-span-2">
                                    <p class="font-semibold leading-snug text-base">Tu calificación para bono de desempeño es: </p>
                                </div>
                              
                                <div class="">
                                    <p class="text-xl font-semibold leading-snug text-blue-700">{{ $resDesempeno }}</p>
                                </div>
                              
                            </div>
                            <br>
                            <p class="leading-snug" style="font-size: 12px;">La calificación está integrada por el <b>resultado ponderado de clima laboral, la evaluación de tu jefe, la evaluación de tus compañeros y los resultados financieros de la empresa</b>. </p>
                        </div>

                    </div>

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>

                            <div class="grid grid-cols-3">

                                <div class="col-span-2">
                                    <p class="font-semibold leading-snug text-base ">Tu calificación de 9·BOX: </p>
                                </div>
                              
                                <div class="">
                                    <p class="text-xl font-semibold leading-snug text-blue-700">{{ $resDesempeno2 }}</p>
                                </div>
                              
                            </div>
                            <br>
                            <p class="leading-snug" style="font-size: 12px;">La calificación se integra por el <b>resultado ponderado de la evaluación de tu jefe</b>, la <b>evaluación de tus compañeros</b> y <b>clima laboral</b>. </p>
                        </div>

                    </div>

                @elseif($puesto == 'Director_270')

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center font-bold border-b border-gray-400">

                        <div>

                            <div class="grid grid-cols-5">

                                <div class="col-start-1 col-span-2">
                                    <p class="text-xl font-semibold leading-snug text-gray-800" wire:click="modalClima(1)">{{ $climaForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;" wire:click="modalClima(1)">Clima laboral</p>
                                    <br>
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $evaluacionForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Evaluación de jefe directo</p>
                                </div>
                            
                                <div class="col-start-4 col-span-2">
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $resFinancieroForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Resultado financiero</p>
                                    <br>
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $evaluacion_270Form }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Evaluación de compañeros</p>
                                </div>
                            
                            </div>
                
                        </div>

                    </div>

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center border-b border-gray-400">

                        <div>

                            <div class="grid grid-cols-3">

                                <div class="col-span-2">
                                    <p class="font-semibold leading-snug text-base">Tu calificación para bono de desempeño es: </p>
                                </div>
                            
                                <div class="">
                                    <p class="text-xl font-semibold leading-snug text-blue-700">{{ $resDesempeno }}</p>
                                </div>
                            
                            </div>
                            <br>
                            <p class="leading-snug" style="font-size: 12px;">La calificación está integrada por el <b>resultado ponderado de clima laboral, la evaluación de tu jefe, la evaluación de tus compañeros y los resultados financieros de la empresa</b>. </p>
                        </div>

                    </div>

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>

                            <div class="grid grid-cols-3">

                                <div class="col-span-2">
                                    <p class="font-semibold leading-snug text-base ">Tu calificación de 9·BOX: </p>
                                </div>
                            
                                <div class="">
                                    <p class="text-xl font-semibold leading-snug text-blue-700">{{ $resDesempeno2 }}</p>
                                </div>
                            
                            </div>
                            <br>
                            <p class="leading-snug" style="font-size: 12px;">La calificación se integra por el <b>resultado ponderado de la evaluación de tu jefe</b>, la <b>evaluación de tus compañeros</b> y <b>clima laboral</b>. </p>
                        </div>

                    </div>

                @elseif($puesto == 'Gerente')
                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center font-bold border-b border-gray-400">

                        <div>

                            <div class="grid grid-cols-5">

                                <div class="col-start-1 col-span-2">
                                    <p class="text-xl font-semibold leading-snug text-gray-800" wire:click="modalClima(1)">{{ $climaForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;" wire:click="modalClima(1)">Clima laboral</p>
                                    <br>
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $evaluacionForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Evaluación de jefe directo</p>
                                </div>
                            
                                <div class="col-start-4 col-span-2">
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $resFinancieroForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Resultado financiero</p>
                                    <br>
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $evaluacion_270Form }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Evaluación de compañeros</p>
                                </div>
                            
                            </div>
                
                        </div>

                    </div>

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center border-b border-gray-400">

                        <div>

                            <div class="grid grid-cols-3">

                                <div class="col-span-2">
                                    <p class="font-semibold leading-snug text-base">Tu calificación para bono de desempeño es: </p>
                                </div>
                            
                                <div class="">
                                    <p class="text-xl font-semibold leading-snug text-blue-700">{{ $resDesempeno }}</p>
                                </div>
                            
                            </div>
                            <br>
                            <p class="leading-snug" style="font-size: 12px;">La calificación está integrada por el <b>resultado ponderado de clima laboral, la evaluación de tu jefe, la evaluación de tus compañeros y los resultados financieros de la empresa</b>. </p>
                        </div>

                    </div>

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>

                            <div class="grid grid-cols-3">

                                <div class="col-span-2">
                                    <p class="font-semibold leading-snug text-base ">Tu calificación de 9·BOX: </p>
                                </div>
                            
                                <div class="">
                                    <p class="text-xl font-semibold leading-snug text-blue-700">{{ $resDesempeno2 }}</p>
                                </div>
                            
                            </div>
                            <br>
                            <p class="leading-snug" style="font-size: 12px;">La calificación se integra por el <b>resultado ponderado de la evaluación de tu jefe</b>, la <b>evaluación de tus compañeros</b> y <b>clima laboral</b>. </p>
                        </div>

                    </div>
                @elseif($puesto == 'Gerente_270')

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center font-bold border-b border-gray-400">

                        <div>

                            <div class="grid grid-cols-5">

                                <div class="col-start-1 col-span-2">
                                    <p class="text-xl font-semibold leading-snug text-gray-800" wire:click="modalClima(1)">{{ $climaForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;" wire:click="modalClima(1)">Clima laboral</p>
                                    <br>
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $evaluacionForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Evaluación de jefe directo</p>
                                </div>
                            
                                <div class="col-start-4 col-span-2">
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $resFinancieroForm }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Resultado financiero</p>
                                    <br>
                                    <p class="text-xl font-semibold leading-snug text-gray-800">{{ $evaluacion_270Form }}</p>
                                    <p class="font-semibold leading-snug" style="font-size: 12px;">Evaluación de compañeros</p>
                                </div>
                            
                            </div>
                
                        </div>

                    </div>

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center border-b border-gray-400">

                        <div>

                            <div class="grid grid-cols-3">

                                <div class="col-span-2">
                                    <p class="font-semibold leading-snug text-base">Tu calificación para bono de desempeño es: </p>
                                </div>
                            
                                <div class="">
                                    <p class="text-xl font-semibold leading-snug text-blue-700">{{ $resDesempeno }}</p>
                                </div>
                            
                            </div>
                            <br>
                            <p class="leading-snug" style="font-size: 12px;">La calificación está integrada por el <b>resultado ponderado de clima laboral, la evaluación de tu jefe, la evaluación de tus compañeros y los resultados financieros de la empresa</b>. </p>
                        </div>

                    </div>

                    <div class="pt-4 pb-4 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                        <div>

                            <div class="grid grid-cols-3">

                                <div class="col-span-2">
                                    <p class="font-semibold leading-snug text-base ">Tu calificación de 9·BOX: </p>
                                </div>
                            
                                <div class="">
                                    <p class="text-xl font-semibold leading-snug text-blue-700">{{ $resDesempeno2 }}</p>
                                </div>
                            
                            </div>
                            <br>
                            <p class="leading-snug" style="font-size: 12px;">La calificación se integra por el <b>resultado ponderado de la evaluación de tu jefe</b>, la <b>evaluación de tus compañeros</b> y <b>clima laboral</b>. </p>
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
                <div class="pt-4 pb-2 flex w-full mx-auto text-gray-500 justify-center text-center border-t border-gray-400">

                    <div>
                        <p class="text-xl text-gray-500 font-semibold">
                        Tu ubicación en 9·BOX:
                    </p>
                    <p class="text-gray-500 font-semibold text-center" style="font-size: 12px;">
                        Eje vertical: <b>potencial</b> · Eje horizontal: <b>desempeño</b>
                    </p>

                    </div>
                    

                </div>
                {{-- NINEBOX --}}
                <div class="pb-2 flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-2 lg:-mx-2 xl:-mx-2 items-center text-white">

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md
                        @if ($box1 == null)
                            bg-yellow-100
                        @else
                            bg-yellow-400
                        @endif box-border border-2" style="border-color: #E9F0F2;">

                        @if ($box1 == null)

                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center" wire:click="modalNineBoxVacio(1)">
                                        <div class="">
                                            
                                        </div>
                                      
                                        
                                            <div class="col-start-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor" >
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <div class="col-start-2">
                                                <p class="font-semibold text-sm text-center">  </p>

                                                <p class="font-semibold text-xs text-center opacity-40"> 80 - 82.5</p>

                                            </div>
                                        
                                    </div>
                                    
                                </div>
        
                            </div>

                        @else
                            <div class="pt-6 pb-6">
                                {!! $box1 !!}
                            </div>
                        @endif
                    </div>

                    <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3 rounded-md 
                    @if ($box2 == null)
                        bg-green-100
                    @else
                        bg-green-500
                    @endif box-border border-2" style="border-color: #E9F0F2;">
                        @if ($box2 == null)
                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center" wire:click="modalNineBoxVacio(2)">
        
                                        <div class="">
                                            
                                        </div>
                                      
                                        <div class="col-start-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor" >
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="col-start-2 ">
                                            <p class="font-semibold text-sm text-center">  </p>

                                            <p class="font-semibold text-xs text-center opacity-40"> 92.6 - 94.5</p>

                                        </div>
                                      
                                    </div>
                                    
                                </div>
        
                            </div>
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
                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center" wire:click="modalNineBoxVacio(3)">
        
                                        <div class="">
                                            
                                        </div>
                                      
                                        <div class="col-start-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor" >
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="col-start-2 ">
                                            <p class="font-semibold text-sm text-center">  </p>

                                            <p class="font-semibold text-xs text-center opacity-40"> 95 - 100</p>

                                        </div>
                                      
                                    </div>
                                    
                                </div>
        
                            </div>
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
                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center" wire:click="modalNineBoxVacio(4)">
        
                                        <div class="">
                                            
                                        </div>
                                      
                                        <div class="col-start-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor" > 
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="col-start-2 ">
                                            <p class="font-semibold text-sm text-center">  </p>

                                            <p class="font-semibold text-xs text-center opacity-40"> 70 - 74.9</p>

                                        </div>
                                      
                                    </div>
                                    
                                </div>
        
                            </div>
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
                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center" wire:click="modalNineBoxVacio(5)">
        
                                        <div class="">
                                            
                                        </div>
                                      
                                        <div class="col-start-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="col-start-2 ">
                                            <p class="font-semibold text-sm text-center">  </p>

                                            <p class="font-semibold text-xs text-center opacity-40"> 82.6 - 84.9</p>

                                        </div>
                                      
                                    </div>
                                    
                                </div>
        
                            </div>
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
                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center" wire:click="modalNineBoxVacio(6)">
        
                                        <div class="">
                                            
                                        </div>
                                      
                                        <div class="col-start-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="col-start-2 ">
                                            <p class="font-semibold text-sm text-center">  </p>

                                            <p class="font-semibold text-xs text-center opacity-40"> 90 - 92.5</p>

                                        </div>
                                      
                                    </div>
                                    
                                </div>
        
                            </div>
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
                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center"  wire:click="modalNineBoxVacio(7)">
        
                                        <div class="">
                                            
                                        </div>
                                      
                                        <div class="col-start-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="col-start-2 ">
                                            <p class="font-semibold text-sm text-center">  </p>

                                            <p class="font-semibold text-xs text-center opacity-40"> < 69</p>

                                        </div>
                                      
                                    </div>
                                    
                                </div>
        
                            </div>
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
                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center"  wire:click="modalNineBoxVacio(8)">
        
                                        <div class="">
                                            
                                        </div>
                                      
                                        <div class="col-start-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="col-start-2 ">
                                            <p class="font-semibold text-sm text-center">  </p>

                                            <p class="font-semibold text-xs text-center opacity-40"> 75 - 79.9</p>

                                        </div>
                                      
                                    </div>
                                    
                                </div>
        
                            </div>
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
                            <div class="pt-5 pb-5 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center">

                                <div>
        
                                    <div class="grid justify-items-center" wire:click="modalNineBoxVacio(9)">
        
                                        <div class="">
                                            
                                        </div>
                                      
                                        <div class="col-start-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-20 text-black " viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <div class="col-start-2 ">
                                            <p class="font-semibold text-sm text-center">  </p>

                                            <p class="font-semibold text-xs text-center opacity-40"> 85 - 89.9</p>

                                        </div>
                                      
                                    </div>
                                    
                                </div>
        
                            </div>
                        @else
                            {!! $box9 !!}
                        @endif
                    </div>

                </div>

                <div class="pt-4 pb-2 flex w-full mx-auto text-gray-500 space-x-8 justify-center text-center ">

                    <div>
                        <p class="leading-snug" style="font-size: 12px;"> <b>Haz clic en la ubicación marcada con el engrane para conocer tu resultado</b>, tambien puedes hacer clic en los signos de más para conocer la descripción de los demás cuadrentes.</p>
                    </div>

                </div>

                <div class="pt-4 pb-2 flex w-full mx-auto text-gray-500 justify-center text-center border-t border-gray-400">
                    
                     <button class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-800 rounded-md hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-500 focus:ring-opacity-80"
                    id="getPDF" onclick="getPDF()">
                        Descargar
                    </button> 
                    
                </div>

            </div>
        </div>


        <!-- Modal para 9box campos vacios -->
        <div class="fixed z-10 inset-0 overflow-y-auto @if($abrirModal) @else hidden @endif" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
               
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-{{$iconoColor}}-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Heroicon name: outline/exclamation -->
                                {!! $iconoModal !!}
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    {{$tituloModal}}
                                </h3>
                                <h4 class="text-base leading-6 font-medium text-gray-900" id="modal-title">
                                    {{$subtituloModal}}
                                </h4>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                    {!! $infoModal !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 pt-2 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-{{$iconoColor}}-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="modalNineBoxVacio(0)">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal para Clima laboral -->
        <div class="fixed z-10 inset-0 overflow-y-auto @if($abrirModalCima) @else hidden @endif" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
               
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Heroicon name: outline/exclamation -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Estos son los resultados de clima laboral de tu área:
                                </h3>
                                <div class="mt-2">
                                    {{-- <p class="text-sm text-gray-500">
                                    {!! $infoModal !!}
                                    </p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 pt-2 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="modalClima(0)">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- jsPDF library -->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>

    <script>

        function getPDF() {
            let page = document.getElementById('resultadoDesempenoPDF');

            html2PDF(page, {
                jsPDF:{
                    unit: 'px',
                    format: 'letter',
                    x:0,
                    y:0
                },
                html2canvas: {
                    height: 1700,
                    scrollX: -window.scrollX,
                    scrollY: -window.scrollY
                },
                output: '{{ $no_colaborador }}.pdf'
            });
        }

    </script>
  
    
</div>