<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\MatchStage;
use App\UserMatchPrediction;

class MatchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request, $worldCupId)
    {
        $stageSelected= 0;
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
            $stageSelected = $params['stage'];
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

        return view('match.index', ['matches' => $matches, 'stages' => $stages, 'selectStage' => $stageSelected]);
    }

    public function setUserMatchPrediction(Request $request)
    {
        $params = $request->all();
        $user =  auth()->user();
        $match = Match::find($params['match_id']);
        if ($match->locked === 0) {
            $userMatchPrediction = UserMatchPrediction::where([['match_id', $params['match_id']],['user_id', $user->id]])->get()->first();
            $userMatchPrediction->update($params);
        }
    }
}
