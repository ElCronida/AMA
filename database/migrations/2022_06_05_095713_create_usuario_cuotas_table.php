<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_cuotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('cuota_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('cuota_id')->references('id')->on('cuotas');
            $table->date('fecha_pago');
            $table->date('fecha_fin');
            $table->integer('meses_consecutivos')->nullable();
            $table->boolean('vetado')->default(false);
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
        Schema::dropIfExists('usuario_cuotas');
    }
}
