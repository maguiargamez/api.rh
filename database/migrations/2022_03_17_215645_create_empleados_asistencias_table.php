<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_asistencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('id_c_incidencia');
            $table->foreign('id_c_incidencia')->references('id')->on('c_incidencias')->onDelete('cascade');
            $table->date('fecha');
            $table->time('entrada')->nullable();
            $table->time('salida')->nullable();
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
        Schema::dropIfExists('empleados_asistencias');
    }
}
