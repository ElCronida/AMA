<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_ini');
            $table->date('fecha_fin')->nullable();
            $table->time('hora_ini');
            $table->time('hora_fin')->nullable();
            $table->decimal('precio')->nullable();
            $table->unsignedBigInteger('gimnasio_id');
            $table->foreign('gimnasio_id')->references('id')->on('gimnasios');
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
        Schema::dropIfExists('cursos');
    }
}
