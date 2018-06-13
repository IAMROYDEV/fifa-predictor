<?php

namespace App\Services;

use App\Match;
use App\User;
use App\PlayerLog;
use DB;
use App\UserMatchSquadScore;

class MatchService
{
    public function setLock()
    {
        $dateTime = new \DateTime();
        $matches = Match::where('locked', 0)->get();
        foreach ($matches as $match) {
            if ($match->played_date !== null) {
                $matchTime = new \DateTime($match->played_date);
                $interval = $dateTime->diff($matchTime);
                if ($interval->format('%y%m%d%h') === "0000") {
                    $match->locked = 1;
                    $match->save();
                }
            }
        }
    }

    public function calculateSquadScore()
    {
        $pointsPerGoal = env('SQUAD_GOAL_POINTS');
        $matches = Match::where([['is_done', 1],['squad_score_done', 0]])->get();
        $users = User::where('is_team_locked', 1)->get();
        foreach ($matches as $match) {
            $scorers = PlayerLog::where('match_id', $match->id)->pluck('goals_scored', 'player_id')->toArray();
            foreach ($users as $user) {
                $points = 0;
                $squadScorers = DB::table('user_player')->whereIn('player_id', array_keys($scorers))->where('user_id', $user->id)->pluck('player_id')->toArray();
                foreach ($squadScorers as $squadScorer) {
                    $goalPoints = 0;
                    $goalPoints = $scorers[$squadScorer] * $pointsPerGoal;
                    if ($user->player_id == $squadScorer) {
                        $goalPoints = $goalPoints * 2;
                    }
                    $points = $points + $goalPoints;
                }
                // points earn by the user in a match
                $userMatchSquadScore = new UserMatchSquadScore();
                $userMatchSquadScore->user_id = $user->id;
                $userMatchSquadScore->match_id = $match->id;
                $userMatchSquadScore->points = $points;
                $userMatchSquadScore->save();
                // add points to user total squad score
                $user->squad_score = $user->squad_score + $points;
                $user->save();
            }
            $match->squad_score_done = 1;
            $match->save();
        }
    }
}
