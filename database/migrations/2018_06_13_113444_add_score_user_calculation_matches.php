<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScoreUserCalculationMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('squad_score')->nullable();
            $table->integer('match_prediction_score')->nullable();
            $table->integer('bonus_score')->nullable();
            $table->integer('rank')->nullable();
        });
        Schema::table('matches', function (Blueprint $table) {
            $table->boolean('squad_score_done')->default(0);
            $table->boolean('match_prediction_score_done')->default(0);
        });
        Schema::create('user_match_squad_scores', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('match_id');
            $table->integer('points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('squad_score');
            $table->dropColumn('match_prediction_score');
            $table->dropColumn('bonus_score');
            $table->dropColumn('rank');
        });
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn('squad_score_done');
            $table->dropColumn('match_prediction_score_done');
        });
        Schema::dropIfExists('user_match_squad_scores');
    }
}
