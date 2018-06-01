<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Team;
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
        if ($user->is_admin === 1) {
            return redirect()->route('admin');
        } else {
            $teams = Team::get();
            return view('home', ['teams' => $teams]);
        }
    }
}
