<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGlobalPrediction;
use App\GlobalSetting;

class FavouriteController extends Controller
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
    public function save()
    {
        $allowChange=GlobalSetting::whereRule('GLOBAL_PREDICTION_ALLOW_CHANGE')->first();
        $predictor=request('predictor');
        $user=auth()->user();
        $team_id=request('team_id');
        $player_id=request('player_id');
        if (!$predictor || !$user || (!$team_id && !$player_id)) {
            // dd(request()->all());
            return redirect()->back()->with('error', 'team or player missing');
        }
        if (!$allowChange || !$allowChange->flag) {
            return redirect()->route('user.dashboard')->with('error', 'change disabled');
        }
        $prediction=UserGlobalPrediction::wherePredictor($predictor)->where(function ($query) use ($player_id,$team_id) {
            $query->where('player_id', $player_id)
                    ->orWhere('team_id', $team_id);
        })->where('user_id', $user->id)->first();
        if ($prediction) {
            $prediction->player_id=$player_id;
            $prediction->team_id=$team_id;
            $prediction->save();
        } else {
            $prediction=UserGlobalPrediction::create([
                'user_id'=>$user->id,
                'team_id'=>$team_id,
                'player_id'=>$player_id,
                'predictor'=>$predictor
            ]);
        }
        
        return redirect()->route('user.dashboard')->with('success', "{$predictor} chosen successfully");
    }
}
