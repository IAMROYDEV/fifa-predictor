<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMatchPrediction extends Model
{
    protected $fillable = [
        'user_id', 'match_id', 'team1_score', 'team2_score'
    ];
}
