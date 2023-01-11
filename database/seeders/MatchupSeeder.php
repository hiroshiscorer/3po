<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matchups')->insert([
            'id' => 1,
            'team1_id' => '1',
            'team2_id' => '2',
            'team1_score' => '3',
            'team2_score' => '0',
            'round' => '1',
            'division_id' => 2,
            'created_at' => null,
            'updated_at' => null
        ]);
    }
}
