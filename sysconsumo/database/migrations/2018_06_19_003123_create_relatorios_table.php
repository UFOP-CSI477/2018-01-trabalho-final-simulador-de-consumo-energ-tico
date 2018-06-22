<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->float('watts');
            $table->float('spend');
            $table->integer('user_id');
            $table->integer('distr_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('distr_id')->references('id')->on('distributors');
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
        Schema::dropIfExists('relatorios');
        Schema::dropIfExists('reports');
    }
}
