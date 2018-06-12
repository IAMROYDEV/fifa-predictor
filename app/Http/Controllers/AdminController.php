<?php

namespace App\Http\Controllers;

use App\WorldCup;
use App\Team;
use App\Player;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $worldCups = WorldCup::all();
        return view('admin', ['worldCups' => $worldCups]);
    }

    public function worldCupShow($id)
    {
        $worldCup = WorldCup::find($id);
        $teams = Team::where('world_cup_id', $worldCup->id)->get();
        $players = Player::join('teams', 'teams.id', '=', 'players.team_id')->where('teams.world_cup_id', $worldCup->id)->get();
        return view('admin.worldCupShow', ['worldCup' => $worldCup, 'teams' => $teams, 'players' => $players]);
    }

    public function admin_index()
    {
        $users = User::all();
        return view('admin.userIndex', ['users' => $users]);
    }

    public function admin_update(Request $request, $id)
    {
        $params = $request->all();

        $user = User::find($id);
        $user->is_admin = isset($params['is_admin']) ? 1:0;
        
        if ($user->save()) {
            return redirect()->route('admin.users.list');
        }
    }
}
