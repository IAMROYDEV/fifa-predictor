<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\MatchStage;
use App\UserMatchPrediction;
use App\Team;
use App\WorldCup;
use App\Http\Requests\AddMatchRequest;
use App\Player;
use App\PlayerLog;

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

        return view('match.index', ['matches' => $matches, 'stages' => $stages, 'selectStage' => $stageSelected, 'user' => $user]);
    }
    
    
    public function listMatches(Request $request)
    {
        $teams = Team::get();
        $tournaments = WorldCup::get();
        $matches = Match::get();
        return view('admin.listMatches', ['teams' => $teams, 'tournaments' => $tournaments, 'matches' => $matches]);
    }
    
    public function addMatches(AddMatchRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', 'Validation error');
        }
        $params = $request->all();
        $match = Match::create($params);
        if ($match) {
            return redirect()->back()->with('success', "Match added successfully");
        }
        return redirect()->back()->with('error', 'Somthing went wrong on server side');
    }
    
    public function updateMatch(AddMatchRequest $request, $match_id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', 'Validation error');
        }
        $match = Match::find($match_id);
        if (!$match) {
            return redirect()->back()->with('error', 'Match not found');
        }
        $params = $request->all();
        unset($params['_token']);
        $match = Match::where('id', $match_id)->update($params);
        if ($match) {
            return redirect()->route('listmatches')->with('success', "Match updated successfully");
        }
        return redirect()->back()->with('error', 'Somthing went wrong on server side');
    }
    
    public function editMatch(Request $request, $match_id)
    {
        $match = Match::find($match_id);
        if (!$match) {
            return redirect()->back()->with('error', 'Match not found');
        }
        $teams = Team::get();
        $tournaments = WorldCup::get();
        $goalsScored=PlayerLog::selectRaw('*,sum(goals_scored) as `goals`')
                            ->whereMatchId($match->id)
                            ->groupBy('player_id')->get();
        $totGoalsScored=$goalsScored->reduce(function ($carry, $item) {
            return abs($carry)+abs($item->goals);
        }, 0);
        $goalsRecorded=$match->team1_score+$match->team2_score;
        $players=Player::whereIn('team_id', [$match->team1,$match->team2])->orderBy('team_id')->orderBy('name', 'ASC')->get();
        return view('admin.editMatch', compact('teams', 'tournaments', 'match', 'players', 'goalsScored', 'totGoalsScored', 'goalsRecorded'));
    }
    
    public function deleteMatch(Request $request, $match_id)
    {
        $match = Match::find($match_id);
        if (!$match) {
            return redirect()->back()->with('error', 'Match not found');
        }
        $matchPred = UserMatchPrediction::where('match_id', $match_id)->count();
        if ($matchPred) {
            return redirect()->back()->with('error', 'Already user predicted for this match');
        }
        $match = Match::destroy($match_id);
        if ($match) {
            return redirect()->route('listmatches')->with('success', "Match deleted successfully");
        }
        return redirect()->back()->with('error', 'Somthing went wrong on server side');
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

    public function saveGoals()
    {
        $player_id=request('playerID');
        $match_id=request('matchID');
        $goals=request('goals');
        if (!$player_id || !$match_id || !$goals) {
            return 'some values missing';
        }
        $log=PlayerLog::create([
        'player_id'=>$player_id,
        'match_id'=>$match_id,
        'goals_scored'=>$goals
       ]);
        return $log;
    }
    public function removeGoals()
    {
        $player_id=request('playerID');
        $match_id=request('matchID');
        if (!$player_id || !$match_id) {
            return redirect()->back()->with('error', 'some values missing');
        }
        PlayerLog::whereMatchId($match_id)->wherePlayerId($player_id)->delete();
        return redirect()->back()->with('success', 'deleted goals scorer');
    }
}
