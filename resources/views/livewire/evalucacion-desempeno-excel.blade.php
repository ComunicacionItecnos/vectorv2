<div class="p-24 bg-purple-300 flex flex-col justify-center items-center">

    <h3 class="pb-10 font-bold text-4xl text-purple-700">Excel evaluacion desempeño - quien ya contesto</h3>

    <label class="block text-left" style="max-width: 400px">
        <span class="text-gray-700">Selecciona una opción</span>
        <select class="form-select block w-full mt-1" wire:model="selectTipo">
            <option value=""></option>
            <option value="1">Aguila Ammunition</option>
            <option value="2">Externos</option>
        </select>
    </label>

    <label class="block text-left" style="max-width: 400px">
        <span class="text-gray-700">Selecciona una puesto</span>
        <select class="form-select block w-full mt-1" wire:model="opcionSelect">
            <option value=""></option>
            <option value="Director">Director</option>
            <option value="Director_270">Director_270</option>
            <option value="Gerente">Gerente</option>
            <option value="Gerente_270">Gerente_270</option>
            <option value="Administrativo">Administrativo</option>
        </select>
    </label>
    <br>
    <div class="flex space-x-2 space-y-2 flex-wrap justify-center items-baseline">
        <button class="rounded-lg px-4 py-2 bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300" wire:click="export()">Generar</button>
    </div>

    <br>

    <div class="flex {{-- space-x-2 space-y-2 --}} flex-wrap justify-center items-baseline">
        <table class="table-auto border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-300">Num. colaborador</th>
                    <th class="border border-gray-300">Primer Nombre</th>
                    <th class="border border-gray-300">Segundo Nombre</th> 
                    <th class="border border-gray-300">Apellido Paterno</th> 
                    <th class="border border-gray-300">Apellido Materno</th>
                    <th class="border border-gray-300">Clima laboral</th>
                    {{-- <th class="border border-gray-300">Resultado financiero</th> --}}
                    <th class="border border-gray-300">Autoevaluación</th>
                    <th class="border border-gray-300">Evaluación</th>
                    {{-- <th class="border border-gray-300">270_1</th> 
                    <th class="border border-gray-300">270_2</th>
                    <th class="border border-gray-300">270_3 </th>
                    <th class="border border-gray-300">270_4</th>
                    <th class="border border-gray-300">270_5</th>
                    <th class="border border-gray-300">270_6</th>
                    <th class="border border-gray-300">270_7</th> --}}
                </tr>
            </thead>

            <tbody>
                @forelse ($lista as $l)
                    
                    <tr>
                        <td class="border border-gray-300">{{$l->no_colaborador}}</td>
                        <td class="border border-gray-300">{{$l->nombre}}</td>
                        <td class="border border-gray-300">{{$l->nombre_2}}</td>
                        <td class="border border-gray-300">{{$l->ap_paterno}}</td>
                        <td class="border border-gray-300">{{$l->ap_materno}}</td>
                        <td class="border border-gray-300">{{$this->camposNull($l->clima)}}</td>
                        {{-- <td class="border border-gray-300">{{$this->camposNull($l->resFinanciero)}}</td> --}}
                        <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->autoevaluacion)) }}
                        </td>
                        <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->evaluacion)) }}
                        </td>
                        {{-- <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->evaluacion270_1)) }}
                        </td>
                        <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->evaluacion270_2)) }}
                        </td>
                        <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->evaluacion270_3)) }}
                        </td>
                        <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->evaluacion270_4)) }}
                        </td>
                        <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->evaluacion270_5)) }}
                        </td>
                        <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->evaluacion270_6)) }}
                        </td>
                        <td class="border border-gray-300">
                            {{ $this->camposNull($this->apiObtn($check,$l->evaluacion270_7)) }}
                        </td> --}}
                    </tr>
                @empty
                
                    <tr>
                        <td>
                            <legend class="text-center">Esta vacio</legend>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>