<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use App\Player;
use App\PlayerLog;

class updateGoalScored extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateGoalScored';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update goal scored by every player';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->getPlayer();
        // scrap the wiki page
        // get all palyer
        // get goal for that year for that play
        // save it in DB
    }
    
    public function getPlayer()
    {
        $html=$this->getHTML();
        // $goal=$this->getDOM($html, '/wiki/Edinson_Cavani');
        // dd($goal);
        $players=Player::get();
        foreach ($players as  $player) {
            $href=$player->href;
            $goals=$this->getDOM($html, $href);
            if ($goals && $player->wc_2018_goals!=$goals) {
                echo "{$player->href}, $goals";
                $player->wc_2018_goals=$goals;
                $player->save();
                PlayerLog::create([
                    'player_id' => $player->id,
                    'goals_scored'     => $goals
                ]);
            }
        }
    }
    public function getHTML()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://en.wikipedia.org/wiki/List_of_FIFA_World_Cup_goalscorers
');
        return (string) $res->getBody();
    }

    public function getDOM($html, $href, $wc2018ColIndex='1')
    {
        $crawler=new Crawler($html);
        try {
            $goal=$crawler->filter("[href='{$href}']")
                        ->parents()
                        ->eq(3)
                        ->filter("td:nth-last-child(1)")
                        ->text();
        } catch (\Exception $e) {
            $goal=0;
        }
        
        return (int) $goal;
    }
}
