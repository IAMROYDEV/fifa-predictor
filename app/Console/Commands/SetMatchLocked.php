<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetMatchLocked extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:setlock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the match status to lock before an hour for the match';

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
        $matchService->setLock();
    }
}
