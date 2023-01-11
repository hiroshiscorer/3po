<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('season');
            $table->string('pilotname');
            $table->string('team');
            $table->string('team_image');
            $table->string('nr_k');
            $table->string('nr_d');
            $table->string('nr_a');
            $table->string('nr_w');
            $table->string('nr_kd');
            $table->string('ge_k');
            $table->string('ge_d');
            $table->string('ge_a');
            $table->string('ge_w');
            $table->string('ge_kd');
            $table->string('t_kd');
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
        Schema::dropIfExists('cards');
    }
}
