<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_paises', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->length(2);
            $table->string('valor')->length(255);
            $table->string('nacionalidad')->length(255);
            $table->boolean('activo', true);
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
        Schema::dropIfExists('c_paises');
    }
}
