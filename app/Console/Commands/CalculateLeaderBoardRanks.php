<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\LeaderboardService;

class CalculateLeaderBoardRanks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculateLeaderboardRanks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this will update ranks for players for all three category main,squad and predictions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(LeaderBoardService $service)
    {
        $this->service=$service;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->info('starting rank calculations');
            $this->line('calculating squad ranks');
            $this->service->squadScoreRankCalculations();
            $this->line('calculating match predictions ranks');
            $this->service->matchPredictionRankCalculations();
            $this->line('calculating all ranks');
            $this->service->allRankCalculations();
            $this->info('calculation completed');
        } catch (\Exception $e) {
            $this->error('some error');
            echo  $e->getMessage();
        }
    }
}
