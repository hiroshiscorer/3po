<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team1_id')->unsigned();
            $table->foreign('team1_id')->references('id')->on('teams');
            $table->integer('team2_id')->unsigned();
            $table->foreign('team2_id')->references('id')->on('teams');
            $table->integer('team1_score')->unsigned()->comment('3, 2, 1, or zero points, total of both matches');
            $table->integer('team2_score')->unsigned()->comment('3, 2, 1, or zero points, total of both matches');
            $table->string('round', 64)->comment('The round or date this matchup belongs to');
            $table->integer('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->string('calendar', 64)->comment('to include current calendar');
            $table->string('bracket', 64)->comment('to include Bracket names in tourney');
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
        Schema::dropIfExists('matchups');
    }
}
