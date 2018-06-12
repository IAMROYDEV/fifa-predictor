<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Team;
use App\Player;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['faq', 'privacyPolicy', 'rules', 'termsService']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $params = $request->all();
        $teams = Team::get();
        $slectedCode = $players = '';
        if(isset($params['team'])) { 
            $team = Team::where('code', $params['team'])->first();
            if(!empty($team)) {
                $slectedCode = $team->code;
                $players  = Player::where('team_id', $team->id)->get();
            } else {
                $players = Player::orderBy('goals', 'DESC')->get();
            }
        } else {
            $players = Player::orderBy('goals', 'DESC')->get();
        }
        
        return view('home', ['teams' => $teams, 'players' => $players, 'slectedCode' => $slectedCode, 'user' => Auth::user()]);
        
    }
    
    
    public function addPlayers(Request $request, $player_id) {
        $user = Auth::user();
        if($user->players()->where('player_id', $player_id)->count()) {
            $user->players()->detach($player_id);
            if($user->player_id == $player_id) {
                $user->player_id = null;
                $user->save();
            }
            return response()->json([
                'status'  => 200,
                'message' => 'removed player successfully',
                'results' => 0,
            ], 200);
        } else {
            if($user->players()->count() == 11) {
                return response()->json([
                    'status'  => 400,
                    'message' => 'Maximum 11 players allowed!',
                    'results' => 0,
                ], 400);
            }
            $user->players()->attach($player_id);
            $player = Player::find($player_id);
            return view('partial.addPlayers', ['player' => $player]);
            
        }
    }
    
    public function selectCaptain(Request $request, $captain_id) {
        $user = Auth::user();
        $user->player_id = $captain_id;
        $user->save();
        return response()->json([
            'status'  => 200,
            'message' => 'Selected captain successfully',
            'results' => 1,
        ], 200);
    }
    
    public function lockSquad(Request $request) {
        $user = Auth::user();
        if($user->players()->count() < 11) {
            return response()->json([
                    'status'  => 400,
                    'message' => 'Please select 11 players to lock the team!',
                    'results' => 0,
                ], 400);
        }
        if(!$user->player_id) {
            return response()->json([
                    'status'  => 400,
                    'message' => 'Please select captain for your team!!',
                    'results' => 0,
                ], 400);
        }
        $user->is_team_locked = 1;;
        $user->save();
        return response()->json([
            'status'  => 200,
            'message' => 'team locked successfully',
            'results' => 1,
        ], 200);
    }
    
    public function faq(Request $request) {
        return view('partial.faq');
    }
    public function rules(Request $request) {
        return view('partial.rules');
    }
    public function privacyPolicy(Request $request) {
        return view('partial.privacyPolicy');
    }
    public function termsService(Request $request) {
        return view('partial.termsService');
    }
}
