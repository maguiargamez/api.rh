<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_municipios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_c_entidad_federativa');
            $table->foreign('id_c_entidad_federativa')->references('id')->on('c_entidades_federativas')->onDelete('cascade');

            $table->string('clave')->length(5);
            $table->string('valor')->length(255);
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('c_municipios');
    }
}
