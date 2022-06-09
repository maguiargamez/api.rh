<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personales', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_c_sexo');
            $table->foreign('id_c_sexo')->references('id')->on('c_sexos')->onDelete('cascade');

            $table->string('nombre')->length(255);
            $table->string('apellido_uno')->length(255);
            $table->string('apellido_dos')->length(255)->nullable();
            $table->string('curp')->length(18);
            $table->string('rfc')->length(10);
            $table->string('rfc_homoclave')->length(3)->nullable();
            $table->string('correo_electronico')->length(100);
            $table->string('correo_electronico_alternativo')->length(100);
            $table->string('telefono_casa')->length(100);
            $table->string('celular_personal')->length(100);

            $table->unsignedBigInteger('id_c_estado_civil');
            $table->foreign('id_c_estado_civil')->references('id')->on('c_estados_civiles')->onDelete('cascade');

            $table->unsignedBigInteger('id_c_regimen_matrimonial');
            $table->foreign('id_c_regimen_matrimonial')->references('id')->on('c_regimenes_matrimoniales')->onDelete('cascade');


            $table->unsignedBigInteger('nacionalidad');
            $table->foreign('nacionalidad')->references('id')->on('c_paises')->onDelete('cascade');

            $table->date('nacimiento_fecha');
            $table->unsignedBigInteger('nacimiento_municipio');
            $table->foreign('nacimiento_municipio')->references('id')->on('c_municipios')->onDelete('cascade');

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
        Schema::dropIfExists('personales');
    }
}
