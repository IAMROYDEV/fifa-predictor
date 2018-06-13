<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetSquadScore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:squadscore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate the squad score for each match which is done.';

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
        $matchService = new \App\Services\MatchService();
        $matchService->calculateSquadScore();
    }
}
