<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()


    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 11);
            $table->string('razon_social', 150);
            $table->string('nombre_comercial', 200);
            $table->string('direccion', 150);
            $table->string('telefono', 100);
            $table->string('celular', 100);
            $table->string('correo', 100);
            $table->string('web', 150);
            $table->string('logo', 150);
            $table->string('estado', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
