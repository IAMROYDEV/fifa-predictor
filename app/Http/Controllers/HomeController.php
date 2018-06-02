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
        $this->middleware('auth');
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
        
        if ($user->is_admin === 1) {
            return redirect()->route('admin');
        } else {
            $teams = Team::get();
            $query = $slectedCode = $players = '';
            $searchKey = (isset($params['search'])) ? $params['search'] : '';
            if(isset($params['team']) || $searchKey) {
                $team = Team::where('code', $params['team'])->first();
                if(!empty($team)) {
                    $slectedCode = $team->code;
                    $players  = Player::where('name', 'LIKE', '%' . $searchKey . '%')->where('team_id', $team->id)->get();
                } else {
                    $players  = Player::where('name', 'LIKE', '%' . $searchKey . '%')->get();
                }
            } 
            
            return view('home', ['teams' => $teams, 'players' => $players, 'slectedCode' => $slectedCode, 'searchKey' => $searchKey]);
        }
    }
}
