<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'id' => 1,
            'team_name' => 'Bonk Droids',
            'initials' => 'TRA',
            'logo' => 'bonk-droids.png',
            'club' => 'The Rebel Alliance',
            'division_id' => '1',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('teams')->insert([
            'id' => 2,
            'team_name' => 'Cookie Monsters',
            'initials' => 'TRA',
            'logo' => 'cookie-monsters.png',
            'club' => 'The Rebel Alliance',
            'division_id' => '1',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('teams')->insert([
            'id' => 3,
            'team_name' => 'Randolorians',
            'initials' => 'RANDO',
            'logo' => 'rando.png',
            'club' => 'The Randolorians',
            'division_id' => '2',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
    }
}
