<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PilotStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pilot_stats')->insert([
            'id' => 1,
            'pilot_id' => 1,
            'score' => 1615,
            'kills' => 11,
            'deaths' => 8,
            'assists' => 4,
            'match_id' => 1,
            'match_won' => 1,
            'match_tied' => 0,
            'match_lost' => 0,
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilot_stats')->insert([
            'id' => 2,
            'pilot_id' => 2,
            'score' => 1170,
            'kills' => 5,
            'deaths' => 7,
            'assists' => 4,
            'match_id' => 1,
            'match_won' => 0,
            'match_tied' => 0,
            'match_lost' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilot_stats')->insert([
            'id' => 3,
            'pilot_id' => 3,
            'score' => 115,
            'kills' => 3,
            'deaths' => 2,
            'assists' => 7,
            'match_id' => 1,
            'match_won' => 0,
            'match_tied' => 0,
            'match_lost' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilot_stats')->insert([
            'id' => 4,
            'pilot_id' => 4,
            'score' => 255,
            'kills' => 1,
            'deaths' => 8,
            'assists' => 7,
            'match_id' => 1,
            'match_won' => 0,
            'match_tied' => 0,
            'match_lost' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilot_stats')->insert([
            'id' => 5,
            'pilot_id' => 5,
            'score' => 1233,
            'kills' => 9,
            'deaths' => 0,
            'assists' => 4,
            'match_id' => 1,
            'match_won' => 1,
            'match_tied' => 0,
            'match_lost' => 0,
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilot_stats')->insert([
            'id' => 6,
            'pilot_id' => 6,
            'score' => 346,
            'kills' => 2,
            'deaths' => 4,
            'assists' => 4,
            'match_id' => 1,
            'match_won' => 1,
            'match_tied' => 0,
            'match_lost' => 0,
            'created_at' => null,
            'updated_at' => null
        ]);
    }
}
