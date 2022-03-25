<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_organo_administrativo');
            $table->foreign('id_organo_administrativo')->references('id')->on('organos_administrativos')->onDelete('cascade');
            $table->unsignedBigInteger('id_personal');
            $table->foreign('id_personal')->references('id')->on('personales')->onDelete('cascade');
            $table->unsignedBigInteger('id_c_categoria');
            $table->foreign('id_c_categoria')->references('id')->on('c_categorias')->onDelete('cascade');
            $table->unsignedBigInteger('id_c_puesto');
            $table->foreign('id_c_puesto')->references('id')->on('c_puestos')->onDelete('cascade');
            $table->unsignedBigInteger('id_c_relacion_laboral');
            $table->foreign('id_c_relacion_laboral')->references('id')->on('c_relaciones_laborales')->onDelete('cascade');
            $table->date('fecha_alta');
            $table->date('fecha_baja')->nullable();
            $table->boolean('checado')->default(true);
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
        Schema::dropIfExists('empleados');
    }
}
