<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function ($table) {
            $table->increments('id');
            $table->integer('team1');
            $table->integer('team2');
            $table->integer('winning_team')->nullable();
            $table->integer('team1_score')->nullable();
            $table->integer('team2_score')->nullable();
            $table->boolean('is_draw')->default(0);
            $table->dateTime('is_done')->nullable();
            $table->dateTime('played_date')->nullable();
            $table->integer('world_cup_id');
            $table->integer('match_stage_id');
            $table->timestamps();
        });
        Schema::create('user_match_predictions', function ($table) {
            $table->increments('id');
            $table->integer('match_id');
            $table->integer('winning_team')->nullable();
            $table->boolean('is_draw')->nullable();
            $table->integer('team1_score')->nullable();
            $table->integer('team2_score')->nullable();
            $table->integer('user_id');
            $table->integer('points')->nullable();
            $table->timestamps();
        });
        Schema::create('match_stages', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
        Schema::table('player_logs', function ($table) {
            $table->integer('match_id')->nullable();
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
        Schema::dropIfExists('user_match_predictions');
        Schema::dropIfExists('match_stages');
        Schema::table('player_logs', function ($table) {
            $table->dropColumn('match_id');
        });
    }
}
