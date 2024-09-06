<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoQuartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoquartos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descricao');
            $table->integer('quarto_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('quarto_id')->references('id')->on('quartos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infoquartos');
    }
}
