<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('estado');
            $table->timestamps();
        });

        Schema::create('parking_automovil', function (Blueprint $table) {
            $table->primary('automovil_id', 'parking_id');
            $table->unsignedBigInteger('automovil_id');
            $table->unsignedBigInteger('parking_id');
            $table->timestamps();

            $table->foreign('automovil_id')
                ->references('id')
                ->on('automovils')
                ->onDelete('cascade');

            $table->foreign('parking_id')
                ->references('id')
                ->on('parkings')
                ->onDelete('cascade');
        });

        Schema::create('parking_moto', function (Blueprint $table) {
            $table->primary('moto_id', 'parking_id');
            $table->unsignedBigInteger('moto_id');
            $table->unsignedBigInteger('parking_id');
            $table->timestamps();

            $table->foreign('moto_id')
                ->references('id')
                ->on('motos')
                ->onDelete('cascade');

            $table->foreign('parking_id')
                ->references('id')
                ->on('parkings')
                ->onDelete('cascade');
        });

        Schema::create('parking_bicicleta', function (Blueprint $table) {
            $table->primary('bicicleta_id', 'parking_id');
            $table->unsignedBigInteger('bicicleta_id');
            $table->unsignedBigInteger('parking_id');
            $table->timestamps();

            $table->foreign('bicicleta_id')
                ->references('id')
                ->on('bicicletas')
                ->onDelete('cascade');

            $table->foreign('parking_id')
                ->references('id')
                ->on('parkings')
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
        Schema::dropIfExists('parkings');
    }
}
