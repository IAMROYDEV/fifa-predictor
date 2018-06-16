<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMatchSquadScore;
use App\Leaderboard;

class LeaderboardController extends Controller
{
    public function index($type='')
    {
        $type=$type ? : request('type');
        $squads=Leaderboard::whereType('squad')
                    ->orderBy('rank', 'ASC')->whereNotNull('rank')->where('rank', '!=', 0)->get();
        $predictions=Leaderboard::whereType('predictions')
                    ->orderBy('rank', 'ASC')->whereNotNull('rank')->where('rank', '!=', 0)->get();
        $all=Leaderboard::whereType('all')
                    ->orderBy('rank', 'ASC')->whereNotNull('rank')->where('rank', '!=', 0)->get();
        return view('leaderboard.index', compact('predictions', 'squads', 'all', 'type'));
    }
}
