<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGimnasioFederacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gimnasios_federaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gimnasio_id');
            $table->unsignedBigInteger('federacion_id');
            $table->foreign('gimnasio_id')->references('id')->on('gimnasios');
            $table->foreign('federacion_id')->references('id')->on('federaciones');
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->boolean('activa')->default(true);
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
        Schema::dropIfExists('gimnasio_federacions');
    }
}
