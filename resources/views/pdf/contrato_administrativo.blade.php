<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

    <link rel="stylesheet" href="public_path(storage/css/pdf.css)">
</head>

<style>
    @page {
        margin-bottom: 35px;
    }
    .header {
        text-align: justify;
        text-justify: inter-word;
        padding-left: 5%;
        padding-right: 5%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 80%;
    }

    .title {
        margin-left: 5%;
        margin-right: 5%;
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
        font-size: 92%;
    }

    .margen-estandar {
        margin-left: 5%;
        margin-right: 5%;
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

    .tab-2 {
        display: inline-block;
        margin-left: 21.5px;
    }

    .tab-3 {
        display: inline-block;
        margin-left: 10.75px;
    }

    .page-break {
        page-break-after: always;
    }

    .page-break-auto {
        page-break-after: auto;
    }
</style>

<body class="arial">
    <div class="page-break" style="margin-left: 5%;">
        <div class="header">
            <p style="font-size: 105%;">
                <a>CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO</a>
                @if($datosContrato[0]->tipo_contrato_id == 2)
                DETERMINADO
                @elseif($datosContrato[0]->tipo_contrato_id == 3)
                INDETERMINADO
                @endif
                <a>QUE CELEBRAN POR UNA PARTE INDUSTRIAS TECNOS, S.A.
                    DE C.V., REPRESENTADA POR EL</a> <b>LIC. EDUARDO SALVADOR Y????EZ PONCE DE LE??N</b>, A QUIEN SE LE
                DENOMINAR??
                PARA
                EFECTOS DE ESTE CONTRATO COMO "EL PATR??N" O "EMPRESA", Y POR LA OTRA PARTE
                <b>{{ mb_strtoupper($infoColaborador[0]->nombre_desc) }}</b> A
                QUIEN SE LE DENOMINAR?? EN LO SUCESIVO COMO "EL
                TRABAJADOR", ESTABLECIENDO LAS PARTES LAS DECLARACIONES Y CL??USULAS QUE INTEGRAN EL PRESENTE CONTRATO EN
                EL TENOR SIGUIENTE:
            </p>
        </div>
        <p></p>
        <div class="title">
            <b>DECLARACIONES</b>
        </div>
        <br>
        <div class="f-size"
            style="margin-right: 5%; margin-left:12%; font-family: Arial, Helvetica, sans-serif; font-size: 92%;">
            <a>Declara el </a><a class="negrita t-letra">PATR??N:</a>
        </div>
        <div class="just">
            <p class="arial margen-estandar t-letra">
                <span class="tab"></span>
                <a class="negrita">I.- </a>Ser una Sociedad An??nima de Capital Variable
                constituida con fecha 17 de abril del a??o 1978 mediante escritura p??blica numero 50642 otorgada por el
                se??or
                licenciado Mario D. Reynoso, notario p??blico de la Propiedad y Comercio del Estado de Morelos, bajo el
                No. 63 a fojas 267 del Tomo No. XXVII, Volumen 1??, 2?? Auxiliar de Comercio de Fecha 28 de abril de
                1978.
            </p>

            <p class="arial margen-estandar t-letra" style="">
                <span class="tab"></span>
                <a class="negrita">II.- </a>Tener como <a class="negrita">DOMICILIO </a>del centro de trabajo el
                ubicado en
                <a class="negrita">KILOMETRO 6 DE LA CARRETERA
                    CUERNAVACA A
                    TEPOZTL??N EN AHUATEPEC, CUERNAVACA MORELOS</a> <a>, ??nico lugar del Centro de trabajo.</a>
            </p>

            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">III.- </a>Estar registrado ante la <a class="negrita">SECRETARIA DE HACIENDA Y
                    CR??DITO P??BLICO,</a>
                con Registro Federal de Contribuyentes <a class="negrita">ITE810721DP3.</a>
            </p>

            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">IV.- </a>Conforme al objeto social, la funci??n principal del
                <a class="negrita">PATR??N </a>es la de fabricar, ensamblar, producir, comprar, vender, distribuir,
                importar, exportar y en general comerciar a cualquier
                t??tulo con cartuchos deportivos y armas de fuego deportivas de todas clases, tipos y calibres y con
                m??quinas, aparatos, motores, art??culos de metal y equipo industrial de todos tipos de clases y con las
                partes accesorios y aditamentos de dichos productos, etc.
            </p>

            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">V.- </a>Que es su voluntad el contratar los servicios del
                <a class="negrita">TRABAJADOR </a>y requiere sus servicios.
            </p>
        </div>
        <br>
        <div style="margin-right: 10%; margin-left:12%; font-family: Arial, Helvetica, sans-serif; font-size: 92%;">
            <a>Declara el </a><a class="negrita t-letra">TRABAJADOR:</a>
        </div>

        <div class="just">
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">I.- </a>Ser de
                NACIONALIDAD <a class="negrita">{{ mb_strtoupper($infoColaborador[0]->nacionalidad) }}</a>, con DOMICILIO
                ubicado en <b>Calle</b>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->domicilio) }},</a>

                <a class="negrita">COL.</a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->colonia) }},</a>

                <a class="negrita">MUNICIPIO DE </a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->municipio) }},</a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->estado) }},</a>

                <a class="negrita">C.P.</a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->codigo_postal) }}</a> con

                <a>CLAVE ??NICA DE REGISTRO DE POBLACI??N</a>
                <a class="negrita">{{ $datosContrato[0]->curp }},</a>
                <a>con REGISTRO FEDERAL DE CONTRIBUYENTE</a>
                <a class="negrita">{{ $datosContrato[0]->rfc }}</a> SEXO
                <a class="negrita">@if($datosContrato[0]->genero_id == 1)
                    <b>MASCULINO.</b>
                    @elseif($datosContrato[0]->genero_id == 2)
                    <b>FEMENINO.</b>
                    @else
                    <b>NO BINARIO.</b>
                    @endif</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">II.- </a>
                Tener la capacidad f??sica, mental para desempe??ar el trabajo por el que se contrata por tiempo
                @if($datosContrato[0]->tipo_contrato_id == 2)
                Determinado
                @elseif($datosContrato[0]->tipo_contrato_id == 3)
                Indeterminado
                @endif
                de acuerdo a
                las cl??usulas pactadas.
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">III.- </a>
                Que es su voluntad celebrar el presente contrato por tiempo
                @if($datosContrato[0]->tipo_contrato_id == 2)
                Determinado
                @elseif($datosContrato[0]->tipo_contrato_id == 3)
                Indeterminado
                @endif
                atendiendo a la naturaleza de
                los servicios que
                se requieren y por los motivos que expresa el patr??n y que a sus intereses personales as?? conviene el
                contrato por
                tiempo
                @if($datosContrato[0]->tipo_contrato_id == 2)
                Determinado.
                @elseif($datosContrato[0]->tipo_contrato_id == 3)
                Indeterminado.
                @endif
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                Las partes celebran el presente contrato de trabajo conforme a lo dispuesto por el art??culo 25 de la Ley
                Federal del
                Trabajo, en los siguientes t??rminos y conforme a las siguientes:
            </p>
        </div>
    </div>

    {{-- Segunda hoja --}}
    <br>

    <div class="page-break-auto" style="margin-left: 5%;">
        <div class="title">
            <b>CLAUSULAS</b>
        </div>
        <br>
        <div class="just">
            {{-- Clausulas contratos --}}
            @if($datosContrato[0]->tipo_contrato_id == 2)
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">PRIMERA.- </a>El trabajador de NOMBRE
                <a class="negrita">{{ mb_strtoupper($infoColaborador[0]->nombre_desc) }}

                </a> de NACIONALIDAD
                <b>{{ mb_strtoupper($infoColaborador[0]->nacionalidad) }}</b> de
                <a class="negrita">{{ $infoColaborador[0]->edad }}</a> a??os de edad, ESTADO CIVIL
                <a class="negrita">@if($datosContrato[0]->estado_civil_id == 1)
                    SOLTERO
                    @elseif ($datosContrato[0]->estado_civil_id == 2)
                    CASADO
                    @else
                    UNION LIBRE
                    @endif</a>
                <a>con </a><b>DOMICILIO</b> en <b>C.</b>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->domicilio) }}</a>
                {{-- FALTAN VARIABLES --}}
                <a class="negrita">COL.</a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->colonia) }}, </a>
                <a class="negrita">MUNICIPIO DE </a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->municipio) }}, </a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->estado) }}, </a>
                <a class="negrita">C.P.</a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->codigo_postal) }}</a>
                <b>SEXO:</b>
                <a class="negrita">@if($datosContrato[0]->genero_id == 1)
                    <b>MASCULINO</b>
                    @elseif($datosContrato[0]->genero_id == 2)
                    <b>FEMENINO</b>
                    @else
                    <b>NO BINARIO</b>
                    @endif
                </a>
                <a>celebra contrato de trabajo por</a>
                <b>tiempo
                    @if($datosContrato[0]->tipo_contrato_id == 2)
                    Determinado
                    @elseif($datosContrato[0]->tipo_contrato_id == 3)
                    Indeterminado
                    @endif
                </b>
                <a>con su patr??n </a>
                <b>INDUSTRIAS TECNOS S.A. DE C.V. </b>
                <a>quien es una persona moral con actividad empresarial, cuya negociaci??n tiene como objeto fabricar,
                    ensamblar, producir,
                    comprar, vender, distribuir, importar, exportar y en general comerciar a cualquier t??tulo con
                    cartuchos deportivos y
                    armas de fuego deportivas de todas clases, tipos y calibres y con m??quinas, aparatos, motores,
                    art??culos de metal y
                    equipo industrial de todos tipos de clases y con las partes accesorios y aditamentos de dichos
                    productos, etc; contrato
                    que se establece entre las partes por un periodo que abarca</a>
                {{-- FALTAN VARIABLES --}}
                <b>del {{ mb_strtoupper($fecha_inicial_contrato_dia) }} DE {{ mb_strtoupper($fecha_inicial_contrato_mes) }}
                    DEL
                    {{ mb_strtoupper($fecha_inicial_contrato_year) }}</b>
                <b>al {{ mb_strtoupper($fecha_final_contrato_dia) }} DE {{ mb_strtoupper($fecha_final_contrato_mes) }} DEL
                    {{ mb_strtoupper($fecha_final_contrato_year) }}, </b>
                <a>por tiempo
                    @if($datosContrato[0]->tipo_contrato_id == 2)
                    Determinado,
                    @elseif($datosContrato[0]->tipo_contrato_id == 3)
                    Indeterminado,
                    @endif
                    ello por la naturaleza del trabajo lo anterior en virtud de que se trata de
                    un exceso de
                    producci??n por los contratos de venta exportaci??n (Licencia de importaci??n 574479080J09321), que no
                    requiere mayor
                    tiempo para su realizaci??n e intervenci??n, m??s que el periodo se??alado; por ello la necesidad de
                    contratar los servicios
                    del trabajador y por un tiempo
                    @if($datosContrato[0]->tipo_contrato_id == 2)
                    Determinado
                    @elseif($datosContrato[0]->tipo_contrato_id == 3)
                    Indeterminado
                    @endif
                    y porque el trabajador solamente puede por ese periodo y
                    est?? conforme con
                    ello.</a>
            </p>
            @elseif($datosContrato[0]->tipo_contrato_id == 3)
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">PRIMERA.- </a>El trabajador de nombre
                <a class="negrita">{{ mb_strtoupper($infoColaborador[0]->nombre_desc) }}

                </a> de NACIONALIDAD
                <b>{{ mb_strtoupper($infoColaborador[0]->nacionalidad) }}</b> de
                <a class="negrita">{{ $infoColaborador[0]->edad }}</a> a??os de edad, ESTADO CIVIL
                <a class="negrita">@if($datosContrato[0]->estado_civil_id == 1)
                    SOLTERO
                    @elseif ($datosContrato[0]->estado_civil_id == 2)
                    CASADO
                    @else
                    UNION LIBRE
                    @endif</a>
                <a>con </a><b>DOMICILIO</b> en
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->domicilio) }}, </a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->colonia) }}, </a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->municipio) }}, </a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->estado) }},</a>
                <a class="negrita">C.P.</a>
                <a class="negrita">{{ mb_strtoupper($datosContrato[0]->codigo_postal) }}</a>
                <b>SEXO:</b>
                <a class="negrita">@if($datosContrato[0]->genero_id == 1)
                    <b>MASCULINO</b>
                    @elseif($datosContrato[0]->genero_id == 2)
                    <b>FEMENINO</b>
                    @else
                    <b>NO BINARIO</b>
                    @endif
                </a>
                <a>celebra contrato de trabajo por</a>
                <b>tiempo
                    @if($datosContrato[0]->tipo_contrato_id == 2)
                    Determinado
                    @elseif($datosContrato[0]->tipo_contrato_id == 3)
                    Indeterminado
                    @endif
                </b>
                <a>con su patr??n </a>
                <b>INDUSTRIAS TECNOS S.A. DE C.V. </b>
                <a>quien es una persona moral con actividad empresarial, cuya negociaci??n tiene como objeto fabricar,
                    ensamblar, producir,
                    comprar, vender, distribuir, importar, exportar y en general comerciar a cualquier t??tulo con
                    cartuchos deportivos y
                    armas de fuego deportivas de todas clases, tipos y calibres y con m??quinas, aparatos, motores,
                    art??culos de metal y
                    equipo industrial de todos tipos de clases y con las partes accesorios y aditamentos de dichos
                    productos, etc; contrato
                    que se establece entre las partes por un periodo indeterminado.</a>
            </p>
            @endif

            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">SEGUNDA.-</a>
                <a>El trabajador es contratado con el</a>
                <b>PUESTO</b>
                <a>de</a>
                <b>{{ mb_strtoupper($infoColaborador[0]->puesto) }}</b>
                <a>en el ??nico domicilio del</a>
                <b>PATR??N</b>
                <a>sito en</a>
                <b>KILOMETRO 6 DE LA CARRETERA CUERNAVACA A TEPOZTL??N EN AHUATEPEC, CUERNAVACA MORELOS,</b>
                <a>realizando las</a>
                <b style="border-bottom: 1px solid black;">funciones:</b>
                <a>{{ $descripcionPuesto }}</a>
                <a>Siendo ??ste su</a>
                <b>LUGAR</b>
                <a>de trabajo.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>Las funciones anteriores se se??alan de forma enunciativa, mas no limitativa, dado que desempe??ar?? sus
                    funciones de
                    acuerdo a las necesidades inherentes al servicio principal para el que se le contrata.</a>
                </a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>El</a>
                <b>TRABAJADOR</b>
                <a>deber?? ejecutar el trabajo con intensidad, cuidado y esmero apropiados conforme al objeto del</a>
                <b>PATR??N,</b>
                <a>en el tiempo y lugares convenidos as?? como las indicaciones dadas por ??ste, por lo que acepta estar
                    capacitado y tener
                    los conocimientos necesarios para desempe??ar el puesto de</a>
                <b>{{ mb_strtoupper($infoColaborador[0]->puesto) }}</b>
                <a>con las funciones que se indica en la cl??usula</a>
                <b>SEGUNDA</b>
                <a>del presente contrato, oblig??ndose por ello a ejecutar su trabajo en los t??rminos pactados en este
                    contrato, con esmero,
                    intensidad, ello bajo la direcci??n del patr??n.</a>
                </a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">TERCERA.-</a>
                <a>El</a>
                <b>TRABAJADOR</b>
                <a>deber?? dar aviso al</a>
                <b>PATR??N,</b>
                <a>si existe alguna causa que le impida desempe??ar su trabajo o concurrir al mismo, por el tiempo de
                    vigencia del presente
                    contrato. De igual forma las partes convienen en que las ??nicas incapacidades que el patr??n
                    reconoce, son las expedidas
                    por el Instituto Mexicano del Seguro Social debidamente requisitadas, por contar el trabajador
                    con
                    dichos beneficios del
                    r??gimen obligatorio de la seguridad social. Asimismo en caso de que el trabajador presente
                    alguna
                    enfermedad contagiosa,
                    deber?? informar a su</a>
                <b>PATR??N</b>
                <a>para tomar las medidas necesarias para con el</a>
                <b>INSTITUTO MEXICANO DEL SEGURO SOCIAL.</b>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>Todo lo relacionado con riesgos profesionales y enfermedades no profesionales se regir?? por las
                    disposiciones de la Ley
                    Federal del Trabajo y la del Seguro Social.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <b>CUARTA.-</b>
                <a>Se establece como</a>
                <b>PROHIBICIONES</b>
                <a>para el trabajador ejecutar cualquier acto que ponga en peligro su vida, la seguridad del centro de
                    trabajo, la de sus
                    compa??eros o terceras personas, por ello deber?? seguir todas las indicaciones y medidas de seguridad
                    que su patr??n le
                    indique.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>Asimismo se establece como prohibiciones conforme a la Ley Federal del Trabajo:</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <ul style="margin-left: 12%; margin-right: 5%;">
                    <li>Faltar al empleo sin causa justificada o sin permiso del patr??n.</li>
                    <li>Concurrir a su trabajo en estado de embriaguez, o bajo la influencia de alg??n narc??tico, droga o
                        enervante salvo que
                        exista prescripci??n m??dica.</li>
                    <li>El TRABAJADOR no puede portar ning??n tipo de armas, ni herramientas punzocortantes.</li>
                    <li>Queda prohibido dentro del centro de trabajo realizar cualquier acto ajeno al trabajo o de
                        propaganda, colectas o
                        cualquier acto que no sea de los pactados en este contrato.</li>
                    <li>Queda prohibido al trabajador utilizar los recursos del centro de trabajo para un fin diverso al
                        que le fue otorgado.</li>
                </ul>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>Es tambi??n obligaci??n del trabajador presentarse a su empleo de manera limpia, aseada, con pelo
                    corto, calzado limpio,
                    sin alhajas.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">QUINTA.-</a>
                <a>El trabajador expresa su conformidad en lo pactado en la cl??usula anterior y realizar su labor
                    conforme lo establece las
                    Ley Federal del Trabajo y siguiendo los lineamientos y ordenes dados por su</a>
                <b>PATR??N</b>
                <a>conforme al trabajo contratado.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">SEXTA.-</a>
                <a>La</a>
                <b>JORNADA SEMANAL</b>
                <a>de trabajo ser?? de 48, 45 o 42 horas seg??n se trate de jornada diurna, mixta o nocturna, distribuci??n
                    de jornada que
                    ser?? hecha por el patr??n, contando con treinta minutos para tomar sus alimentos o descansar dentro
                    de la fuente de
                    trabajo durante su jornada laboral y en su caso por necesidades del servicio se podr?? modificar,
                    siempre respet??ndose
                    los treinta minutos dentro de su jornada de trabajo.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">S??PTIMA.-</a>
                <a>El trabajador tiene la prohibici??n expresa de laborar tiempo extraordinario, a menos que exista</a>
                <b>autorizaci??n por escrito</b>
                <a>por parte del representante legal de la empresa firmada por ambas partes, donde se le indique el d??a,
                    el tiempo
                    extraordinario que laborara, y las causas, en caso de no existir autorizaci??n en ese sentido, no
                    puede laborarlo y por
                    ende no se le pagar?? cantidad alguna que extienda m??s de su jornada legal de trabajo, siendo ??sta
                    una condici??n sin la
                    cual no se pagar?? el tiempo extraordinario.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">OCTAVA.-</a>
                <b>FORMA Y MONTO DE PAGO DE SALARIO.-</b>
                <a>Se establece como salario que percibir?? el trabajador por la prestaci??n de sus servicios de</a>
                <b>${{ $sueldo }}</b>
                <b>({{ $sueldoLetra }} M.N) mensuales</b>
                <a>mismos que ser??n pagaderos de manera quincenal, incluyendo el pago de los d??as s??ptimo; siendo el d??a
                    de pago de su
                    salario el d??a 15 y ??ltimo de cada mes, y si el d??a del pago corresponde a su d??a de descanso le
                    ser??n cubiertos sus
                    salarios un d??a antes, mismo que se realizar??</a>
                <b style="border-bottom: 1px solid black;">en el domicilio del PATR??N,</b>
                <a>haci??ndosele al trabajador las retenciones de ley, por concepto de aportaciones al Instituto Mexicano
                    del Seguro Social,
                    Impuesto Sobre la renta, aportaciones al Sistema de Ahorro para el retiro, e INFONAVIT, e Impuesto
                    Sobre la renta.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>Dicho pago se realizar?? por medio de dep??sito bancario en la cuenta de n??mina con el n??mero de Cuenta
                    asignado por la
                    instituci??n bancaria Banco Santander (M??xico), S.A. Instituci??n de Banca M??ltiple Grupo Financiero
                    Santander,
                    extendi??ndose el recibo de n??mina correspondiente al periodo, mismo que deber?? firmar el trabajador
                    al momento de
                    recibir el pago. Atento a lo anterior desde este momento el trabajador manifiesta su autorizaci??n
                    expresa para el efecto
                    de que el pago de su salario le sea realizado v??a dep??sito bancario en t??rminos del art??culo 101 de
                    la Ley Federal del
                    Trabajo.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">NOVENA.-</a>
                <a>El</a>
                <b>TRABAJADOR</b>
                <a>ser??</a>
                <b>CAPACITADO Y ADIESTRADO</b>
                <a>en los t??rminos y planes que se establezcan por la empresa, conforme a la Secretaria del Trabajo y
                    Productividad del
                    Estado de Morelos, para que el trabajador adquiera mayores conocimientos que le permitan su
                    crecimiento personal as??
                    como en el desempe??o de sus labores, de acuerdo a la Ley Federal del Trabajo. Asimismo con motivo de
                    la capacitaci??n el
                    trabajador tendr?? la obligaci??n de acudir a los cursos que se impartan conforme a la Ley Federal del
                    Trabajo.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">D??CIMA.-</a>
                <a>El trabajador gozar?? en su momento y t??rminos de sus vacaciones, conforme lo establece el art??culo 76
                    de la Ley Federal
                    del Trabajo y dada la temporalidad del contrato, conforme a la naturaleza de tiempo
                    @if($datosContrato[0]->tipo_contrato_id == 2)
                    Determinado
                    @elseif($datosContrato[0]->tipo_contrato_id == 3)
                    Indeterminado
                    @endif
                    , se
                    le pagar?? al
                    trabajador su parte proporcional al tiempo laborado, as?? como la correspondiente prima vacacional a
                    raz??n del 45% sobre
                    las vacaciones que le correspondan. Lo anterior en t??rminos de los art??culos 79 y 80 de la Ley
                    Federal del Trabajo.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">D??CIMA PRIMERA.-</a>
                <a>El trabajador percibir?? de acuerdo a lo establecido por el art??culo 87 de la Ley Federal del Trabajo
                    un aguinaldo a
                    raz??n de treinta d??as anuales por a??o trabajado, por lo que en t??rminos del presente contrato tendr??
                    derecho a su parte
                    proporcional por el tiempo de la duraci??n del presente contrato.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">D??CIMA SEGUNDA.-</a>
                <a>Conforme a la Ley Federal del Trabajo, el trabajador tendr?? como d??as de descanso obligatorio los
                    d??as siguientes:</a>
                <ol type="I" style="margin-left: 12%; margin-right: 5%; font-weight: bold;">
                    <li><a style="font-weight: normal;">El 1o. de enero;</a></li>
                    <li><a style="font-weight: normal;">El primer lunes de febrero en conmemoraci??n del 5 de
                            febrero;</a></li>
                    <li><a style="font-weight: normal;">El tercer lunes de marzo en conmemoraci??n del 21 de marzo;</a>
                    </li>
                    <li><a style="font-weight: normal;">El 1o. de mayo;</a></li>
                    <li><a style="font-weight: normal;">El 16 de septiembre;</a></li>
                    <li><a style="font-weight: normal;">El tercer lunes de noviembre en conmemoraci??n del 20 de
                            noviembre;</a></li>
                    <li><a style="font-weight: normal;">El 1o. de diciembre de cada seis a??os, cuando corresponda a la
                            transmisi??n del Poder Ejecutivo
                            Federal;</a></li>
                    <li><a style="font-weight: normal;">El 25 de diciembre, y</a></li>
                    <li><a style="font-weight: normal;">El que determinen las leyes federales y locales electorales, en
                            el caso de elecciones
                            ordinarias, para efectuar la
                            jornada electoral.</a></li>
                </ol>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>En lo no previsto en este contrato se estar?? a lo dispuesto por la Ley Federal del Trabajo.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">D??CIMA TERCERA.-</a>
                <b>CLAUSULA DE CONFIDENCIALIDAD:</b>
                <a>De conformidad con lo dispuesto el art??culo 134 fracci??n XIII, el trabajador se obliga a guardar
                    absoluta discreci??n y
                    no divulgar la forma y m??todos de trabajo, ni informaci??n de la EMPRESA a la que tuviere acceso
                    derivado del trabajo
                    desempe??ado, por ser solamente parte del</a>
                <b>PATR??N</b>
                <a>como empresa, asumiendo las responsabilidades que de ello deriva el divulgar la informaci??n privada
                    de la empresa en
                    cuanto todo lo que hace a la operaci??n de trabajo y forma de desarrollarse.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">D??CIMA CUARTA.-</a>
                <a>El trabajador tiene la obligaci??n de desempe??ar su trabajo en la manera y t??rminos convenidos, y en
                    caso de
                    incumplimiento al presente contrato de trabajo o a las ??rdenes dadas por su</a>
                <b>PATR??N</b>
                <a>se le rescindir?? su contrato de trabajo sin responsabilidad para el patr??n, si incurriese en alguna
                    de las causales
                    establecidas en el art??culo 47 de la Ley Federal del Trabajo, consistentes en:</a>

                <ol type="I" style="margin-left: 12%; margin-right: 5%; font-weight: bold;">
                    <li><a class="tab-2" style="font-weight: normal;">Incurrir el trabajador, durante sus labores, en
                            faltas de
                            probidad u honradez, en actos de violencia, amagos,
                            injurias o malos tratamientos en contra del patr??n, sus familiares o del personal directivo
                            o administrativo de la
                            empresa o establecimiento, salvo que medie provocaci??n o que obre en defensa propia;</a>
                    </li>
                    <li><a class="tab-2" style="font-weight: normal;">Cometer el trabajador contra alguno de sus
                            compa??eros,
                            cualquiera de los actos enumerados en la fracci??n anterior,
                            si como consecuencia de ellos se altera la disciplina del lugar en que se desempe??a el
                            trabajo;</a></li>
                    <li><a class="tab-2" style="font-weight: normal;">Cometer el trabajador, fuera del servicio, contra
                            el
                            patr??n, sus familiares o personal directivo administrativo,
                            alguno de los actos a que se refiere la fracci??n II, si son de tal manera graves que hagan
                            imposible el cumplimiento de
                            la relaci??n de trabajo;</a>
                    </li>
                    <li><a class="tab-2" style="font-weight: normal;">Ocasionar el trabajador, intencionalmente,
                            perjuicios
                            materiales durante el desempe??o de las labores o con motivo de
                            ellas, en los edificios, obras, maquinaria, instrumentos, materias primas y dem??s objetos
                            relacionados con el trabajo;</a></li>
                    <li><a class="tab-2" style="font-weight: normal;">Ocasionar el trabajador los perjuicios de que
                            habla la
                            fracci??n anterior siempre que sean graves, sin dolo, pero con
                            negligencia tal, que ella sea la causa ??nica del perjuicio;</a></li>
                    <li><a class="tab-2" style="font-weight: normal;">Comprometer el trabajador, por su imprudencia o
                            descuido
                            inexcusable, la seguridad del establecimiento o de las
                            personas que se encuentren en ??l;</a></li>
                    <li><a class="tab-2" style="font-weight: normal;">Cometer el trabajador actos inmorales en el
                            establecimiento
                            o lugar de trabajo;</a></li>
                    <li><a class="tab-2" style="font-weight: normal;">Revelar el trabajador los secretos de fabricaci??n
                            o dar a
                            conocer asuntos de car??cter reservado, con perjuicio de
                            la empresa;</a></li>
                    <li><a class="tab-2" style="font-weight: normal;">Tener el trabajador m??s de tres faltas de
                            asistencia en un
                            per??odo de treinta d??as, sin permiso del patr??n o sin
                            causa justificada;</a></li>
                    <li><a class="tab-2" style="font-weight: normal;">X. Desobedecer el trabajador al patr??n o a sus
                            representantes,
                            sin causa justificada, siempre que se trate del trabajo
                            contratado;</a></li>
                    <li><a class="tab-2" style="font-weight: normal;">Negarse el trabajador a adoptar las medidas
                            preventivas o a
                            seguir los procedimientos indicados para evitar
                            accidentes o enfermedades;</a>
                    </li>
                    <li><a class="tab-2" style="font-weight: normal;">Concurrir el trabajador a sus labores en estado de
                            embriaguez o bajo la influencia de alg??n narc??tico o droga
                            enervante, salvo que, en este ??ltimo caso, exista prescripci??n m??dica. Antes de iniciar su
                            servicio, la trabajadora
                            deber?? poner el hecho en conocimiento del patr??n y presentar la prescripci??n suscrita por el
                            m??dico;
                        </a>
                    </li>
                    <li><a class="tab-2" style="font-weight: normal;">La sentencia ejecutoriada que imponga al
                            trabajador
                            una pena
                            de prisi??n, que le impida el cumplimiento de la
                            relaci??n de trabajo; y</a>
                    </li>
                    <li><a class="tab-2" style="font-weight: normal;"> Las an??logas a las establecidas en las fracciones
                            anteriores,
                            de igual manera graves y de consecuencias semejantes
                            en lo que al trabajo se refiere.</a>
                    </li>
                    <li><a class="tab-2" style="font-weight: normal;">Asimismo como causa an??loga no cumplir con el
                            servicio
                            contratado es decir Revisar, recopilar, interpretar,
                            analizar, verificar y evaluar las operaciones y actos administrativos y financieros,
                            verificando
                            y determinando el
                            cumplimiento de los procedimientos de acuerdo a las leyes y normas tanto internas como
                            externas,
                            a fin de garantizar que
                            los objetivos de la EMPRESA se cumplan dentro de los criterios de eficacia y eficiencia y de
                            gesti??n transparente,
                            realizar los informes de auditor??a y comunicarlos con su superior inmediato as?? como
                            realizar
                            ajustes o modificaciones
                            que sean necesarias.</a>
                    </li>
                </ol>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>El patr??n dar?? al trabajador aviso escrito de la fecha y causa o causas de la rescisi??n haci??ndolo
                    del conocimiento a
                    ??ste, debiendo el trabajador firmar de recibido el aviso correspondiente el trabajador para su
                    conocimiento.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a>Enterado el trabajador de las causales de rescisi??n, en caso de incurrir en alguna, se proceder?? a
                    rescindirle el
                    contrato, entreg??ndole el aviso se??alado firmando para constancia el trabajador, como motivo
                    justificado de terminaci??n
                    de la relaci??n de trabajo.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">D??CIMA QUINTA.-</a>
                <a>Siendo el puesto para que se le contrata, de confianza por las funciones de auditor??a, de inspecci??n,
                    fiscalizaci??n,
                    vigilancia, administraci??n, de car??cter general, se proh??be al empleado ingresar al Sindicato. En
                    Caso de incumplimiento
                    de esta Cl??usula se dar?? por rescindido el Contrato Individual de Trabajo.</a>
            </p>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">D??CIMA SEXTA.-</a>
                <a>Todo lo no estipulado expresamente en este contrato, se regir?? por las disposiciones de la Ley
                    Federal del Trabajo.</a>
            </p>
            @if($datosContrato[0]->tipo_contrato_id == 2)
            @elseif($datosContrato[0]->tipo_contrato_id == 3)
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <span class="tab"></span>
                <a class="negrita">D??CIMA S??PTIMA.-</a>
                <a>La empresa para todos los efectos legales le reconoce al empleado la antig??edad del
                    <b>{{ mb_strtoupper($fecha_inicio_dia) }} DE {{ mb_strtoupper($fecha_inicio_mes) }}
                        @if($fecha_inicio_year <= 1999) DE @else DEL @endif {{ mb_strtoupper($fecha_inicio_year) }}.</b>
                            </a> </p> @endif <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                            <span class="tab"></span>
                            <a>Las partes con libre voluntad firman el presente contrato de trabajo en los t??rminos y
                                condiciones
                                que han le??do y
                                expresado su conformidad, someti??ndose el patr??n a respetar que el mismo no contenga
                                renuncia de
                                derechos del trabajador
                                en t??rminos del art??culo 5 de la Ley Federal del Trabajo y el trabajador a respetar el
                                contenido del
                                mismo, el trabajo
                                contratado en la manera y t??rminos se??alados. Lo anterior se firma con fecha</a>
                            <b>{{ mb_strtoupper($fecha_inicial_contrato_dia) }} DE
                                {{ mb_strtoupper($fecha_inicial_contrato_mes) }} DEL
                                {{ mb_strtoupper($fecha_inicial_contrato_year) }}.</b> </p> <br>
            <br>
            <p class="arial margen-estandar t-letra" style=" margin-bottom:-0.5px;">
                <table style="width:100%">
                    <tr>
                        <th style="text-align: center;">PATR??N <br>
                            INDUSTRIAS TECNOS, S.A. DE C.V.</th>
                        <th style="text-align: center;">TRABAJADOR</th>
                    </tr>
                    <tr>
                        <td class="negrita" style="text-align: center;"><br>
                            _____________________________________ <br>
                            EDUARDO S. Y????EZ PONCE DE LE??N</td>
                        <td class="negrita" style="text-align: center;"><br>
                            _____________________________________ <br>
                            {{ mb_strtoupper($infoColaborador[0]->nombre_desc) }}
                        </td>
                    </tr>
                </table>
            </p>
        </div>
    </div>
</body>

</html>