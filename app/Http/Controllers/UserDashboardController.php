<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\UserGlobalPrediction;
use App\GlobalSetting;
use App\Match;
use \App\UserMatchPrediction;

class UserDashboardController extends Controller
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
    
    public function index()
    {
        $userID=auth()->user()->id;
        $predictions=UserGlobalPrediction::whereUserId($userID)->groupBy('predictor')->get();
        $allowChange=GlobalSetting::whereRule('GLOBAL_PREDICTION_ALLOW_CHANGE')->first();
        if ($allowChange && $allowChange->flag) {
            $allowChange=true;
        } else {
            $allowChange=false;
        }
        $user=auth()->user();
        $teams=Team::orderBy('name', 'ASC')->get();
        $players=Player::orderBy('team_id')->orderBy('name', 'ASC')->get();
        $changeField=request('change');
        // \Session::flash('error', "Special message goes here");
        
        $currentMatch = Match::where('played_date', '>=', \Illuminate\Support\Carbon::today()->toDateString())->orderBy('played_date','ASC')->first();
        $currentMatchPrediction = UserMatchPrediction::where('match_id', $currentMatch->id)
                                    ->where('user_id', $userID)->first();

        return view('user.dashboard', compact('teams', 'players', 'predictions', 'allowChange', 'changeField', 'user', 'currentMatch', 'currentMatchPrediction'));
    }
}
