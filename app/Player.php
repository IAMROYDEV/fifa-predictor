<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded =[] ;
    public $dates = ['dob'];
    public function team()
    {
        return $this->belongsTo(\App\Team::class);
    }
}
