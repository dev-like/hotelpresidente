<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomefantasia',150);
            $table->string('telefone',30)->nullable();
            $table->string('email',30)->nullable();
            $table->string('endereco',500)->nullable();
            $table->string('cep',15)->nullable();
            $table->string('cidade',250)->nullable();
            $table->string('estado',250)->nullable();
            $table->string('pais',250)->nullable();
            $table->string('facebook',300)->nullable();
            $table->string('instagram',300)->nullable();
            $table->string('whatsapp',300)->nullable();
            $table->string('tripadvisor',300)->nullable();
            $table->text('nossahistoria')->nullable();
            $table->string('descricao',500)->nullable();
            $table->string('palavraschave',500)->nullable();

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
        Schema::dropIfExists('empresa');
    }
}
