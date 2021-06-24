<div class="sm:p-8 p-2 mx-auto bg-gray-100">
    <header class="bg-white rounded-md shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-xl text-center font-semibold leading-tight text-red-700">
                ACTUALIZACION DE DATOS
            </h2>
        </div>
    </header>

    <form wire:submit.prevent="triggerConfirm" enctype="multipart/form-data">
        <div class="p-4 grid grid-rows-1 rounded-md shadow-2xl">
            <div class="p-4 grid">
                <div class="mt-4 mb-4 bg-red-800 rounded-md">
                    <p class="text-center text-gray-50 text-xl">
                        Datos demográficos
                    </p>
                </div>
                <div class="grid gap-2">
                    <div class="sm:grid row-start-1 grid-cols-4 gap-2">
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                            <label class="block text-sm font-medium text-gray-700"
                                for="inputDireccion">Dirección</label>
                            <input type="text" wire:model="direccion" name="direccion" id="inputDireccion"
                                value="{{ old('direccion') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('direccion')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                            <label class="block text-sm font-medium text-gray-700" for="inputColonia">Colonia</label>
                            <input type="text" wire:model="colonia" name="colonia" id="inputColonia"
                                value="{{ old('colonia') }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('colonia')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
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
                        <div class="mb-2 sm:m-0 col-span-1 col-start-4">
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
                    </div>
                    <div class="sm:grid row-start-2 grid-cols-4 gap-2">
                        <div class="mb-2 sm:m-0 col-span-1 col-start-1">
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
                        <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                            <label for="inputGenero" class="block text-sm font-medium text-gray-700">Genero</label>
                            <select id="inputGenero" wire:model="genero" name="genero"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if ($generos)
                                @foreach ($generos as $genero)
                                    @if ($genero === $genero->id)
                                        <option value="{{ $genero->id }}" selected>{{ $genero->nombre_genero }}</option>
                                    @endif
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
                        <div class="mb-2 sm:m-0 col-span-1 col-start-3">
                            <label for="edoCivil" class="block text-sm font-medium text-gray-700">Estado civil</label>
                            <select wire:model="estado_civil" id="edoCivil" name="edoCivil"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                @if ($estadosCivil)
                                    @foreach ($estadosCivil as $estadoCivil)
                                        @if ($estado_civil === $estadoCivil->id)
                                            <option value="{{ $estadoCivil->id }}" selected>{{ $estadoCivil->nombre_estado }}</option>
                                        @else
                                            <option value="{{ $estadoCivil->id }}">{{ $estadoCivil->nombre_estado }}
                                            </option>
                                        @endif
                                        
                                    @endforeach
                                @endif
                            </select>
                            @error('estado_civil')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2 sm:m-0 col-span-1 col-start-4">
                            <label for="inputHijos" class="block text-sm font-medium text-gray-700">¿Tiene
                                Hijos?</label>
                            <select wire:model="paternidad" id="inputHijos" name="paternidad"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                               @foreach ($paternidadArray as $pA)
                                   @if ($paternidad === $pA)
                                       <option value="{{ $pA['id'] }}" selected>{!! $pA['nom'] !!}</option>
                                   @else
                                        <option value="{{ $pA['id'] }}">{!! $pA['nom'] !!}</option>
                                   @endif
                               @endforeach
                            </select>
                            @error('paternidad')
                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row-start-3">
                        <div id="tablaHijos" class="grid mt-4 mb-4" @if (($paternidad=='' ) | ($paternidad=='0' ))
                            style="display: none" @else @endif>

                            <div class="mt-4 mb-4 bg-red-800 rounded-md">
                                <p class="text-center text-gray-50 text-xl">
                                    Hijo(s)
                                </p>
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
                                        
                                        @if ($permisoSubiractas2 == true)
                                        <div class="h-18 p-4 opacity-50">
                                            <label class="text-center block text-sm font-medium text-gray-700">Desabilitado debido a que ya contamos con la acta de su hijo(s)</label>
                                            <label
                                                class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                </svg>
                                                <input type='file' wire:model="actasNacimientoHijo" accept=".pdf" disabled class="hidden" multiple   
                                                    />
                                            </label>
                                        </div>
                                        @else
                                            <div class="h-18 p-4">
                                                <label class="text-center block text-sm font-medium text-gray-700">Sube aqui la acta de nacimiento de tu hijo(s)</label>
                                                <label
                                                    class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                    </svg>
                                                    <input type='file' wire:model="actasNacimientoHijo" accept=".pdf" class="hidden"  multiple   
                                                        />
                                                </label>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="mt-4 mb-4 bg-red-800 rounded-md">
                    <p class="text-center text-gray-50 text-xl">
                        Datos de Contacto
                    </p>
                </div>
                <div class="sm:grid grid-cols-4 gap-2">
                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
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
                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
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
                    <div class="mb-2 sm:m-0 col-span-1 col-start-3">
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
                    <div class="mb-2 sm:m-0 col-span-1 col-start-4">
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
                </div>
                <div class="mt-4 mb-4 bg-red-800 rounded-md ">
                    <p class="text-center text-gray-50 text-xl">
                        Contactos de Emergencia
                    </p>
                </div>
                <div class="grid grid-rows-3 gap-2">
                    <div class="grid grid-rows-1 row-start-1 gap-2">
                        <div class="grid grid-rows-1">
                            <div class="row-start-1 text-gray-700 mb-4">
                                <p>Contacto 1</p>
                            </div>
                            <div class="row-start-2 gap-2">
                                <div class="grid row-start-1 grid-cols-2 gap-2">
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="nombre_contacto"
                                            class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                        <input type="text" wire:model="nombre_contacto1" id="nombre_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('nombre_contacto1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="parentesco_contacto"
                                            class="block text-sm font-medium text-gray-700">Parentesco</label>
                                        <input type="text" wire:model="parentesco_contacto1" id="parentesco_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('parentesco_contacto1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid row-start-2 grid-cols-2 gap-2">
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="telefono_contacto"
                                            class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <input type="text" wire:model="telefono_contacto1" id="telefono_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('telefono_contacto1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="domicilio_contacto"
                                            class="block text-sm font-medium text-gray-700">Domicilio</label>
                                        <input type="text" wire:model="domicilio_contacto1" id="domicilio_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('domicilio_contacto1')
                                        <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-rows-1 row-start-2 gap-2">
                        <div class="grid grid-rows-1">
                            <div class="row-start-1 text-gray-700 mb-4">
                                <p>Contacto 2</p>
                            </div>
                            <div class="row-start-2 gap-2">
                                <div class="grid row-start-1 grid-cols-2 gap-2">
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="nombre_contacto"
                                            class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                        <input type="text" wire:model="nombre_contacto2" id="nombre_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="parentesco_contacto"
                                            class="block text-sm font-medium text-gray-700">Parentesco</label>
                                        <input type="text" wire:model="parentesco_contacto2" id="parentesco_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                                <div class="grid row-start-2 grid-cols-2 gap-2">
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="telefono_contacto"
                                            class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <input type="text" wire:model="telefono_contacto2" id="telefono_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="domicilio_contacto"
                                            class="block text-sm font-medium text-gray-700">Domicilio</label>
                                        <input type="text" wire:model="domicilio_contacto2" id="domicilio_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-rows-1 row-start-3 gap-2">
                        <div class="grid grid-rows-1">
                            <div class="row-start-1 text-gray-700 mb-4">
                                <p>Contacto 3</p>
                            </div>
                            <div class="row-start-2 gap-2">
                                <div class="grid row-start-1 grid-cols-2 gap-2">
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="nombre_contacto"
                                            class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                        <input type="text" wire:model="nombre_contacto3" id="nombre_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="parentesco_contacto"
                                            class="block text-sm font-medium text-gray-700">Parentesco</label>
                                        <input type="text" wire:model="parentesco_contacto3" id="parentesco_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                                <div class="grid row-start-2 grid-cols-2 gap-2">
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="telefono_contacto"
                                            class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <input type="text" wire:model="telefono_contacto3" id="telefono_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="domicilio_contacto"
                                            class="block text-sm font-medium text-gray-700">Domicilio</label>
                                        <input type="text" wire:model="domicilio_contacto3" id="domicilio_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-rows-1 row-start-4 gap-2">
                        <div class="grid grid-rows-1">
                            <div class="row-start-1 text-gray-700 mb-4">
                                <p>Contacto 4</p>
                            </div>
                            <div class="row-start-2 gap-2">
                                <div class="grid row-start-1 grid-cols-2 gap-2">
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="nombre_contacto"
                                            class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                        <input type="text" wire:model="nombre_contacto4" id="nombre_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="parentesco_contacto"
                                            class="block text-sm font-medium text-gray-700">Parentesco</label>
                                        <input type="text" wire:model="parentesco_contacto4" id="parentesco_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                                <div class="grid row-start-2 grid-cols-2 gap-2">
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-1">
                                        <label for="telefono_contacto"
                                            class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <input type="text" wire:model="telefono_contacto4" id="telefono_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="mb-2 sm:m-0 col-span-1 col-start-2">
                                        <label for="domicilio_contacto"
                                            class="block text-sm font-medium text-gray-700">Domicilio</label>
                                        <input type="text" wire:model="domicilio_contacto4" id="domicilio_contacto"
                                            class="block w-full mt-1 mb-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($permisoSubircomprobante2===true)
                <div class="mt-2">
                    <label class="text-center block text-sm font-medium opacity-50 text-gray-700">Desabilitado debido a que ya contamos con su comprobante de domicilio</label>
                </div>
                <div class="h-16 p-4 opacity-50">
                    <label
                        class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                        <input type='file' name="comprobante" id="comprobante" wire:model="comprobante" disabled accept=".pdf" class="hidden"/>
                    </label>
                </div>
            @else
                <div class="mt-2">
                    <label class="text-center block text-sm font-medium text-gray-700">Sube aqui tu comprobante de domicilio</label>
                </div>
                <div class="h-16 p-4">
                    <label
                        class="flex flex-col my-auto items-center px-4 py-2 mt-1 tracking-wide text-blue-800 uppercase bg-white border border-blue-600 rounded-lg shadow-lg cursor-pointer w-68 hover:bg-blue-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                        <input type='file' name="comprobante" id="comprobante" wire:model="comprobante" accept=".pdf" class="hidden"/>
                    </label>
                </div>
            @endif
            <div class="h-16 p-4 grid grid-cols-2">
                <div class="flex justify-start px-2 col-span-1 col-start-1">
                    <a href="https://factoraguila.com"
                        class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Regresar</a>
                </div>
                <div class="flex justify-end px-2 col-span-1 col-start-2">
                    <button type="submit" wire:model="triggerConfirm"
                        class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 active:bg-red-900 focus:outline-none focus:border-green-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Actualizar</button>
                </div>
            </div>
        </div>
    </form>

</div>