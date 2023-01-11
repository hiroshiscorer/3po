<?php

namespace Database\Seeders;

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
        $this->call(SeasonSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(PilotSeeder::class);
        $this->call(MatchupSeeder::class);
        $this->call(MatchSeeder::class);
        $this->call(PilotStatSeeder::class);
        $this->call(UserSeeder::class);
    }
}
