<div style="margin-left: 5%; margin-right: 5%;">
    <header class="p-4 bg-white">
            <a aria-label="Back to homepage" class="flex justify-center p-2 content-center">
                <img src="{{ asset('images/disc/FACTOR_logo_new.svg') }}" loading="lazy" class=" object-cover h-10 w-100">
            </a>
    </header>
    
    <div class="mb-8 max-w-4xl px-8 py-4 mx-auto bg-white rounded-lg shadow-xl border border-gray-300" >

        <div class="mt-2 my-2 @if($inicio) @else hidden @endif">
            <a class="flex justify-center">

                <img src="{{ asset('images/disc/DISC_banner_home.svg') }}" loading="lazy" class="w-full lg:w-6/12">

            </a>
            <br>
            <p class="mt-2 text-gray-600">
                En general, todos tenemos una o dos dimensiones que sobresalen sobre las demás, dando como resultado una combinación concreta: el perfil DISC. 
            </p>
            <p class="mt-2 text-gray-600">
                Este nos permite evaluar <b>cómo se relaciona una persona con su entorno</b>. Se trata de uno de los recursos más comprensibles y fáciles de aplicar en las empresas, ya que puede cumplir distintos tipos de objetivos, como la integración de un equipo eficiente o la elaboración de estrategias de ventas dependiendo de las fortalezas de cada integrante.
            </p>
            <p class="mt-2 text-gray-600">
                Además de identificar las características de la personalidad, el DISC también detecta ciertas habilidades, pues es una forma sencilla de ver cómo nos relacionamos con el mundo y reaccionamos frente a diferentes circunstancias.
            </p>

        </div>
        
        <div class="flex items-center justify-center mt-4 @if($inicio) @else hidden @endif">
            <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" wire:click="ocultarInicio">
                Empezar 
            </button>
        </div>
        {{-- Fin - descripcion del test DISC --}}

        {{-- Inicio - intrucciones --}}

        <div class="mt-2 my-2 @if($instruccion) @else hidden @endif">
            <a class="text-2xl font-bold text-gray-800">
        
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 inline-block"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z"/></svg>
                Instrucciones
            </a>
            <p class="mt-2 text-red-600 font-bold text-base">
                ¡Importante!

            </p>
            <p class="mt-2 text-gray-600">
                El test <b>DISC</b> esta conformado por 28 secciones, cada una de ellas por 4 adjetivos.
            </p>
            <p class="mt-2 text-gray-600">
                Escoje y marca la palabra que <b>más(+)</b> te describe y la que <b>menos(-)</b> te describe (colocando el símbolo respectivo en la casilla <b>"Marcador"</b>)
                por cada ítem de acuerdo a su persepción personal y/o su forma de trabajo.
            </p>

            <p class="mt-2 text-gray-600">
                No necesitas pensar detenidamente, es clave contestar con rapidez y espontaneidad.
                <br><b class="text-red-600">Solo tienes 10 minutos para contestar.</b>
            </p>

            <p class="mt-2 text-gray-600 ">
                Recuerda, por cada ítem, solo deberás marcar <b>UNO</b> como positivo(+) y <b>UNO</b> como negativo(-), tal como se muestra a continuación.
            </p>


            <div class="my-4">
                
                <div class="flex flex-wrap overflow-hidden items-center">

                    <img src="{{ asset('images/disc/item1.png') }}" loading="lazy" class="w-full lg:w-full">
                  
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
            
        </div>
        {{-- Fin - intrucciones --}}


        @if ($inicio == false && $instruccion == false)
            {{-- Inicio - Barra de progreso --}}            
            <div class="flex items-center justify-between @if($currentStep == 29) hidden @endif">
                <span>
                </span>
                
                <a class="px-3 py-1 text-sm font-bold text-gray-600"  @if ($inicio == false && $instruccion == false)  @if($Contador == 'Sin tiempo')  @elseif($currentStep == 29) {{$Contador = 'Haz finalizado'}}  @else wire:poll.1000ms='cuentaAtras'  @endif @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 inline-block"  fill="currentColor">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M17.618 5.968l1.453-1.453 1.414 1.414-1.453 1.453a9 9 0 1 1-1.414-1.414zM11 8v6h2V8h-2zM8 1h8v2H8V1z"/>
                    </svg> 
                    {{ $Contador }}
                </a>
            </div>
                
            <div class="mb-8 @if($currentStep == 29) hidden @endif">
                <div class="rounded-lg block p-4 m-auto">
                    <div class="w-full h-4 bg-gray-400 rounded-full mt-3">
                        <div class="h-full text-center text-xs text-white bg-green-500 rounded-full" style="width: {{number_format($currentStep/28 * 100,0)}}%;">
                            {{number_format($currentStep/29 * 100,0)}}%
                        </div>
                    </div>
                </div>

                <div class="rounded-lg block p-2 m-auto">
                    <p class="mt-2 text-red-600 font-bold text-base">
                        ¡Importante!
                    </p>
                    <p class="mt-2 font-bold text-base">
                        Recuerda, por cada ítem solo deberás marcar UNO como positivo(+) y UNO como negativo(-).
                    </p>
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion1_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion1_0">
                        </div>

                        <div>
                            {{$question1[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion1_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion1_1">
                        </div>

                        <div>
                            {{$question1[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion1_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion1_2">
                        </div>

                        <div>
                            {{$question1[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion1_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions1_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion1_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion2_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion2_0">
                        </div>

                        <div>
                            {{$question2[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion2_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion2_1">
                        </div>

                        <div>
                            {{$question2[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion2_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion2_2">
                        </div>

                        <div>
                            {{$question2[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion2_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions2_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion2_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion3_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion3_0">
                        </div>

                        <div>
                            {{$question3[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion3_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion3_1">
                        </div>

                        <div>
                            {{$question3[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion3_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion3_2">
                        </div>

                        <div>
                            {{$question3[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion3_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions3_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion3_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion4_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion4_0">
                        </div>

                        <div>
                            {{$question4[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion4_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion4_1">
                        </div>

                        <div>
                            {{$question4[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion4_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion4_2">
                        </div>

                        <div>
                            {{$question4[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion4_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions4_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion4_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion5_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion5_0">
                        </div>

                        <div>
                            {{$question5[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion5_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion5_1">
                        </div>

                        <div>
                            {{$question5[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion5_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion5_2">
                        </div>

                        <div>
                            {{$question5[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion5_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions5_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion5_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion6_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion6_0">
                        </div>

                        <div>
                            {{$question6[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion6_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion6_1">
                        </div>

                        <div>
                            {{$question6[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion6_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion6_2">
                        </div>

                        <div>
                            {{$question6[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion6_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions6_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion6_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion7_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion7_0">
                        </div>

                        <div>
                            {{$question7[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion7_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion7_1">
                        </div>

                        <div>
                            {{$question7[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion7_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion7_2">
                        </div>

                        <div>
                            {{$question7[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion7_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions7_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion7_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion8_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion8_0">
                        </div>

                        <div>
                            {{$question8[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion8_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion8_1">
                        </div>

                        <div>
                            {{$question8[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion8_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion8_2">
                        </div>

                        <div>
                            {{$question8[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion8_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions8_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion8_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion9_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion9_0">
                        </div>

                        <div>
                            {{$question9[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion9_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion9_1">
                        </div>

                        <div>
                            {{$question9[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion9_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion9_2">
                        </div>

                        <div>
                            {{$question9[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion9_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions9_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion9_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion10_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion10_0">
                        </div>

                        <div>
                            {{$question10[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion10_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion10_1">
                        </div>

                        <div>
                            {{$question10[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion10_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion10_2">
                        </div>

                        <div>
                            {{$question10[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion10_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions10_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion10_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion11_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion11_0">
                        </div>

                        <div>
                            {{$question11[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion11_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion11_1">
                        </div>

                        <div>
                            {{$question11[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion11_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion11_2">
                        </div>

                        <div>
                            {{$question11[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion11_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions11_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion11_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion12_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion12_0">
                        </div>

                        <div>
                            {{$question12[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion12_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion12_1">
                        </div>

                        <div>
                            {{$question12[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion12_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion12_2">
                        </div>

                        <div>
                            {{$question12[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion12_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions12_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion12_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion13_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion13_0">
                        </div>

                        <div>
                            {{$question13[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion13_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion13_1">
                        </div>

                        <div>
                            {{$question13[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion13_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion13_2">
                        </div>

                        <div>
                            {{$question13[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion13_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions13_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion13_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion14_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion14_0">
                        </div>

                        <div>
                            {{$question14[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion14_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion14_1">
                        </div>

                        <div>
                            {{$question14[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion14_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion14_2">
                        </div>

                        <div>
                            {{$question14[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion14_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions14_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion14_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion15_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion15_0">
                        </div>

                        <div>
                            {{$question15[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion15_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion15_1">
                        </div>

                        <div>
                            {{$question15[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion15_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion15_2">
                        </div>

                        <div>
                            {{$question15[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion15_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions15_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion15_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion16_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion16_0">
                        </div>

                        <div>
                            {{$question16[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion16_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion16_1">
                        </div>

                        <div>
                            {{$question16[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion16_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion16_2">
                        </div>

                        <div>
                            {{$question16[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion16_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions16_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion16_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion17_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion17_0">
                        </div>

                        <div>
                            {{$question17[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion17_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion17_1">
                        </div>

                        <div>
                            {{$question17[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion17_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion17_2">
                        </div>

                        <div>
                            {{$question17[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion17_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions17_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion17_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion18_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion18_0">
                        </div>

                        <div>
                            {{$question18[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion18_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion18_1">
                        </div>

                        <div>
                            {{$question18[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion18_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion18_2">
                        </div>

                        <div>
                            {{$question18[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion18_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions18_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion18_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion19_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion19_0">
                        </div>

                        <div>
                            {{$question19[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion19_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion19_1">
                        </div>

                        <div>
                            {{$question19[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion19_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion19_2">
                        </div>

                        <div>
                            {{$question19[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion19_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions19_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion19_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion20_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion20_0">
                        </div>

                        <div>
                            {{$question20[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion20_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion20_1">
                        </div>

                        <div>
                            {{$question20[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion20_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion20_2">
                        </div>

                        <div>
                            {{$question20[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion20_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions20_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion20_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion21_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion21_0">
                        </div>

                        <div>
                            {{$question21[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion21_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion21_1">
                        </div>

                        <div>
                            {{$question21[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion21_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion21_2">
                        </div>

                        <div>
                            {{$question21[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion21_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions21_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion21_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion22_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion22_0">
                        </div>

                        <div>
                            {{$question22[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion22_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion22_1">
                        </div>

                        <div>
                            {{$question22[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion22_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion22_2">
                        </div>

                        <div>
                            {{$question22[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion22_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions22_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion22_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion23_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion23_0">
                        </div>

                        <div>
                            {{$question23[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion23_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion23_1">
                        </div>

                        <div>
                            {{$question23[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion23_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion23_2">
                        </div>

                        <div>
                            {{$question23[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion23_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions23_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion23_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion24_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion24_0">
                        </div>

                        <div>
                            {{$question24[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion24_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion24_1">
                        </div>

                        <div>
                            {{$question24[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion24_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion24_2">
                        </div>

                        <div>
                            {{$question24[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion24_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions24_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion24_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion25_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion25_0">
                        </div>

                        <div>
                            {{$question25[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion25_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion25_1">
                        </div>

                        <div>
                            {{$question25[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion25_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion25_2">
                        </div>

                        <div>
                            {{$question25[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion25_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions25_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion25_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion26_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion26_0">
                        </div>

                        <div>
                            {{$question26[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion26_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion26_1">
                        </div>

                        <div>
                            {{$question26[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion26_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion26_2">
                        </div>

                        <div>
                            {{$question26[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion26_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions26_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion26_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion27_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion27_0">
                        </div>

                        <div>
                            {{$question27[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion27_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion27_1">
                        </div>

                        <div>
                            {{$question27[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion27_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion27_2">
                        </div>

                        <div>
                            {{$question27[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion27_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions27_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion27_3">
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
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_0" value="2" id="flexCheckDefault" wire:model="marcadorQuestion28_0">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion28_0">
                        </div>

                        <div>
                            {{$question28[1]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_1" value="2" id="flexCheckDefault" wire:model="marcadorQuestion28_1">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_1" value="1" id="flexCheckDefault" wire:model="marcadorQuestion28_1">
                        </div>

                        <div>
                            {{$question28[2]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_2" value="2" id="flexCheckDefault" wire:model="marcadorQuestion28_2">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_2" value="1" id="flexCheckDefault" wire:model="marcadorQuestion28_2">
                        </div>

                        <div>
                            {{$question28[3]}}
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_3" value="2" id="flexCheckDefault" wire:model="marcadorQuestion28_3">
                        </div>
                        <div>
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions28_3" value="1" id="flexCheckDefault" wire:model="marcadorQuestion28_3">
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
                
            
            @elseif($currentStep == 29)
                <div id="resultadoDesempenoPDF" class="pt-4">
                    <div class="mt-2 my-2 text-center">
                        <a class="text-3xl font-bold text-gray-800 my-4 ">
                            Grafica de resultado
                        </a>

                        <div class="grid grid-cols-3 gap-4 text-center place-items-center pt-4">

                            <div class="col-span-3 w-full h-full text-black">
                                <canvas id="myChart"></canvas>
                            </div>


                            <div class="col-span-3 w-full h-full text-black">
                                <a class="text-2xl font-bold text-gray-800 my-4">
                                    Interpretación de los resultados
                                </a>
                            </div>
                            
                            <div class="col-span-3 w-full h-full text-gray-700 text-left ml-3">

                                @if ($resultados2 == 'Desarrollador')
                                    <p>Dictador</p>
                                    <br>
                                    <p>
                                        Eres una persona autosuficiente que prefieren buscar sus propias soluciones creativas e individualistas. 
                                    </p>
                                    <p>
                                        De voluntad fuerte y prefieres estar libre de influencias restrictivas. 
                                    </p>
                                    <p>
                                        Los desarrolladores están más interesados ​​en las oportunidades de avance logrando los objetivos que se propusieron. 
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Un reto y nuevas oportunidades.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Capacidad para cumplir con sus estándares.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Ser un buscador de soluciones.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Solucionador de problemas innovador: la responsabilidad se detiene con ellos.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Se vuelve beligerante si las cosas no salen como quieren.
                                    </p>

                                @elseif($resultados2 == 'Orientado a resultados')
                                
                                    <p>Pragmático</p>
                                    <br>
                                    <p>
                                        Buscas lograr resultados. 
                                        Valoras la independencia y muestras una confianza en ti mismo que algunos pueden percibir como arrogancia.
                                    </p>
                                    <p>
                                        Eres una persona competitiva y te gusta las tareas dificiles y los altos cargos. 
                                    </p>
                                    <p>
                                        Las personas orientadas a los resultados tienden a criticar a los demás que no piensan tan rápido como ellos.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Control, Dominio e Independencia.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Habilidad para realizar tareas rápidamente.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Diligencia y fuerza de carácter.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Persistencia y determinación.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Detección de fallas, crítica, sobrepasa los límites.
                                    </p>


                                @elseif($resultados2 == 'Inspiracional')
                                    <p>{{$resultados2}}</p>
                                    <br>
                                    <p>
                                        Tiendes a influir en los pensamientos y acciones de los demás.
                                    </p>
                                    <p>
                                        Intentas controlar tu entorno y dirigir el comportamiento de los demás hacia una meta predeterminada. 
                                    </p>
                                    <p>
                                        El personal inspirador tiene resultados claros en mente y pueden ser encantadores en sus interacciones.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Control de su entorno y objetivos.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Estatus social, fuerza de carácter personal.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Encanto persuasivo, intimidación y uso de recompensas.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Inicia, exige, tiende a ser un "movedor y agitador".
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Tiende a ser manipulador, beligerante o pendenciero.
                                    </p>

                                @elseif($resultados2 == 'Creativo')
                                    <p>Arquitecto</p>
                                    <br>
                                    <p>
                                        Te expresas a partir de fuerzas conductuales opuestas y deseas resultados inmediatos, pero tienes un deseo fuerte de perfección.
                                    </p>
                                    <p>
                                        Observarás agresividad y será atemperada por la sensibilidad.
                                    </p>
                                    <p>
                                        Las personas creativas quieren libertad para explorar y la autoridad para probar y volver a probar los hallazgos. Las decisiones diarias son fáciles para ellos, pero tienen mucho cuidado al tomar decisiones más importantes.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Logros únicos y dominio.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Cumplimiento de tareas y dominio.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Enfoques innovadores y desarrollo de sistemas.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Puede ser un agente de cambio positivo.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Se vuelve independiente y se aburre con el trabajo rutinario.
                                    </p>

                                @elseif($resultados2 == 'Maratonero')
                                    <p>Maratonero</p>
                                    

                                @elseif($resultados2 == 'Promotor')
                                    <p>{{$resultados2}}</p>
                                    <br>
                                    <p>
                                        Eres generalmente sociable.
                                    </p>
                                    <p>
                                        Eres verbal y generoso con la creación de apoyo para otros proyectos.
                                    </p>
                                    <p>
                                        Los promotores son persuasivos y entusiastas; tienden a percibir a los demás bajo una luz favorable sin investigar todos los hechos.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Aceptación social y popularidad.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Habilidades verbales y habilidades persuasivas.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Aprobación verbal, aprecio, elogio, favores.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Trae ligereza, alivia la tensión, promueve personas y tareas.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Tiende a ser desorganizado, descuidado y disperso.
                                    </p>

                                @elseif($resultados2 == 'Persuasivo')
                                    <p>Protagonista</p>
                                    <br>
                                    <p>
                                        Te encanta trabajar con y a través de las personas para lograr sus propios objetivos.
                                    </p>
                                    <p>
                                        Fácilmente ganas apoyo y respeto por tu personalidad extovertida y persuasiva.
                                    </p>
                                    <p>
                                        desean libertad de expresión y libertad de tareas y rutinas aburridas. Necesitan mantenerse enfocados en la tarea y equilibrar su entusiasmo con enfoques realistas.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Estatus, prestigio y autoridad.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Su flexibilidad y capacidad para expresarse.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Habilidades verbales y naturaleza amistosa y abierta.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Preparado y confiado, delega, vende y cierra.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Se convence fácilmente, se puede organizar para que se vea bien.
                                    </p>

                                @elseif($resultados2 == 'Consejero')
                                    <p>{{$resultados2}}</p>
                                    <br>
                                    <p>
                                        Eres una persona que contruyes relaciones a largo plazo.
                                    </p>
                                    <p>
                                        Buen oyente y efectivo en la resolución de problemas, y a su vez usas un enfoque indirecto cuando tratas con otro.
                                    </p>
                                    <p>
                                        Tiendes a poner a als personas en primer lugar al birndar reconocimineto a los demás, atribuyes menos importancia al cumplimineto de tareas.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Colaboración, amistad y un ambiente tranquilo.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Voluntad de buscar el bien en los demás.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Relaciones personales sinceras y disponibilidad para los demás.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Habilidades de escucha efectiva, estabilidad y previsibilidad.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Confía demasiado en los demás y se vuelve demasiado flexible.
                                    </p>
                                
                                @elseif($resultados2 == 'Tasador')
                                    <p>Estimador</p>
                                    <br>
                                    <p>
                                        Eres una persona asertiva en lugar de ser agresiva.
                                    </p>
                                    <p>
                                        Obtienes la cooperación de los demás al mostrar consideración y usas la persuasión para involucrar a otros en los proyectos.
                                    </p>
                                    <p>
                                        Los tasadores son prácticos y aseguran resultados progresivos mediante el desarrollo de un plan de acción detallado. Tienen el deseo de ganar y pueden impacientarse cuando no se cumplen sus altos estándares.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        ¡Ganando con estilo! ¡Victoria!.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Su disposición y capacidad para tomar la iniciativa.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Involucrarlos y ofrecerles reconocimiento.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Ser un jugador de equipo y lograr objetivos.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Se vuelve crítico e impaciente.
                                    </p>

                                @elseif($resultados2 == 'Especialista')
                                    <p>{{$resultados2}}</p>
                                    <br>
                                    <p>
                                        Eres una persona considerada,paciente y siempre estas listo para ayudar a los demás.
                                    </p>
                                    <p>
                                        Debido a tu personalidad modesta y de buenos modales te llevas bien con los demás.
                                    </p>
                                    <p>
                                        Los especialistas prefieren procedimientos prácticos, probados y verdaderos que garanticen la estabilidad. Les gustan los patrones familiares y predecibles que producen resultados consistentes y confiables.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Entorno estable controlado, manteniendo el status quo.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Sinceridad, amabilidad y competencia.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Rendimiento consistente y predecible.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Naturaleza calmante constante y rendimiento constante.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Capitula y se adapta a los que están en autoridad.
                                    </p>
                                
                                @elseif($resultados2 == 'Triunfador')
                                    <p>{{$resultados2}}</p>
                                    <br>
                                    <p>
                                        Eres una persona con un sentido fuerte de responsabilidad personal,
                                        confias en tus logros laborales y personales y puedes ser racio a delegar tareas cuando estas bajo estés.
                                    </p>
                                    <p>
                                        Prosperas cuando tienes un fuerte sentido de dirección sobre su trabajo y su vida personal. 
                                        Estás continuamente en la búsqueda de nuevos logros. 
                                    </p>
                                    <p>
                                        El estilo dual de S y D hace que sea difícil predecir las reacciones del Triunfador. A veces están en modo D, directos y orientados a los resultados, y otras veces están en modo S, atentos y complacientes. Son muy independientes, pero pueden querer ser parte de un equipo de alto rendimiento. Expresan una lealtad feroz a las personas en sus vidas.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Logros personales.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Habilidad para lograr resultados medibles.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Responsabilidad personal por el trabajo asignado.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Independencia y completa las tareas de manera efectiva.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Muestra impaciencia y frustración.
                                    </p>

                                @elseif($resultados2 == 'Agente')
                                    <p>{{$resultados2}}</p>
                                    <br>
                                    <p>
                                        Eres una persona relajada y sigues la corriente.
                                    </p>
                                    <p>
                                        Te esfuerzas para mantener la armonía en las relaciones y te comprometes a tratar a las personas con respeto;
                                        una distinción clave es que tiendes a pensar primero en los demás y luego en ti mismo.
                                    </p>
                                    <p>
                                        Los agentes también tienen excelentes habilidades relacionadas con las tareas y agregan estabilidad a su entorno de trabajo mediante el cumplimiento de los procedimientos y la finalización de las tareas. Aunque por lo general evitan los conflictos, los Si están dispuestos a mediar entre los demás para restaurar la armonía en el lugar de trabajo. 
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Aceptación de su grupo.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Inclusión de todas las personas.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Amistades leales y empatía.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Servicio, crea armonía y empatía.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Usa amistades clave para influir.
                                    </p>

                                @elseif($resultados2 == 'Investigador')
                                    <p>{{$resultados2}}</p>
                                    <br>
                                    <p>
                                        Eres una persona obstinada hacia las metas y el seguimiento.
                                    </p>
                                    <p>
                                        Tienes claros los resultados que quieres, persigues con calma y firmeza hacia una meta fija.
                                    </p>
                                    <p>
                                        Los investigadores valoran lograr las cosas de una manera bien hecha. Asumen una gran responsabilidad y están atentos a los detalles importantes. Tienen una gran capacidad para aprender de la experiencia y pueden tomar medidas correctivas cuando sea necesario.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Cargo, título o autoridad del título de la función.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Su uso de información fáctica y confiable.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Tenacidad y determinación personal.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Determinado enfoque en la tarea y seguimiento.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Guarda rencor e interioriza el conflicto.
                                    </p>

                                @elseif($resultados2 == 'Pensador Objetivo')

                                    <p>Objetivo</p>
                                    <br>
                                    <p>
                                        Eres una persona enfocada en lograr una precisión total y completa en todo lo que haces.
                                    </p>
                                    <p>
                                        Cuestionas continuamente ideas y procesos para asegurarse de que las cosas se hagan correctamente.
                                    </p>
                                    <p>
                                        Los pensadores objetivos toman decisiones basadas en el análisis lógico de información observable y cuantificable, en lugar de guiarse por las emociones de una situación. A menudo prefieren trabajar de forma independiente, pero siguen siendo objetivos y diplomáticos cuando tratan con los demás.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Precisión, exactitud y lógica.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Pensamiento lógico e información fáctica.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Lógica, hechos y datos.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Recopilación de datos y pruebas de información.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Tiende a inquietarse y preocuparse.
                                    </p>

                                @elseif($resultados2 == 'Perfeccionista')
                                 
                                    <p>{{$resultados2}}</p>
                                    <br>
                                    <p>
                                        Eres una persona impulsada por la necesidad de precisión y lógica.
                                    </p>
                                    <p>
                                        Necesitas presión y estar impulsada por la paciencia lo que da resultado como una persona enfocada en claidad.
                                    </p>
                                    <p>
                                        Los perfeccionistas son pensadores precisos y emplean planes y procedimientos tanto para su vida personal como profesional, evitando así lo inesperado. Utilizan la diligencia debida cuando se les solicita una precisión detallada. Cuestionan suposiciones y requieren mucha información que puedan analizar al explorar alternativas y antes de tomar una decisión o llegar a conclusiones.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Resultados predecibles y estables.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Precisión y altos estándares.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Precisión y atención al detalle.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Control de calidad y mantenimiento de estándares.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Recurre al tacto y la diplomacia.
                                    </p>

                                @elseif($resultados2 == 'Practicante')
                                 
                                    <p>Voluntario</p>
                                    <br>
                                    <p>
                                        Eres una persona que disfrutas ser un miembro del equipo y ayudas a otros a tener exito.
                                    </p>
                                    <p>
                                        No quieres responsabilidades de deciciones importantes o de asumir riesgos, cuando tienes mucho tiempo
                                        para pensar las cosas, pueden aportar información valiosa al proceso del equipo.
                                    </p>
                                    <p>
                                        Los practicantes prefieren un ambiente cómodo y cooperativo donde las personas sean confiables y agradables. Prosperan cuando pueden contribuir a proyectos que requieren atención a los detalles.
                                    </p>
                                    <br>
                                    <p>
                                        <b>Motivado por:</b> 
                                        Apoyar e interactuar con otros.
                                    </p>
                                    <p>
                                        <b>Juzga a los demás por:</b> 
                                        Estado de posición y autodisciplina.
                                    </p>
                                    <p>
                                        <b>Influye en otros por:</b> 
                                        Habilidad con la resolución de problemas y la tecnología.
                                    </p>
                                    <p>
                                        <b>Valor para el equipo:</b> 
                                        Puede especializarse y ser competente.
                                    </p>
                                    <p>
                                        <b>Cuando está estresado:</b> 
                                        Demasiado sensible a las críticas y comedido.
                                    </p>


                                @elseif($resultados2 == 'Escéptico')
                                 
                                    <p>Escéptico</p>


                                @elseif($resultados2 == 'Independiente')
                                 
                                    <p>Independiente</p>


                                @elseif($resultados2 == 'Impaciente')
                                 
                                    <p>Impaciente</p>
                                    

                                @endif

                            </div>
                       
                        </div>

                    </div>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-800 cursor-pointer" 
                    onclick="getPDF()">
                        Descargar

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            
            @endif
            
        @endif

    </div>

    <!-- Modal -->
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 overflow-y-auto @if($mostrarModal) @else hidden @endif" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full {{$bgIcono}} sm:mx-0 sm:h-10 sm:w-10">
                       
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
                </div>
            </div>
        </div>
    </div>
    {{-- Fin modal --}}


    {{-- Chartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js" defer></script>

    <script>

        let ctx = '';
        let currenstep = '';
        let resultados  = [];

        document.addEventListener('livewire:load', () => {

            @this.on('resultadosFinal',()=>{

                currenstep = @this.currentStep;
                resultados = @this.resultados;

                console.log(resultados);

                if( currenstep == 29 /* && resultados.length > 0 */){

                    var ctx = document.getElementById("myChart");
                    
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['D','I','S','C'],
                            datasets: [
                                { 
                                    label: 'Segmento',
                                    borderColor: ['#EF4444','#F59E0B','#10B981','#3B82F6'],
                                    backgroundColor: ['#DC2626','#FBBF24','#059669','#2563EB'],
                                    data: [resultados['rojo'],resultados['amarillo'],resultados['verde'],resultados['azul']]
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    type: 'linear',
                                    min: 1,
                                    max: 8
                                }
                                
                            }

                        }
                    });

                }

            });

        });
    </script>


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
                output: 'disc_resultados.pdf'
            });
        }

    </script>

</div>