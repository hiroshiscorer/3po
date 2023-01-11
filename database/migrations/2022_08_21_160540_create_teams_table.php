<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('team_name', 64);
            $table->string('initials', 5)->comment('up to 5, either club or team initials');
            $table->string('logo', 64)->comment('image filename');
            $table->string('club', 64)->comment('Parent Club');
            $table->integer('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->integer('penalty')->unsigned()->comment('Use this to apply point penalty, like not fielding players.');
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
        Schema::dropIfExists('teams');
    }
}
