<?php

namespace App\Services;

use App\Match;
use App\User;
use App\PlayerLog;
use DB;
use App\UserMatchSquadScore;
use App\UserMatchPrediction;

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

    public function calculateMatchPredictionScore()
    {
        $correctPrediction = env('MATCH_PREDICTION_CORRECT_POINTS');
        $correctResult = env('MATCH_PREDICTION_WORNG_RESULT_POINTS');
        $singleMatchCorrectScore = env('MATCH_PREDICTION_WORNG_ONETEAM_POINTS');
        $matches = Match::where([['is_done', 1],['match_prediction_score_done', 0]])->get();
        foreach ($matches as $match) {
            $users = User::all();
            foreach ($users as $user) {
                $userMatchPrediction = UserMatchPrediction::where([
                    ['user_id', $user->id],
                    ['match_id', $match->id]
                ])->get()->first();
                if ($userMatchPrediction !== null && $userMatchPrediction->team1_score !== null && $userMatchPrediction->team2_score !== null) {
                    $points = 0;
                    // prefect prediction
                    if ($userMatchPrediction->team1_score === $match->team1_score && $userMatchPrediction->team2_score === $match->team2_score) {
                        $points = $correctPrediction;
                    } else {
                        // if any one team score was predicted correctly by user
                        if ($userMatchPrediction->team1_score === $match->team1_score || $userMatchPrediction->team2_score === $match->team2_score) {
                            $points = $points + $singleMatchCorrectScore;
                        }
                        // if match draw and user predicted correct as draw
                        if ($match->is_draw === 1 && $userMatchPrediction->team1_score === $userMatchPrediction->team2_score) {
                            $points = $points + $correctResult;
                        } elseif ($userMatchPrediction->team1_score !== $userMatchPrediction->team2_score) {
                            // if match was won and user predict one team will win
                            $userWinningTeam = $userMatchPrediction->team1_score > $userMatchPrediction->team2_score ? $match->team1 : $match->team2;
                            // if user winning team matches the team that won
                            if ($match->winning_team === $userWinningTeam) {
                                $points = $points + $correctResult;
                            }
                        }
                    }
                    // save points
                    $userMatchPrediction->points = $points;
                    $userMatchPrediction->save();
                    $user->match_prediction_score = $user->match_prediction_score + $points;
                    $user->save();
                }
            }
        }
    }
}
