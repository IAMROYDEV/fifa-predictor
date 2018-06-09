<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGlobalPrediction extends Model
{
    protected $guarded=[];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
