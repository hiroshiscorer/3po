<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilot_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pilot_id')->unsigned();
            $table->foreign('pilot_id')->references('id')->on('pilots');
            $table->integer('score')->unsigned();
            $table->integer('kills')->unsigned();
            $table->integer('deaths')->unsigned();
            $table->integer('assists')->unsigned();
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('matches');
            $table->integer('match_won')->unsigned();
            $table->integer('match_tied')->unsigned();
            $table->integer('match_lost')->unsigned();
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
        Schema::dropIfExists('pilot_stats');
    }
}
