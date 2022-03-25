<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosAsistenciasJustificantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_asistencias_justificantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empleado_asistencia');
            $table->foreign('id_empleado_asistencia', 'id_emp_asist')->references('id')->on('empleados_asistencias')->onDelete('cascade');
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
        Schema::dropIfExists('empleados_asistencias_justificantes');
    }
}
