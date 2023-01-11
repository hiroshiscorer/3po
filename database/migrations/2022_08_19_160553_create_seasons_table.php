<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('season_name', 64);
            $table->string('type', 64)->comment('Either league or tourney');
            $table->integer('rounds')->unsigned()->comment('Deprecated');
            $table->integer('show')->unsigned()->comment('Shows (1) or not (0) in home');
            $table->string('misc', 255);
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
        Schema::dropIfExists('seasons');
    }
}
