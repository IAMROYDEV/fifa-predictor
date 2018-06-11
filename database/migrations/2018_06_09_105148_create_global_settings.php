<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\GlobalSetting;

class CreateGlobalSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_settings', function ($table) {
            $table->increments('id');
            $table->string('rule');
            $table->boolean('flag')->nullable();
            $table->timestamps();
        });
        GlobalSetting::create([
            'rule'=>'GLOBAL_PREDICTION_ALLOW_CHANGE' ,
            'flag'=> true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_settings');
    }
}
