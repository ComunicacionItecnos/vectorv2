<div>
    <header class="p-4 bg-white">
        <div class="container flex justify-between h-16 mx-auto md:justify-center md:space-x-8">
            <a href="#" aria-label="Back to homepage" class="flex items-center p-2">
                <img src="{{ asset('images/logo_factor-c.png') }}" loading="lazy" class=" object-cover h-10 w-100">
                {{-- <p class="p-4 font-black">Aguila Ammunition</p> --}}
            </a>
        </div>
    </header>
    
    <div class="mt-8 mb-mt-8 max-w-4xl px-8 py-4 mx-auto bg-white rounded-lg shadow-lg">

        {{-- Inicio - descripcion del test DISC --}}
        <div class="flex items-center justify-between @if($inicio) @else hidden @endif">
            <span class="text-sm font-light text-gray-600 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                {{$fecha}}
            </span>
        </div>

        <div class="mt-2 my-2 @if($inicio) @else hidden @endif">
            <a class="text-2xl font-bold text-gray-800">
                Test de colores  - DISC 

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 inline-block"><path fill="none" d="M0 0h24v24H0z"/>
                    <path d="M2 13h6v8H2v-8zM9 3h6v18H9V3zm7 5h6v13h-6V8z"/>
                </svg>

            </a>
            <p class="mt-2 text-gray-600">
                ¿Qué es el test DISC?

            </p>
            <p class="mt-2 text-gray-600">
                En general, todos tenemos una o dos dimensiones que sobresalen sobre las demás, dando como resultado una combinación concreta: el perfil DISC, que nos permite evaluar cómo se relaciona una persona con su entorno. Se trata de uno de los recursos más comprensibles y fáciles de aplicar en las empresas, ya que, se puede aplicar para cumplir distintos tipos de objetivos, como la integración de un equipo eficiente o la elaboración de estrategias de ventas dependiendo de la personalidad de los posibles clientes.
            </p>
            <p class="mt-2 text-gray-600">
                Además de identificar las características de la personalidad, el DISC detecta también ciertas habilidades, pues podemos averiguar cómo entendemos el mundo y reaccionamos frente a distintas circunstancias.
            </p>

        </div>
        
        <div class="flex items-center justify-center mt-4 @if($inicio) @else hidden @endif">
            <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="ocultarInicio">
                Empezar 
            </button>
        </div>
        {{-- Fin - descripcion del test DISC --}}

        {{-- Inicio - intrucciones --}}
        <div class="flex items-center justify-between @if($instruccion) @else hidden @endif">
            <span class="text-sm font-light text-gray-600 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                {{$fecha}}
            </span>
            {{-- <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500">Design</a> --}}
        </div>

        <div class="mt-2 my-2 @if($instruccion) @else hidden @endif">
            <a class="text-2xl font-bold text-gray-800">
        
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z"/></svg>
                Instrucciones
            </a>
            <p class="mt-2 text-red-600 font-bold text-base">
                ¡Importante!

            </p>
            <p class="mt-2 text-gray-600">
                El test <b>DISC</b> esta conformado por 28 secciones cada uno de ellos por 4 adjetivos.
            </p>
            <p class="mt-2 text-gray-600">
                Escoje y marca la palabra que <b>más(+)</b> te describe y la que <b>menos(-)</b> te describe(colocando el símbolo respectio en la casilla <b>"Marcador"</b>)
                por cada ítem de acuerdo a su persepción personal y/o su forma de trabajo.
            </p>

            <p class="mt-2 text-gray-600">
                No necesitas pensar detenidamente, es clave contestar con rapidez y esponteabilidad.
                <br><b class="text-red-600">Solo tienes 10 minutos para contestar.</b>
            </p>

            <p class="mt-2 text-gray-600 ">
                Recuerda, por cada ítem, solo deberás marcar <b>UNO</b> como positivo(+) y <b>UNO</b> como negativo(-), tal como se muestra a continuación.
            </p>


            <div class="my-4">
                
                <div class="flex flex-wrap overflow-hidden items-center">

                    <div class="w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                        <p class="mt-2 text-gray-600">
                            ITEM
                        </p>

                        
                        <div class="flex flex-wrap overflow-hidden  text-center">

                            <div class="w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <p class="text-xl text-center">1</p>
                            </div>
                          
                            <div class="w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                
                                <div class="flex flex-wrap overflow-hidden">

                                    <div class="w-full overflow-hidden" >
                                        Ejemplo 1
                                    </div>
                                  
                                    <div class="w-full overflow-hidden">
                                        Ejemplo 2
                                    </div>
                                  
                                    <div class="w-full overflow-hidden">
                                        Ejemplo 3
                                    </div>
                                  
                                    <div class="w-full overflow-hidden">
                                        Ejemplo 4
                                    </div>
                                  
                                </div>

                            </div>
                          
                        </div>

                        

                    </div>
                  
                    <div class="w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                        <p class="mt-2 text-gray-600">
                            Marcador
                        </p>
                        


                        <div class="flex flex-wrap overflow-hidden">

                            <div class="w-full overflow-hidden" style="border-">
                                <br>
                            </div>
                          
                            <div class="w-full overflow-hidden">
                                <br>
                            </div>
                          
                            <div class="w-full overflow-hidden">
                                -
                            </div>
                          
                            <div class="w-full overflow-hidden">
                                +
                            </div>
                          
                        </div>


                    </div>
                  
                </div>
            

            </div>

        </div>
        
        <div class="flex items-center justify-center mt-4 @if($instruccion) @else hidden @endif">
            <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="ocultarInstuccion">
                Siguiente 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
            
            {{-- <div class="flex items-center">
                <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&q=80" alt="avatar">
                <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">Khatab wedaa</a>
            </div> --}}
        </div>
        {{-- Fin - intrucciones --}}


        @if ($inicio == false && $instruccion == false)
            {{-- Inicio - Barra de progreso --}}            
            <div class="flex items-center justify-between">
                <span class="text-sm font-bold text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    {{$fecha}}
                </span>
                
                <a class="px-3 py-1 text-sm font-bold text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 inline-block" fill="currentColor">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M17.618 5.968l1.453-1.453 1.414 1.414-1.453 1.453a9 9 0 1 1-1.414-1.414zM11 8v6h2V8h-2zM8 1h8v2H8V1z"/>
                    </svg> 

                    10:00
                </a>
            </div>
                
            <div class="mb-8">
                <div class="rounded-lg block p-4 m-auto">
                    <div class="w-full h-4 bg-gray-400 rounded-full mt-3">
                        <div class="h-full text-center text-xs text-white bg-green-500 rounded-full" style="width: {{number_format($currentStep/28 * 100,0)}}%;">
                            {{number_format($currentStep/28 * 100,0)}}%
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin - Barra de progreso --}}  

            @if($currentStep == 1)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 1
                    </a>
                    
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question1[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion1_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion1_0">
                        </div>

                        <div>
                            {{$question1[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion1_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion1_1">
                        </div>

                        <div>
                            {{$question1[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion1_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion1_2">
                        </div>

                        <div>
                            {{$question1[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion1_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion1_3">
                        </div>

                    </div>


                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>    

            @elseif ($currentStep == 2)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 2
                    </a>
                    
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question2[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion2_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion2_0">
                        </div>

                        <div>
                            {{$question2[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion2_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion2_1">
                        </div>

                        <div>
                            {{$question2[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion2_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion2_2">
                        </div>

                        <div>
                            {{$question2[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion2_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion2_3">
                        </div>

                    </div>


                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>   

            @elseif ($currentStep == 3)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 3
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question3[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion3_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion3_0">
                        </div>

                        <div>
                            {{$question3[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion3_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion3_1">
                        </div>

                        <div>
                            {{$question3[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion3_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion3_2">
                        </div>

                        <div>
                            {{$question3[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion3_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion3_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>  

            @elseif ($currentStep == 4)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 4
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question4[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion4_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion4_0">
                        </div>

                        <div>
                            {{$question4[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion4_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion4_1">
                        </div>

                        <div>
                            {{$question4[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion4_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion4_2">
                        </div>

                        <div>
                            {{$question4[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion4_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion4_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div> 

            @elseif ($currentStep == 5)  

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 5
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question5[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion5_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion5_0">
                        </div>

                        <div>
                            {{$question5[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion5_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion5_1">
                        </div>

                        <div>
                            {{$question5[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion5_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion5_2">
                        </div>

                        <div>
                            {{$question5[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion5_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion5_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 6)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 6
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question6[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion6_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion6_0">
                        </div>

                        <div>
                            {{$question6[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion6_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion6_1">
                        </div>

                        <div>
                            {{$question6[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion6_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion6_2">
                        </div>

                        <div>
                            {{$question6[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion6_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion6_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                
            @elseif ($currentStep == 7)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 7
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question7[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion7_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion7_0">
                        </div>

                        <div>
                            {{$question7[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion7_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion7_1">
                        </div>

                        <div>
                            {{$question7[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion7_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion7_2">
                        </div>

                        <div>
                            {{$question7[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion7_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion7_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @elseif ($currentStep == 8)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 8
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question8[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion8_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion8_0">
                        </div>

                        <div>
                            {{$question8[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion8_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion8_1">
                        </div>

                        <div>
                            {{$question8[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion8_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion8_2">
                        </div>

                        <div>
                            {{$question8[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion8_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion8_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 9)
                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 9
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question9[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion9_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion9_0">
                        </div>

                        <div>
                            {{$question9[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion9_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion9_1">
                        </div>

                        <div>
                            {{$question9[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion9_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion9_2">
                        </div>

                        <div>
                            {{$question9[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion9_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion9_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 10)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 10
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question10[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion10_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion10_0">
                        </div>

                        <div>
                            {{$question10[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion10_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion10_1">
                        </div>

                        <div>
                            {{$question10[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion10_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion10_2">
                        </div>

                        <div>
                            {{$question10[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion10_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion10_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @elseif ($currentStep == 11)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 11
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question11[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion11_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion11_0">
                        </div>

                        <div>
                            {{$question11[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion11_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion11_1">
                        </div>

                        <div>
                            {{$question11[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion11_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion11_2">
                        </div>

                        <div>
                            {{$question11[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion11_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion11_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @elseif ($currentStep == 12)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 12
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question12[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion12_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion12_0">
                        </div>

                        <div>
                            {{$question12[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion12_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion12_1">
                        </div>

                        <div>
                            {{$question12[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion12_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion12_2">
                        </div>

                        <div>
                            {{$question12[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion12_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion12_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @elseif ($currentStep == 13)
                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 13
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question13[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion13_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion13_0">
                        </div>

                        <div>
                            {{$question13[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion13_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion13_1">
                        </div>

                        <div>
                            {{$question13[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion13_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion13_2">
                        </div>

                        <div>
                            {{$question13[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion13_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion13_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @elseif ($currentStep == 14)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 14
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question14[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion14_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion14_0">
                        </div>

                        <div>
                            {{$question14[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion14_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion14_1">
                        </div>

                        <div>
                            {{$question14[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion14_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion14_2">
                        </div>

                        <div>
                            {{$question14[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion14_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion14_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 15)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 15
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question15[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion15_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion15_0">
                        </div>

                        <div>
                            {{$question15[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion15_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion15_1">
                        </div>

                        <div>
                            {{$question15[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion15_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion15_2">
                        </div>

                        <div>
                            {{$question15[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion15_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion15_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 16)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 16
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question16[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion16_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion16_0">
                        </div>

                        <div>
                            {{$question16[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion16_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion16_1">
                        </div>

                        <div>
                            {{$question16[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion16_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion16_2">
                        </div>

                        <div>
                            {{$question16[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion16_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion16_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 17)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 17
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question17[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion17_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion17_0">
                        </div>

                        <div>
                            {{$question17[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion17_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion17_1">
                        </div>

                        <div>
                            {{$question17[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion17_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion17_2">
                        </div>

                        <div>
                            {{$question17[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion17_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion17_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 18)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 18
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question18[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion18_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion18_0">
                        </div>

                        <div>
                            {{$question18[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion18_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion18_1">
                        </div>

                        <div>
                            {{$question18[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion18_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion18_2">
                        </div>

                        <div>
                            {{$question18[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion18_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion18_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 19)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 19
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question19[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion19_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion19_0">
                        </div>

                        <div>
                            {{$question19[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion19_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion19_1">
                        </div>

                        <div>
                            {{$question19[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion19_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion19_2">
                        </div>

                        <div>
                            {{$question19[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion19_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion19_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 20)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 20
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question20[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion20_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion20_0">
                        </div>

                        <div>
                            {{$question20[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion20_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion20_1">
                        </div>

                        <div>
                            {{$question20[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion20_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion20_2">
                        </div>

                        <div>
                            {{$question20[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion20_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion20_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 21)
            <div class="mt-2 my-2">
                <a class="text-2xl font-bold text-gray-800 my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                    ITEM 21
                </a>
            
                <div class="grid grid-cols-3 mt-4">
                    <div></div>
                    <div class="text-center">Más(+)</div>
                    <div class="text-center">Menos(-)</div>
                </div>

                <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                    <div>
                        {{$question21[0]}}
                    </div>
                    <div>
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion21_0">
                    </div>
                    <div>
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion21_0">
                    </div>

                    <div>
                        {{$question21[1]}}
                    </div>
                    <div>
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion21_1">
                    </div>
                    <div>
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion21_1">
                    </div>

                    <div>
                        {{$question21[2]}}
                    </div>
                    <div>
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion21_2">
                    </div>
                    <div>
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion21_2">
                    </div>

                    <div>
                        {{$question21[3]}}
                    </div>
                    <div>
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion21_3">
                    </div>
                    <div>
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion21_3">
                    </div>

                </div>

            </div>
            
            <div class="flex items-center justify-center mt-4" >
                <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                    Siguiente 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            @elseif ($currentStep == 22)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 22
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question22[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion22_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion22_0">
                        </div>

                        <div>
                            {{$question22[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion22_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion22_1">
                        </div>

                        <div>
                            {{$question22[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion22_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion22_2">
                        </div>

                        <div>
                            {{$question22[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion22_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion22_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 23)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 23
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question23[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion23_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion23_0">
                        </div>

                        <div>
                            {{$question23[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion23_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion23_1">
                        </div>

                        <div>
                            {{$question23[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion23_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion23_2">
                        </div>

                        <div>
                            {{$question23[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion23_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion23_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 24)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 24
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question24[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion24_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion24_0">
                        </div>

                        <div>
                            {{$question24[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion24_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion24_1">
                        </div>

                        <div>
                            {{$question24[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion24_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion24_2">
                        </div>

                        <div>
                            {{$question24[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion24_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion24_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 25)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 25
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question25[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion25_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion25_0">
                        </div>

                        <div>
                            {{$question25[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion25_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion25_1">
                        </div>

                        <div>
                            {{$question25[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion25_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion25_2">
                        </div>

                        <div>
                            {{$question25[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion25_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion25_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 26)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 26
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question26[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion26_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion26_0">
                        </div>

                        <div>
                            {{$question26[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion26_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion26_1">
                        </div>

                        <div>
                            {{$question26[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion26_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion26_2">
                        </div>

                        <div>
                            {{$question26[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion26_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion26_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 27)

                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 27
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question27[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion27_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion27_0">
                        </div>

                        <div>
                            {{$question27[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion27_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion27_1">
                        </div>

                        <div>
                            {{$question27[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion27_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion27_2">
                        </div>

                        <div>
                            {{$question27[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion27_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion27_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            @elseif ($currentStep == 28)
                
                <div class="mt-2 my-2">
                    <a class="text-2xl font-bold text-gray-800 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"class="h-5 w-5 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-7.466 7.466.008 4.247 4.238-.007L21 7.243V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                        ITEM 28
                    </a>
                
                    <div class="grid grid-cols-3 mt-4">
                        <div></div>
                        <div class="text-center">Más(+)</div>
                        <div class="text-center">Menos(-)</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-center place-items-center">
                        <div>
                            {{$question28[0]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_0" value="1" id="flexCheckDefault" wire:model="marcadorQuestion28_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion28_0">
                        </div>

                        <div>
                            {{$question28[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion28_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_1" value="0" id="flexCheckDefault" wire:model="marcadorQuestion28_1">
                        </div>

                        <div>
                            {{$question28[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion28_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_2" value="0" id="flexCheckDefault" wire:model="marcadorQuestion28_2">
                        </div>

                        <div>
                            {{$question28[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion28_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_3" value="0" id="flexCheckDefault" wire:model="marcadorQuestion28_3">
                        </div>

                    </div>

                </div>
                
                <div class="flex items-center justify-center mt-4" >
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="increaseStep">
                        Siguiente 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                
            @endif
            
        @endif

    </div>
    
{{-- <footer class="flex flex-col items-center justify-between px-6 py-4 bg-white dark:bg-gray-800 sm:flex-row absolute mt-8 bottom-0 w-screen">
        <a class="text-xl font-bold text-gray-800 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Aguila®</a>
        
        <p class="py-2 text-gray-800 dark:text-white sm:py-0">All rights reserved</p>

        <div class="flex -mx-2">
            <a href="#" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300" aria-label="Reddit">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z">
                    </path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300"
                aria-label="Facebook">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
                    </path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-300" aria-label="Github">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                    </path>
                </svg>
            </a>
        </div>
</footer> --}}



<br>

<!-- Modal -->
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto @if($mostrarModal) @else hidden @endif" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full {{$bgIcono}} sm:mx-0 sm:h-10 sm:w-10">
              <!-- Heroicon name: outline/exclamation -->
             {{--  <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg> --}}
              {!! $iconomsj !!}
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                {{ $titulomsj }}
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                    {{$msj}}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm {{ $color }}" wire:click="ocultarModal">
            {{$btnTexto}}
          </button>
          {{-- <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button> --}}
        </div>
      </div>
    </div>
  </div>
  

</div>