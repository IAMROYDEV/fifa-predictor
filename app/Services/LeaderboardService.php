<?php
namespace App\Service;

use App\UserMatchSquadScore;
use App\Leaderboard;
use App\UserMatchPrediction;

class LeaderboardService
{
    public function squadScoreRankCalculations()
    {
        $matchSquads=UserMatchSquadScore::selectRaw('user_id,sum(points) as `total_points`')
                        ->groupBy('user_id')
                        ->orderBy('total_points', 'DESC')->get();
        $matchSquads=$this->_calculateRank($matchSquads);
        $this->updateOrCreateLeaderboardInfo($matchSquads, 'squad');
    }
    public function matchPredictionRankCalculations()
    {
        $matchSquads=UserMatchPrediction::selectRaw('user_id,sum(points) as `total_points`')
                        ->groupBy('user_id')
                        ->orderBy('total_points', 'DESC')->get();
        $matchSquads=$this->_calculateRank($matchSquads);
        $this->updateOrCreateLeaderboardInfo($matchSquads, 'predictions');
    }
    public function allRankCalculations()
    {
        $matchSquads=Leaderboard::selectRaw('user_id,sum(points) as `total_points`')
                        ->where('type', '!=', 'all')
                        ->groupBy('user_id')
                        ->orderBy('total_points', 'DESC')->get();
        $matchSquads=$this->_calculateRank($matchSquads);
        $this->updateOrCreateLeaderboardInfo($matchSquads, 'all');
    }
    public function updateOrCreateLeaderboardInfo($collections, $type)
    {
        foreach ($collections as $col) {
            $lead=Leaderboard::whereUserId($col->user_id)->whereType($type)->first();
            if (!$lead) {
                $lead=new Leaderboard;
            }
            if ($lead->points===$col->total_points && $lead->rank===$col->ranks) {
                continue; //skip updating if no change
            }
            $lead->type=$type;
            $lead->user_id=$col->user_id;
            $lead->points=$col->total_points;
            if ($lead->rank) {
                $lead->up_down=($lead->rank > $col->rank) ? 'up' : 'down';
            }
            $lead->rank=$col->rank;
            $lead->save();
        }
    }
    public function _calculateRank($collections)
    {
        $ranks=[];
        foreach ($collections as $collection) {
            if (!$collection->total_points) {
                continue;
            }
            if (array_search($collection->total_points, $ranks)===false) {
                $ranks[]=$collection->total_points;
            }
        }
        $ranks=array_unique(array_reverse(array_sort($ranks)));
        foreach ($collections as $collection) {
            if (!$collection->total_points) {
                continue;
            }
            $collection->rank=array_search($collection->total_points, $ranks) + 1;
        }

        return $collections;
    }
}
