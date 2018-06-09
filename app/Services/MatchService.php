<?php

namespace App\Services;

use App\Match;

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
}
