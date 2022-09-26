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
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->required();
            $table->unsignedBigInteger('pool_id')->required();
            $table->unsignedBigInteger('game_id')->required();
            $table->integer('score_team_a');
            $table->integer('score_team_b');
            $table->integer('points');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pool_id')->references('id')->on('pools');
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predictions');
    }
};
