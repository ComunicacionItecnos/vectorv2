<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNuevoIngresosTable extends Migration
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
            $table->string('nombre_2')->length(50);
            $table->string('ap_paterno')->length(50);
            $table->string('ap_materno')->length(50);
            $table->date('fecha_nacimiento');
            $table->string('actaNacimiento')->length(50);

            $table->unsignedBigInteger('escolaridad_id');
            $table->foreign('escolaridad_id')->references('id')->on('escolaridad');

            $table->string('constanciaEstudios');
            $table->string('especialidadEstudios');

            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('genero');

            $table->unsignedBigInteger('estado_civil_id');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil');

            $table->string('actaMatrimonio')->nullable();
            $table->string('rfc')->unique();
            $table->string('rfcDocumento');
            $table->string('no_seguro_social')->length(15)->unique();
            $table->string('altaImssDoc');
            $table->string('domicilio')->length(128);
            $table->string('colonia')->length(100);
            $table->string('municipio')->length(45);
            $table->string('estado')->length(45);
            
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad');

            $table->string('codigo_postal')->length(10);
            $table->string('comprobanteDomicilio');
            $table->boolean('paternidad_id');
            $table->string('actasHijo')->nullable();
            $table->longText('cartasRecomendacion');
            $table->string('cartillaMilitar');
            $table->string('cartaNoPenales');
            $table->string('credencilIFE');
            $table->string('buroCredito');
            $table->string('foto');
            $table->string('correo');
            $table->integer('tel_fijo')->length(10);
            $table->integer('tel_movil')->length(10);
            $table->string('cvOsolicitudEmpleo');
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
