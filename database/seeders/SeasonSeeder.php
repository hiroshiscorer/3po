<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            'id' => 1,
            'season_name' => 'Season 3',
            'type' => 'league',
            'rounds' => 3,
            'show' => 0,
            'misc' => '',
            'created_at' => '2021-12-11 00:00:00',
            'updated_at' => null
        ]);
        DB::table('seasons')->insert([
            'id' => 2,
            'season_name' => 'Season 4',
            'type' => 'league',
            'rounds' => 3,
            'show' => 0,
            'misc' => '',
            'created_at' => '2022-09-15 00:00:00',
            'updated_at' => null
        ]);

    }
}
