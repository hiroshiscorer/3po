<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('match_round', 255)->comment('Use to name the match (TRA vs TFA)');
            $table->integer('matchup_id')->unsigned();
            $table->foreign('matchup_id')->references('id')->on('matchups');
            $table->integer('game')->unsigned()->comment('eg. Game 1 of 2');
            $table->string('map', 64)->comment('Map in which this was played, eg Esseles');
            $table->integer('faction')->unsigned()->default('0')->comment('Faction for team1, 0 = NR; 1 = Emp');
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
        Schema::dropIfExists('matches');
    }
}
