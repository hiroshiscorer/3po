<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matches')->insert([
            'id' => 1,
            'match_round' => 'Something vs something',
            'matchup_id' => '1',
            'game' => '1',
            'map' => 'Esseles',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('matches')->insert([
            'id' => 2,
            'match_round' => 'Something vs Something',
            'matchup_id' => '1',
            'game' => '1',
            'map' => 'Fostar Haven',
            'created_at' => null,
            'updated_at' => null
        ]);
    }
}
