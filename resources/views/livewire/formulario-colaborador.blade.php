<div class="mt-5 md:mt-0 md:col-span-2">
    <form action="#" method="POST">
        <div class="overflow-hidden shadow sm:rounded-md">

            <div class="px-4 py-5 bg-white sm:p-6">

                <div class="grid mt-2 mb-4 font-sans text-2xl font-semibold sm:subpixel-antialiased">
                    <h2>Datos personales</h2>
                </div>

                <div class="grid grid-cols-4 gap-4 mt-4 mb-4">
                    <div class="col-span-1 sm:col-span-1">
                        <input type="file" name="foto" id="customFile">
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                    <div class="col-span-1 sm:col-span-1">
                        <label for="inputNoColaborador" class="block text-sm font-medium text-gray-700">No.
                            Colaborador</label>
                        <input type="text" name="no_colaborador" id="inputNoColaborador"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-1 sm:col-span-1">
                        <label for="inputNombre" class="block text-sm font-medium text-gray-700">Nombre(s)</label>
                        <input type="text" name="nombre" id="inputNombre"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-1 sm:col-span-1">
                        <label for="inputApPaterno" class="block text-sm font-medium text-gray-700">Apellido
                            Paterno</label>
                        <input type="text" name="ap_paterno" id="inputApPaterno"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-1 sm:col-span-1">
                        <label for="inputApMaterno" class="block text-sm font-medium text-gray-700">Apellido
                            Materno</label>
                        <input type="text" name="ap_materno" id="inputApMaterno"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                    <div class="col-span-1 sm:col-span-1">
                        <label for="inputGenero" class="block text-sm font-medium text-gray-700">Genero</label>
                        <select id="inputGenero" name="genero"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                            <option value="3">No Binario</option>
                        </select>
                    </div>

                    <div class="col-span-1 sm:col-span-1">
                        <label for="inputFechaNacimiento" class="block text-sm font-medium text-gray-700">Fecha de
                            nacimiento</label>
                        <input name="fecha_nacimiento" id="inputFechaNacimiento" type="date"
                            autocomplete="street-address" min="1961-08-29" max=""
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    {{-- <div class="col-span-1 sm:col-span-1">
                        <label for="email_address" class="block text-sm font-medium text-gray-700">Email
                            address</label>
                        <input type="text" name="email_address" id="email_address" autocomplete="email"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div> --}}

                    <div class="col-span-1 sm:col-span-1">
                        <label for="edoCivil" class="block text-sm font-medium text-gray-700">Estado civil</label>
                        <select id="edoCivil" name="edoCivil"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="1">Soltero(a)</option>
                            <option value="2">Casado(a)</option>
                            <option value="3">Unión Libre</option>
                        </select>
                    </div>

                    <div class="col-span-1 sm:col-span-1">
                        <label for="inputHijos" class="block text-sm font-medium text-gray-700">¿Tiene Hijos?</label>
                        <select id="inputHijos" name="paternidad" autocomplete="country"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>

                </div>
                {{-- Tabla Hijos --}}
                <div id="tablaHijos" class="grid mt-4 mb-4">

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
                                                <th scope="col" class="relative px-6 py-3 ">
                                                    <a href="javascript:;"
                                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 addHijo">+</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb_hijos">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-4 mt-4 mb-4">

                    <div class="col-span-1 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-700" for="inputDomicilio">Domicilio</label>
                        <input type="text" name="domicilio" id="inputDomicilio"
                            value="{{ isset($datosColaborador->domicilio) ? $datosColaborador->domicilio : old('domicilio') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="col-span-1 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-700" for="inputMunicipio">Municipio</label>
                        <input type="text" name="municipio" id="inputMunicipio"
                            value="{{ isset($datosColaborador->municipio) ? $datosColaborador->municipio : old('municipio') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="col-span-1 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-700" for="inputEstado">Estado</label>
                        <input type="text" name="estado" id="inputEstado"
                            value="{{ isset($datosColaborador->estado) ? $datosColaborador->estado : old('estado') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="col-span-1 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-700" for="inputCodigoPostal">Código Postal</label>
                        <input type="text" name="codigo_postal" id="inputCodigoPostal"
                            value="{{ isset($datosColaborador->codigo_postal) ? $datosColaborador->codigo_postal : old('codigo_postal') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

            </div>
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Registrar colaborador
                </button>
            </div>
        </div>
    </form>
</div>

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

<script>
    $("#th_hijos").on('click', '.addHijo', function() {
        var tr = '<tr>' +
            '<td><input type="text" name="edad_hijo[]" id="edad_hijo"' +
            'class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm""></td>' +

            '<td>' +
            '<select id="escolaridad_hijo" name="escolaridad_hijo[]" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">' +
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

</script>


{{-- Mostrar la tabla Hijos --}}

<script>
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

</script>
