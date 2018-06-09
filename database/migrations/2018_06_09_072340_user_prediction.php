<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPrediction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_global_predictions', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('predictor', [
                'golden ball',
                'golden boot',
                'golden glove',
                'world cup winner',
                'favourite team',
            ]);
            $table->integer('player_id')->nullable();
            $table->integer('team_id')->nullable();
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
        Schema::dropIfExists('user_global_predictions');
    }
}
