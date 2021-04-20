<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>

<style>
    .header {
        text-align: justify;
        text-justify: inter-word;
        padding-left: 10%;
        padding-right: 10%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 80%;
    }

    .title {
        margin-left: 10%;
        margin-right: 10%;
        border-style: solid;
        border-width: 1px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 90%;
    }

    .negrita {
        font-weight: bold;
    }

    .t-letra {
        font-size: 90%;
    }

    .margen-estandar {
        margin-left: 10%;
        margin-right: 10%;
    }

    .arial {
        font-family: Arial, Helvetica, sans-serif;
    }

    .f-size {
        font-size: 87.2%;
    }

    .just {
        text-align: justify;
        text-justify: inter-word;
    }

    .tab {
        display: inline-block;
        margin-left: 43px;
    }
</style>

<body>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <br>
    <div class="page-break" style="margin-left: 5%;">
        <div class="header">
            <p style="font-size: 105%;">
                CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DETERMINADO QUE CELEBRAN POR UNA PARTE INDUSTRIAS TECNOS, S.A.
                DE C.V., REPRESENTADA POR EL <b>LIC. EDUARDO SALVADOR YÁÑEZ PONCE DE LEÓN</b>, A QUIEN SE LE DENOMINARÁ
                PARA
                EFECTOS DE ESTE CONTRATO COMO "EL PATRÓN" O "EMPRESA", Y POR LA OTRA PARTE
                <b>{{ strtoupper($datosContrato[0]->nombre) }} {{ strtoupper($datosContrato[0]->ap_paterno) }}
                    {{ strtoupper($datosContrato[0]->ap_materno) }}</b> A QUIEN SE LE DENOMINARÁ EN LO SUCESIVO COMO "EL
                TRABAJADOR", ESTABLECIENDO LAS PARTES LAS DECLARACIONES Y CLÁUSULAS QUE INTEGRAN EL PRESENTE CONTRATO EN
                EL TENOR SIGUIENTE:
            </p>
        </div>
        <p></p>
        <div class="title">
            <b>DECLARACIONES</b>
        </div>
        <br>
        <div class="f-size"
            style="margin-right: 10%; margin-left:17%; font-family: Arial, Helvetica, sans-serif; font-size: 92%;">
            <a>Declara el </a><a class="negrita t-letra">PATRÓN:</a>
        </div>
        <div class="just">
            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%;">
                <span class="tab"></span>
                <a class="negrita">I.- </a>Ser una Sociedad Anónima de Capital Variable
                constituida con fecha 17 de abril del año 1978 mediante escritura pública numero 50642 otorgada por el
                señor
                licenciado Mario D. Reynoso, notario público de la Propiedad y Comercio del Estado de Morelos, bajo el
                No. 63 a fojas 267 del Tomo No. XXVII, Volumen 1°, 2° Auxiliar de Comercio de Fecha 28 de abril de
                1978.
            </p>

            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%;">
                <span class="tab"></span>
                <a class="negrita">II.- </a>Tener como <a class="negrita">DOMICILIO </a>del centro de trabajo el
                ubicado en
                <a class="negrita">KILOMETRO 6 DE LA CARRETERA</a>
                CUERNAVACA A
                TEPOZTLÁN EN AHUATEPEC, CUERNAVACA MORELOS</a> <a>, único lugar del Centro de trabajo.</a>
            </p>

            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%; margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">III.- </a>Estar registrado ante la <a class="negrita">SECRETARIA DE HACIENDA Y
                    CRÉDITO PÚBLICO,</a>
                con Registro Federal de Contribuyentes <a class="negrita">ITE810721DP3.</a>
            </p>

            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%; margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">IV.- </a>Conforme al objeto social, la función principal del
                <a class="negrita">PATRÓN </a>es la de fabricar, ensamblar, producir, comprar, vender, distribuir,
                importar, exportar y en general comerciar a cualquier
                título con cartuchos deportivos y armas de fuego deportivas de todas clases, tipos y calibres y con
                máquinas, aparatos, motores, artículos de metal y equipo industrial de todos tipos de clases y con las
                partes accesorios y aditamentos de dichos productos, etc.
            </p>

            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%; margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">V.- </a>Que es su voluntad el contratar los servicios del
                <a class="negrita">TRABAJADOR </a>y requiere sus servicios.
            </p>
        </div>
        <br>
        <div class="f-size"
            style="margin-right: 10%; margin-left:17%; font-family: Arial, Helvetica, sans-serif; font-size: 92%;">
            <a>Declara el </a><a class="negrita t-letra">TRABAJADOR:</a>
        </div>

        {{-- Falta ingresar nuevos datos a la BD --}}
        <div class="just">
            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%; margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">I.- </a>Ser de
                NACIONALIDAD <a class="negrita">MEXICANA</a>, con DOMICILIO ubicado en <b>C.</b>

                <a class="negrita">{{ strtoupper($datosContrato[0]->domicilio) }}</a>
                <a class="negrita">C.P.</a>
                <a class="negrita">{{ strtoupper($datosContrato[0]->codigo_postal) }}</a> con
                <a>CLAVE ÚNICA DE REGISTRO DE POBLACIÓN</a>
                <a class="negrita">{{ $datosContrato[0]->curp }}</a>, CON REGISTRO FEDERAL DE CONTRIBUYENTE
                <a class="negrita">{{ $datosContrato[0]->rfc }}</a> SEXO
                <a class="negrita">@if($datosContrato[0]->genero_id == 1)
                    <b>MASCULINO.</b>
                    @elseif($datosContrato[0]->genero_id == 2)
                    <b>FEMENINO.</b>
                    @else
                    <b>NO BINARIO.</b>
                    @endif</a>
            </p>
            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%; margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">II.- </a>
                Tener la capacidad física, mental para desempeñar el trabajo por el que se contrata por tiempo
                Determinado de acuerdo a
                las cláusulas pactadas.
            </p>
            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%; margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">III.- </a>
                Que es su voluntad celebrar el presente contrato por tiempo determinado atendiendo a la naturaleza de
                los servicios que
                se requieren y por los motivos que expresa el patrón y que a sus intereses personales así conviene el
                contrato por
                tiempo determinado.
            </p>
        </div>
    </div>
    {{-- Segunda hoja --}}
    <br>
    <div class="page-break" style="margin-left: 5%;">
        <div class="just">
            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%; margin-bottom:-0.5px;">
                <span class="tab"></span>
                Las partes celebran el presente contrato de trabajo conforme a lo dispuesto por el artículo 25 de la Ley
                Federal del
                Trabajo, en los siguientes términos y conforme a las siguientes:
            </p>
        </div>
        <p></p>
        <div class="title">
            <b>CLAUSULAS</b>
        </div>
        <br>
        <div class="just">
            <p class="arial" style="margin-right:10%; margin-left: 10%; font-size: 92%; margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">PRIMERA.- </a>El trabajador de NOMBRE
                <a class="negrita">{{ strtoupper($datosContrato[0]->nombre) }}
                    {{ strtoupper($datosContrato[0]->ap_paterno) }}
                    {{ strtoupper($datosContrato[0]->ap_materno) }}
                </a> de NACIONALIDAD
                <b>MEXICANA</b> de
                <a class="negrita">25</a> años de edad, ESTADO CIVIL
                <a class="negrita">@if($datosContrato[0]->estado_civil_id == 1)
                    SOLTERO
                    @elseif ($datosContrato[0]->estado_civil_id == 2)
                    CASADO
                    @else
                    UNION LIBRE
                    @endif</a>
                <a>con </a><b>DOMICILIO</b> en <b>C.</b>
                <a class="negrita">{{ strtoupper($datosContrato[0]->domicilio) }}</a>
                {{-- FALTAN VARIABLES --}}
                <a class="negrita">COL.</a>
                <a class="negrita">TETELPA, </a>
                <a class="negrita">C.P.</a>
                <a class="negrita">{{ strtoupper($datosContrato[0]->codigo_postal) }}</a>
                <a>SEXO</a>
                <a class="negrita">@if($datosContrato[0]->genero_id == 1)
                    <b>MASCULINO.</b>
                    @elseif($datosContrato[0]->genero_id == 2)
                    <b>FEMENINO.</b>
                    @else
                    <b>NO BINARIO.</b>
                    @endif
                </a>
                <a>celebra contrato de trabajo por</a>
                <b>tiempo Determinado</b>
                <a>con su patrón </a>
                <b>INDUSTRIAS TECNOS S.A. DE C.V. </b>
                <a>quien es una persona moral con actividad empresarial, cuya negociación tiene como objeto fabricar,
                    ensamblar, producir,
                    comprar, vender, distribuir, importar, exportar y en general comerciar a cualquier título con
                    cartuchos deportivos y
                    armas de fuego deportivas de todas clases, tipos y calibres y con máquinas, aparatos, motores,
                    artículos de metal y
                    equipo industrial de todos tipos de clases y con las partes accesorios y aditamentos de dichos
                    productos, etc; contrato
                    que se establece entre las partes por un periodo que abarca</a>
                {{-- FALTAN VARIABLES --}}
                <b>del 25 DE FEBRERO 2021</b>
                <b>al 30 DE MAYO DEL 2021</b>

            </p>
        </div>
    </div>
</body>

</html>