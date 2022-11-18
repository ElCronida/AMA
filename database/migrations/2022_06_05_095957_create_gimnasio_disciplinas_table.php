<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGimnasioDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gimnasios_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gimnasio_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->foreign('gimnasio_id')->references('id')->on('gimnasios');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
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
        Schema::dropIfExists('gimnasio_disciplinas');
    }
}
