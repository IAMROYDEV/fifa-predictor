<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\MatchStage;
use App\UserMatchPrediction;

class MatchController extends Controller
{
    public function index(Request $request, $worldCupId)
    {
        $user = auth()->user();
        $allMatches = Match::where('world_cup_id', $worldCupId)->get();
        foreach ($allMatches as $match) {
            $userMatch = UserMatchPrediction::where([['match_id', $match->id],['user_id', $user->id]])->get()->first();
            if ($userMatch === null) {
                UserMatchPrediction::create(['match_id'=> $match->id, 'user_id' => $user->id]);
            }
        }
        $params = $request->all();
        $stages = MatchStage::all();
        if (isset($params['stage'])) {
            $matches = Match::select('matches.*', 'user_match_predictions.team1_score as user_team1_score', 'user_match_predictions.team2_score as user_team2_score', 'user_match_predictions.points as user_points')
            ->leftJoin('user_match_predictions', 'user_match_predictions.match_id', '=', 'matches.id')
            ->where('user_match_predictions.user_id', $user->id)
            ->where([['world_cup_id', $worldCupId],['match_stage_id', $params['stage']]])->get();
        } else {
            $matches = Match::select('matches.*', 'user_match_predictions.team1_score as user_team1_score', 'user_match_predictions.team2_score as user_team2_score', 'user_match_predictions.points as user_points')
            ->leftJoin('user_match_predictions', 'user_match_predictions.match_id', '=', 'matches.id')
            ->where('user_match_predictions.user_id', $user->id)
            ->where('world_cup_id', $worldCupId)->get();
        }

        return view('match.index', ['matches' => $matches, 'stages' => $stages]);
    }

    public function setUserMatchPrediction(Request $request)
    {
        $params = $request->all();
        $user =  auth()->user();
        $userMatchPrediction = UserMatchPrediction::where([['match_id', $params['match_id']],['user_id', $user->id]])->get()->first();
        $userMatchPrediction->update($params);
    }
}
