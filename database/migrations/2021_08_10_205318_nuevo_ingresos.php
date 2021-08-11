<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NuevoIngresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nuevo_ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('curp')->length(18)->unique();
            $table->string('curpDocumento');
            $table->string('nombre_1')->length(50);
            $table->string('nombre_2')->length(50)->nullable();
            $table->string('ap_paterno')->length(50);
            $table->string('ap_materno')->length(50);
            $table->date('fecha_nacimiento');
            $table->string('actaNacimiento');

            $table->unsignedBigInteger('escolaridad_id');
            $table->foreign('escolaridad_id')->references('id')->on('escolaridad');

            $table->string('constanciaEstudios');
            $table->string('especialidadEstudios')->nullable();

            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('genero');

            $table->unsignedBigInteger('estado_civil_id');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil');

            $table->string('actaMatrimonio')->nullable();
            $table->string('rfc')->unique();
            $table->string('rfcDocumento');
            $table->string('no_seguro_social')->length(15)->unique();
            $table->string('altaImssDoc');
            $table->string('calle')->length(128);
            $table->string('colonia')->length(100);

            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');

            $table->unsignedBigInteger('pais');
            $table->foreign('pais')->references('id')->on('nacionalidad');

            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad');

            $table->string('codigo_postal')->length(10);
            $table->string('comprobanteDomicilio');
            $table->boolean('paternidad_id');
            $table->string('actasHijo')->nullable();
            $table->longText('cartasRecomendacion')->nullable();
            $table->string('cartillaMilitar')->nullable();
            $table->string('cartaNoPenales');
            $table->string('credencialIFE');
            $table->string('buroCredito');
            $table->string('foto');
            $table->string('correo');
            $table->string('tel_fijo')->length(10);
            $table->string('tel_movil')->length(10);
            $table->string('cvOsolicitudEmpleo');
            $table->string('tallaPantalon');
            $table->string('tallaPlayera');
            $table->string('tallaZapatos');
            $table->integer('numExt')->nullable();
            $table->integer('numInt')->nullable();

            /* contacto de emergencia */
            $table->string('nombreEmergencia1');
            $table->string('telEmergencia1')->length(10);
            $table->string('correoEmergencia1')->nullable();

            $table->string('nombreEmergencia2');
            $table->string('telEmergencia2')->length(10);
            $table->string('correoEmergencia2')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nuevo_ingresos');
    }
}
