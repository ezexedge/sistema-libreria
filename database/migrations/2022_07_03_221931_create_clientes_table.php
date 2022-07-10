<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.

     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->text('rol');
            $table->text('nombre');
            $table->text('documento');
            $table->text('fechaNac');
            $table->text('direccion');
            $table->text('telefono');
            $table->text('prueba');
        });
    }

}