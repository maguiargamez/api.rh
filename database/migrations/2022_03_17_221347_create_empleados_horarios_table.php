<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_c_horario');
            $table->foreign('id_c_horario')->references('id')->on('c_horarios')->onDelete('cascade');
            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id')->on('empleados')->onDelete('cascade');
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
        Schema::dropIfExists('empleado_horarios');
    }
}
