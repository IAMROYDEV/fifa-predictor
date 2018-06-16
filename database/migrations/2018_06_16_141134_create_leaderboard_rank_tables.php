<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaderboardRankTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaderboards', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('type', ['all','squad','predictions']);
            $table->integer('rank')->nullable()->default(0);
            $table->integer('points')->default(0);
            $table->enum('up_down', ['up','down'])->nullable();
            $table->integer('rank_diff')->nullable()->default(0);
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
        Schema::dropIfExists('leaderboards');
    }
}
