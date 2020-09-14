<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_vehiculo');
            $table->string('tarifa_fija');
            $table->timestamps();
        });

        Schema::create('tarifa_automovil', function (Blueprint $table) {
            $table->primary('automovil_id', 'tarifa_id');
            $table->unsignedBigInteger('automovil_id');
            $table->unsignedBigInteger('tarifa_id');
            $table->timestamps();

            $table->foreign('automovil_id')
                ->references('id')
                ->on('automovils')
                ->onDelete('cascade');

            $table->foreign('tarifa_id')
                ->references('id')
                ->on('tarifas')
                ->onDelete('cascade');
        });

        Schema::create('tarifa_moto', function (Blueprint $table) {
            $table->primary('moto_id', 'tarifa_id');
            $table->unsignedBigInteger('moto_id');
            $table->unsignedBigInteger('tarifa_id');
            $table->timestamps();

            $table->foreign('moto_id')
                ->references('id')
                ->on('motos')
                ->onDelete('cascade');

            $table->foreign('tarifa_id')
                ->references('id')
                ->on('tarifas')
                ->onDelete('cascade');
        });

        Schema::create('tarifa_bicicleta', function (Blueprint $table) {
            $table->primary('bicicleta_id', 'tarifa_id');
            $table->unsignedBigInteger('bicicleta_id');
            $table->unsignedBigInteger('tarifa_id');
            $table->timestamps();

            $table->foreign('bicicleta_id')
                ->references('id')
                ->on('bicicletas')
                ->onDelete('cascade');

            $table->foreign('tarifa_id')
                ->references('id')
                ->on('tarifas')
                ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifas');
    }
}
