<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMatchSquadScore;
use App\Leaderboard;

class LeaderboardController extends Controller
{
    public function index($type='')
    {
        // if (!auth()->user() || !auth()->user()->is_admin) {
        //     return view('match.leaderboard');
        // }
        $rankLimit=25;
        $type=$type ? : request('type');
        $squads=Leaderboard::whereType('squad')
                    ->orderBy('rank', 'ASC')->whereNotNull('rank')
                    ->where('rank', '>', 0)
                    ->where('rank', '<=', $rankLimit)->get();
        $predictions=Leaderboard::whereType('predictions')
                    ->orderBy('rank', 'ASC')->whereNotNull('rank')
                    ->where('rank', '>', 0)
                    ->where('rank', '<=', $rankLimit)->get();
        $all=Leaderboard::whereType('all')
                    ->orderBy('rank', 'ASC')->whereNotNull('rank')
                    ->where('rank', '>', 0)
                    ->where('rank', '<=', $rankLimit)->get();
        $selfRank=collect([]);
        if (auth()->user()) {
            $selfRank=auth()->user()->leaderboards;
        }
        return view('leaderboard.index', compact('predictions', 'squads', 'all', 'type', 'rankLimit', 'selfRank'));
    }
}
