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

            $table->char('sexo_clave', 1);
            $table->string('sexo_valor')->length(100);
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


            $table->char('estado_civil_clave', 3);
            $table->string('estado_civil_valor')->length(100);

            $table->char('regimen_matrimonial_clave', 3);
            $table->string('regimen_matrimonial_valor')->length(100);

            $table->string('pais_nacimiento')->length(2);
            $table->string('nacionalidad')->length(2);

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
