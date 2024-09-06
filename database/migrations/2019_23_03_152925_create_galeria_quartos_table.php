<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaQuartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_quartos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('horizontal',255)->nullable();
            $table->string('horizontal1',255)->nullable();
            $table->string('vertical',255)->nullable();
            $table->string('vertical1',255)->nullable();
            $table->string('quadrado',255)->nullable();
            $table->string('quadrado1',255)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeria_quartos');
    }
}
