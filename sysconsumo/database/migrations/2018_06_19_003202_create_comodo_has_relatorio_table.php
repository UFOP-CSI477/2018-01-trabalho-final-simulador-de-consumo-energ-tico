<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComodoHasRelatorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comodo_has_relatorio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comodo_id');
            $table->integer('relatorio_id');
            $table->foreign('comodo_id')->references('id')->on('comodos');
            $table->foreign('relatorio_id')->references('id')->on('relatorios');
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
        Schema::dropIfExists('comodo_has_relatorio');
    }
}
