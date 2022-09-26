<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id_a')->required();
            $table->unsignedBigInteger('team_id_b')->required();
            $table->unsignedBigInteger('stadium_id')->required();
            $table->integer('score_team_a');
            $table->integer('score_team_b');
            $table->dateTime('date_game');
            $table->timestamps();

            $table->foreign('team_id_a')->references('id')->on('teams');
            $table->foreign('team_id_b')->references('id')->on('teams');
            $table->foreign('stadium_id')->references('id')->on('stadiums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
