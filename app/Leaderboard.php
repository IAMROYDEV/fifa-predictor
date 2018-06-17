<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $guarded =[] ;
    
    
    /**
    * Get the user
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
