<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCEntidadesFederativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_entidades_federativas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_c_pais');
            $table->foreign('id_c_pais')->references('id')->on('c_paises')->onDelete('cascade');

            $table->string('clave')->length(5);
            $table->string('abrev')->length(8);
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
        Schema::dropIfExists('c_entidades_federativas');
    }
}
