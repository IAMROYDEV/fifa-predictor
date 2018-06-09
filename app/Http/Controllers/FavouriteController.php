<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGlobalPrediction;

class FavouriteController extends Controller
{
    public function save()
    {
        $predictor=request('predictor');
        $user=auth()->user();
        $team_id=request('team_id');
        $player_id=request('player_id');
        if (!$predictor || !$user || (!$team_id && !$player_id)) {
            // dd(request()->all());
            return redirect()->back()->with('error', 'team or player missing');
        }
        $prediction=UserGlobalPrediction::wherePredictor($predictor)->where(function ($query) use ($player_id,$team_id) {
            $query->where('player_id', $player_id)
                    ->orWhere('team_id', $team_id);
        })->first();
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
        
        return redirect()->back()->with('success', "{$predictor} chosen successfully");
    }
}
