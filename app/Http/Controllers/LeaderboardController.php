<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMatchSquadScore;
use App\Leaderboard;

class LeaderboardController extends Controller
{
    public function index()
    {
        $matchSquads=Leaderboard::whereType('squad')
                    ->orderBy('rank', 'ASC')->whereNotNull('rank')->where('rank', '!=', 0)->get();
        return view('leaderboard.index', compact('matchSquads'));
    }
}
