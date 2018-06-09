<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\UserGlobalPrediction;
use App\GlobalSetting;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userID=auth()->user()->id;
        $predictions=UserGlobalPrediction::whereUserId($userID)->groupBy('predictor')->get();
        $allowChange=GlobalSetting::whereRule('GLOBAL_PREDICTION_ALLOW_CHANGE')->first();
        if ($allowChange && $allowChange->flag) {
            $allowChange=true;
        }
        $teams=Team::orderBy('name', 'ASC')->get();
        $players=Player::orderBy('team_id')->orderBy('name', 'ASC')->get();
        $changeField=request('change');
        return view('user.dashboard', compact('teams', 'players', 'predictions', 'allowChange', 'changeField'));
    }
}
