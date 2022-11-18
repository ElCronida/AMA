<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArbitroDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arbitros_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arbitro_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->foreign('arbitro_id')->references('id')->on('arbitros');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
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
        Schema::dropIfExists('arbitro_disciplinas');
    }
}
