<form wire:submit.prevent="triggerConfirm">

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="#" method="POST">
            <div class="overflow-hidden shadow sm:rounded-md">

                <div class="px-4 py-5 bg-white sm:p-6">

                    <div class="grid mt-2 mb-4 font-sans text-2xl font-semibold sm:subpixel-antialiased">
                        <h2>Datos personales</h2>
                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputNoColaborador" class="block text-sm font-medium text-gray-700">No.
                                Colaborador</label>
                            <input type="text" wire:model="no_colaborador" name="no_colaborador" id="inputNoColaborador"
                                value="{{ old('no_colaborador') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('no_colaborador')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputNombre" class="block text-sm font-medium text-gray-700">Nombre(s)</label>
                            <input type="text" wire:model="nombre" name="nombre" id="inputNombre"
                                value="{{ old('nombre') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('nombre')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputApPaterno" class="block text-sm font-medium text-gray-700">Apellido
                                Paterno</label>
                            <input type="text" wire:model="ap_paterno" name="ap_paterno" id="inputApPaterno"
                                value="{{ old('ap_paterno') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('ap_paterno')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputApMaterno" class="block text-sm font-medium text-gray-700">Apellido
                                Materno</label>
                            <input type="text" wire:model="ap_materno" name="ap_materno" id="inputApMaterno"
                                value="{{ old('ap_materno') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('ap_materno')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputGenero" class="block text-sm font-medium text-gray-700">Genero</label>
                            <select id="inputGenero" wire:model="genero" name="genero"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if ($generos)
                                    @foreach ($generos as $genero)
                                        <option value="{{ $genero->id }}">{{ $genero->nombre_genero }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('genero')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputFechaNacimiento" class="block text-sm font-medium text-gray-700">Fecha de
                                nacimiento</label>
                            <input wire:model="fecha_nacimiento" name="fecha_nacimiento" id="inputFechaNacimiento"
                                type="date" value="{{ old('fecha_nacimiento') }}" min="1961-08-29" max=""
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('fecha_nacimiento')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="edoCivil" class="block text-sm font-medium text-gray-700">Estado civil</label>
                            <select wire:model="estado_civil" id="edoCivil" name="edoCivil"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if ($estadosCivil)
                                    @foreach ($estadosCivil as $estadoCivil)
                                        <option value="{{ $estadoCivil->id }}">{{ $estadoCivil->nombre_estado }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('estado_civil')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputHijos" class="block text-sm font-medium text-gray-700">¿Tiene
                                Hijos?</label>
                            <select wire:model="paternidad" id="inputHijos" name="paternidad"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                            @error('paternidad')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    {{-- Tabla Hijos --}}
                    <div id="tablaHijos" class="grid mt-4 mb-4" @if (($paternidad == '') | ($paternidad == '0')) style="display: none" @else @endif>

                        <div class="block mb-3 text-sm font-medium text-gray-700">
                            <h5>Hijo(s)</h5>
                        </div>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                        <table name="tablaHijos" class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50" id="th_hijos">
                                                <tr class="">
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Edad</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Escolaridad</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_hijos">
                                                <tr>
                                                    <td><input type="text" wire:model="edad_hijo1"
                                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>

                                                    <td>
                                                        <select id="escolaridad_hijo" wire:model="escolaridad_hijo1"
                                                            name="escolaridad_hijo[]"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value=""></option>
                                                            <option value="1">Jardín de niños</option>
                                                            <option value="2">Primaria</option>
                                                            <option value="3">Secundaria</option>
                                                            <option value="4">Preparatoria</option>
                                                            <option value="5">Universidad</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" wire:model="edad_hijo2"
                                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>

                                                    <td>
                                                        <select wire:model="escolaridad_hijo2"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value=""></option>
                                                            <option value="1">Jardín de niños</option>
                                                            <option value="2">Primaria</option>
                                                            <option value="3">Secundaria</option>
                                                            <option value="4">Preparatoria</option>
                                                            <option value="5">Universidad</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" wire:model="edad_hijo3"
                                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>

                                                    <td>
                                                        <select wire:model="escolaridad_hijo3"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value=""></option>
                                                            <option value="1">Jardín de niños</option>
                                                            <option value="2">Primaria</option>
                                                            <option value="3">Secundaria</option>
                                                            <option value="4">Preparatoria</option>
                                                            <option value="5">Universidad</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" wire:model="edad_hijo4"
                                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>

                                                    <td>
                                                        <select wire:model="escolaridad_hijo4"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value=""></option>
                                                            <option value="1">Jardín de niños</option>
                                                            <option value="2">Primaria</option>
                                                            <option value="3">Secundaria</option>
                                                            <option value="4">Preparatoria</option>
                                                            <option value="5">Universidad</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" wire:model="edad_hijo5"
                                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>

                                                    <td>
                                                        <select wire:model="escolaridad_hijo5"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value=""></option>
                                                            <option value="1">Jardín de niños</option>
                                                            <option value="2">Primaria</option>
                                                            <option value="3">Secundaria</option>
                                                            <option value="4">Preparatoria</option>
                                                            <option value="5">Universidad</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" wire:model="edad_hijo6"
                                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>

                                                    <td>
                                                        <select wire:model="escolaridad_hijo6"
                                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            <option value=""></option>
                                                            <option value="1">Jardín de niños</option>
                                                            <option value="2">Primaria</option>
                                                            <option value="3">Secundaria</option>
                                                            <option value="4">Preparatoria</option>
                                                            <option value="5">Universidad</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                        <div class="col-span-1 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700" for="inputCurp">CURP</label>
                            <input type="text" wire:model="curp" name="curp" id="inputCurp" value="{{ old('curp') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('curp')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700" for="inputRfc">RFC</label>
                            <input type="text" wire:model="rfc" name="rfc" id="inputRfc" value="{{ old('rfc') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('rfc')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div class="col-span-2 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700" for="inputNo_seguro_docial">No.
                                Seguro
                                Social</label>
                            <input type="text" wire:model="no_seguro_social" name="no_seguro_social"
                                id="inputno_seguro_social" value="{{ old('no_seguro_social') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('no_seguro_social')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                        <div class="col-span-1 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700"
                                for="inputDomicilio">Domicilio</label>
                            <input type="text" wire:model="domicilio" name="domicilio" id="inputDomicilio"
                                value="{{ old('domicilio') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('domicilio')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-span-1 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700"
                                for="inputMunicipio">Municipio</label>
                            <input type="text" wire:model="municipio" name="municipio" id="inputMunicipio"
                                value="{{ old('municipio') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('municipio')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-span-1 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700" for="inputEstado">Estado</label>
                            <input type="text" wire:model="estado" name="estado" id="inputEstado"
                                value="{{ old('estado') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('estado')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-span-1 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700" for="inputCodigoPostal">Código
                                Postal</label>
                            <input type="text" wire:model="codigo_postal" name="codigo_postal" id="inputCodigoPostal"
                                value="{{ old('codigo_postal') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('codigo_postal')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputTipoCol" class="block text-sm font-medium text-gray-700">Tipo de
                                Colaborador</label>
                            <select id="inputTipoCol" wire:model="tipo_colaborador" name="tipo_colaborador"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if ($tiposColaborador)
                                    @foreach ($tiposColaborador as $tipoColaborador)
                                        <option value="{{ $tipoColaborador->id }}">
                                            {{ $tipoColaborador->nombre_tipo }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('tipo_colaborador')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputTurno" class="block text-sm font-medium text-gray-700">Turno del
                                Colaborador</label>
                            <select id="inputTurno" wire:model="turno" name="turno"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if ($turnos)
                                    @foreach ($turnos as $turno)
                                        <option value="{{ $turno->id }}">{{ $turno->nombre_turno }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('turno')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputCorreo" class="block text-sm font-medium text-gray-700">Correo</label>
                            <input type="email" wire:model="correo" name="correo" id="inputCorreo"
                                value="{{ old('correo') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('correo')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputRuta" class="block text-sm font-medium text-gray-700">Ruta de
                                Transporte</label>
                            <select id="inputRuta" wire:model="ruta_transporte" name="ruta"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if ($rutas)
                                    @foreach ($rutas as $ruta)
                                        <option value="{{ $ruta->id }}">{{ $ruta->nombre_ruta }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('ruta_transporte')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                        <div class="col-span-1 sm:col-span-1">
                            <label for="selectNivel" class="block text-sm font-medium text-gray-700">Puesto</label>
                            <select id="selectNivel" wire:model="puesto" name="puesto"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if (isset($puestos))
                                    @foreach ($puestos as $puesto)
                                        <option value="{{ $puesto->id }}">{{ $puesto->nombre_nivel }}
                                            {{ $puesto->especialidad_puesto }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('puesto')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="selectArea" class="block text-sm font-medium text-gray-700">Area</label>
                            <select id="selectArea" wire:model="area" name="area"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if (isset($areas))
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                    @endforeach
                                @endif

                            </select>
                            @error('area')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="selectSupervisor" class="block text-sm font-medium text-gray-700">Jefe
                                Directo</label>
                            <select id="selectSupervisor" wire:model="jefe_directo" name="supervisor"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value=""></option>
                                <option value="1">Ninguno</option>
                                @if (isset($supervisores))
                                    @foreach ($supervisores as $supervisor)
                                        <option value="{{ $supervisor->no_colaborador }}">
                                            {{ $supervisor->nombre }}
                                            {{ $supervisor->ap_paterno }} {{ $supervisor->ap_materno }}
                                        </option>

                                    @endforeach
                                @endif

                            </select>
                            @error('jefe_directo')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputTelFijo" class="block text-sm font-medium text-gray-700">Teléfono
                                Fijo</label>
                            <input type="text" wire:model="tel_fijo" name="tel_fijo"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="inputTelFijo" value="{{ old('tel_fijo') }}">
                            @error('tel_fijo')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputTelMovil" class="block text-sm font-medium text-gray-700">Teléfono
                                Móvil</label>
                            <input type="text" wire:model="tel_movil" name="tel_movil"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="inputTelMovil" value="{{ old('tel_movil') }}">
                            @error('tel_movil')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputTelRecados" class="block text-sm font-medium text-gray-700">Teléfono para
                                Recados</label>
                            <input type="text" wire:model="tel_recados" name="tel_recados"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="inputTelRecados" value="{{ old('tel_recados') }}">
                            @error('tel_recados')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputExtension"
                                class="block text-sm font-medium text-gray-700">Extensión</label>
                            <select id="inputExtension" wire:model="extension" name="extension"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if (isset($extensiones))
                                    @foreach ($extensiones as $ext)
                                        <option value="{{ $ext->id }}">{{ $ext->numero_extension }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('extension')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputClaveRadio" class="block text-sm font-medium text-gray-700">Clave de
                                Radio</label>
                            <select id="inputClaveRadio" wire:model="clave_radio" name="clave_radio"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if (isset($clavesRadio))
                                    @foreach ($clavesRadio as $clave)
                                        <option value="{{ $clave->id }}">{{ $clave->clave }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('clave_radio')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    {{-- Inicio tabla contactos emergencia --}}
                    <div class="grid mt-4 mb-4">

                        <div class="block mb-3 text-sm font-medium text-gray-700">
                            <h5>Contactos de emergencia</h5>
                        </div>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                        <table name="tablaContactos" class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-100" id="th_contactos">
                                                <tr class="">
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Nombre</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Parentesco</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Teléfono</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Domicilio</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_contactos">
                                                <tr>
                                                    <td><input type="text" wire:model="nombre_contacto1"
                                                            id="nombre_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        @error('nombre_contacto1')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </td>
                                                    <td><input type="text" wire:model="parentesco_contacto1"
                                                            id="parentesco_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        @error('parentesco_contacto1')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </td>
                                                    <td><input type="text" wire:model="telefono_contacto1"
                                                            id="telefono_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        @error('telefono_contacto1')
                                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </td>
                                                    <td><input type="text" wire:model="domicilio_contacto1"
                                                            id="domicilio_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            @error('domicilio_contacto1')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic" >
                                    {{$message}}
                                </p>
                            @enderror
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" wire:model="nombre_contacto2"
                                                            id="nombre_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="parentesco_contacto2"
                                                            id="parentesco_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="telefono_contacto2"
                                                            id="telefono_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="domicilio_contacto2"
                                                            id="domicilio_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" wire:model="nombre_contacto3"
                                                            id="nombre_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="parentesco_contacto3"
                                                            id="parentesco_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="telefono_contacto3"
                                                            id="telefono_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="domicilio_contacto3"
                                                            id="domicilio_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" wire:model="nombre_contacto4"
                                                            id="nombre_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="parentesco_contacto4"
                                                            id="parentesco_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="telefono_contacto4"
                                                            id="telefono_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    <td><input type="text" wire:model="domicilio_contacto4"
                                                            id="domicilio_contacto"
                                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- Fin tabla contactos emergencia --}}

                    <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputMatriculacion"
                                class="block text-sm font-medium text-gray-700">Matriculación</label>
                            <select id="inputMatriculacion" wire:model="matriculacion" name="matriculacion"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                            @error('matriculacion')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic" >
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputTipoUsuario" class="block text-sm font-medium text-gray-700">Tipo de
                                Usuario</label>
                            <select id="inputTipoUsuario" wire:model="tipo_usuario" name="tipo_usuario"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if (isset($tiposUsuario))
                                    @foreach ($tiposUsuario as $tipoUsuario)
                                        <option value="{{ $tipoUsuario->id }}">{{ $tipoUsuario->nombre_tipo }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('tipo_usuario')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic" >
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputPassword"
                                class="block text-sm font-medium text-gray-700">Contraseña</label>
                            <input type="text" wire:model="password" name="password" id="inputPassword"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('password') }}">
                                @error('password')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic" >
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-1 sm:col-span-1">
                            <label for="inputFechaIngreso" class="block text-sm font-medium text-gray-700">Fecha de
                                ingreso</label>
                            <input wire:model="fecha_ingreso" name="fecha_ingreso" id="inputFechaIngreso" type="date"
                                value="{{ old('fecha_ingreso') }}" min="1961-08-29" max=""
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('fecha_ingreso')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic" >
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid mt-4 mb-4">

                        <div class="col-span-2 sm:col-span-2">
                            <label
                                class="flex flex-col items-center px-4 py-6 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Seleccionar una Fotografía</span>
                                <input type='file' wire:model="foto" class="hidden" />
                            </label>
                            @error('foto')
                                <p class="mt-1 mb-1 text-sm text-red-600 italic" >
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <button wire:click="triggerConfirm" type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Registrar colaborador
                    </button>
                </div>
            </div>
        </form>
    </div>
</form>

{{-- Modifica el valor maximo del input date fecha_ingreso --}}

<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_ingreso")[0].setAttribute('max', today);

</script>

{{-- Modifica el valor minimo del input date fecha_ingreso --}}

<script>
    var after = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_ingreso")[0].setAttribute('min', '1969-08-29');

</script>

{{-- Modifica el valor minimo del input date fecha_nacimiento --}}

<script>
    var fnMax = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_nacimiento")[0].setAttribute('max', '2003-01-01');

</script>

{{-- Modifica el valor minimo del input date fecha_nacimiento --}}

<script>
    var fnMin = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_nacimiento")[0].setAttribute('min', '1950-01-01');

</script>

{{-- Funcion para agregar una fila a la tabla Hijos --}}

{{-- <script>
    $("#th_hijos").on('click', '.addHijo', function() {
        var tr = '<tr>' +
            '<td><input type="text" ' +
            'class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></td>' +

            '<td>' +
            '<select class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">' +
            '<option value="1">Jardín de niños</option>' +
            '<option value="2">Primaria</option>' +
            '<option value="3">Secundaria</option>' +
            '<option value="4">Preparatoria</option>' +
            '<option value="5">Universidad</option>' +
            '</select>' +
            '</td>' +

            '<th class="text-center"><a href="javascript:;" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm deleteHijo hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">-</a></th>' +
            '</tr>';

        $("#tb_hijos").append(tr);
    });

    $("#tb_hijos").on('click', '.deleteHijo', function() {
        var ultimo = $('#tb_hijos tr').length;
        $(this).parent().parent().remove();

    });

</script> --}}

{{-- Funcion para agregar una fila a la tabla Contactos --}}

{{-- <script>
    $("#th_contactos").on('click', '.addContacto', function() {
        var tr2 =

            '<tr>' +
            '<td><input type="text" name="nombre_contacto[]" id="nombre_contacto" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></td>' +
            '<td><input type="text" name="parentesco_contacto[]" id="parentesco_contacto" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></td>' +
            '<td><input type="text" name="telefono_contacto[]" id="telefono_contacto" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></td>' +
            '<td><input type="text" name="domicilio_contacto[]" id="domicilio_contacto" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></td>' +
            '<td class="text-center"><a href="javascript:;" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm deleteHijo hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 deleteContacto">-</a></td>' +
            '</tr>'

        $("#tb_contactos").append(tr2);
    });

    $("#tb_contactos").on('click', '.deleteContacto', function() {
        var ultimo = $('#tb_contactos tr').length;
        $(this).parent().parent().remove();

    });

</script> --}}


{{-- Mostrar la tabla Hijos --}}

{{-- <script>
    $(function() {

        $("#inputHijos").on('change', function() {

            var selectValue = $(this).val();
            switch (selectValue) {

                case "0":
                    $("#tablaHijos").hide();
                    break;

                case "1":
                    $("#tablaHijos").show();
                    break;

            }

        }).change();

    });

</script> --}}
