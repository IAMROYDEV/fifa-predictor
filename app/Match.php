<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $guarded =[] ;
    public function teamA()
    {
        return $this->belongsTo(Team::class, 'team1');
    }
    public function teamB()
    {
        return $this->belongsTo(Team::class, 'team2');
    }
    public function matchStage()
    {
        return $this->belongsTo(MatchStage::class);
    }
}
