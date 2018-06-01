<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(player_teams_seeder::class);
        $this->call(add_code_col_to_teams::class);
    }
}
