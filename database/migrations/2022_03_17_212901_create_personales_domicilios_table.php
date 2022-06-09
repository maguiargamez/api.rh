<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalesDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personales_domicilios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_personal');
            $table->foreign('id_personal')->references('id')->on('personales')->onDelete('cascade');

            $table->unsignedBigInteger('id_c_pais');
            $table->foreign('id_c_pais')->references('id')->on('c_paises')->onDelete('cascade');

            $table->unsignedBigInteger('id_c_municipio');
            $table->foreign('id_c_municipio')->references('id')->on('c_municipios')->onDelete('cascade')->nullable();


            $table->string('calle')->length(100);
            $table->string('numero_exterior')->length(10);
            $table->string('numero_interior')->length(10);
            $table->string('colonia_localidad')->length(255)->nullable();
            $table->string('codigo_postal')->length(100);
            $table->string('ext_ciudad_localidad')->length(255)->nullable();
            $table->string('ext_estado_provincia')->length(255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personales_domicilios');
    }
}
