<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganosAdministrativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organos_administrativos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_c_tipo_organo_administrativo');
            $table->foreign('id_c_tipo_organo_administrativo')->references('id')->on('c_tipos_organos_administrativos')->onDelete('cascade');
            $table->unsignedBigInteger('id_organo_administrativo');
            $table->foreign('id_organo_administrativo')->references('id')->on('organos_administrativos')->nullable()->onDelete('cascade');
            $table->string('clave')->length(15);
            $table->string('clave_nech')->length(16);
            $table->string('desripcion')->length(255);
            $table->string('clave_presupuestal')->length(50);
            $table->date('fecha_alta');
            $table->date('fecha_baja')->nullable();
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
        Schema::dropIfExists('organos_administrativos');
    }
}
