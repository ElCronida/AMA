<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->date('fec_nac');
            $table->decimal('peso')->nullable();
            $table->decimal('altura')->nullable();
            $table->enum('sexo', ['Hombre','Mujer']);
            $table->string('direccion')->nullable();
            $table->string('cod_postal')->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('dni')->unique()->nullable();
            $table->string('usuario')->unique();
            $table->string('password');
            $table->enum('tipo',['Administrador','Normal'])->default('Normal');
            $table->boolean('activo')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
