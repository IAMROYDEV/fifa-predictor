<?php

use Illuminate\Database\Seeder;
use App\Team;
use App\Player;

class player_teams_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::truncate();
        Player::truncate();
        $file= \File::get(storage_path('json/players.json'));
        if ($file) {
            $file=json_decode($file, true);
            foreach ($file as $teamName => $players) {
                $teamName=trim($teamName);
                if (!$teamName) {
                    continue;
                }
                $team = Team::create([
                    'name' => $teamName,
                    'group' => $players['group']
                ]);
                foreach ($players['players'] as  $player) {
                    if (!$player['name']) {
                        continue;
                    }
                    $dob='';
                    if ($player['dob']) {
                        preg_match('/\(.*?\)/', $player['dob'], $dob);
                        $dob=$dob[0];
                        $dob=str_replace('(', '', $dob);
                        $dob=str_replace(')', '', $dob);
                    }
                    $player=Player::create([
                        'team_id'   => $team->id,
                        'name'      => $player['name'],
                        'dob'       => ($dob ? new \Carbon\Carbon($dob) : null),
                        'position'  => $player['position'],
                        'caps'      => $player['caps'] ? : 0,
                        'goals'     => $player['goals'] ? : 0,
                        'club'      => $player['club'],
                    ]);
                }
            }
        }
    }
}
