<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAparelhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aparelhos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('quantidade');
            $table->time('tempo_uso');
            $table->float('potencia');
            $table->foreign('comodo_id')->references('id')->on('comodos');
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
        Schema::dropIfExists('aparelhos');
    }
}
