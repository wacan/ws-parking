<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovils', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_prop');
            $table->string('apellidos_prop');
            $table->integer('documento');
            $table->string('modelo');
            $table->string('placas');
            $table->string('color');
            $table->string('tipo_auto');
            $table->date('fecha_ingreso');
            $table->time('hora_ingreso');
            $table->date('fecha_salida');
            $table->time('hora_salida');
            $table->string('parking_asigned');
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
        Schema::dropIfExists('automovils');
    }
}
