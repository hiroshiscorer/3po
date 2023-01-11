<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            'id' => 1,
            'division_name' => 'Gundark',
            'season_id' => '2',
            'rounds' => 2,
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('divisions')->insert([
            'id' => 2,
            'division_name' => 'Tauntaun',
            'season_id' => '2',
            'rounds' => 2,
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
    }
    // Exogorth - giant asteroid worm
    // Gundark - pull its ears
    // Wampa - Hoth snow monster
    // Tauntaun - smelly camels
    // Worrt - tatooine toad at jabba's
}
