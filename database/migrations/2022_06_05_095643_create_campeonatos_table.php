<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->date('fecha_ini');
            $table->date('fecha_fin')->nullable();
            $table->time('hora_ini');
            $table->time('hora_fin')->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('reglamento_id');
            $table->foreign('reglamento_id')->references('id')->on('reglamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campeonatos');
    }
}
