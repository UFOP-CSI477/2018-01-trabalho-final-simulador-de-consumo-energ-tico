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
        Schema::create('room_has_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id');
            $table->integer('report_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('report_id')->references('id')->on('reports');
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
        Schema::dropIfExists('room_has_report');
    }
}
