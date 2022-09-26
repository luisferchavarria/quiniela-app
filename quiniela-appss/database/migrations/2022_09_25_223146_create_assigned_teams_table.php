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
        Schema::create('assigned_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id')->required();
            $table->unsignedBigInteger('group_id')->required();
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_teams');
    }
};
