<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerLog extends Model
{
    protected $guarded =[] ;
    public function player()
    {
        return $this->belongsTo(\App\Player::class);
    }
}
