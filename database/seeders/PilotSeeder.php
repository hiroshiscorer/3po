<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PilotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pilots')->insert([
            'id' => 1,
            'pilot_name' => 'Scorer',
            'team_id' => '1',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilots')->insert([
            'id' => 2,
            'pilot_name' => 'Kuki',
            'team_id' => '2',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilots')->insert([
            'id' => 3,
            'pilot_name' => 'Sharper',
            'team_id' => '2',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilots')->insert([
            'id' => 4,
            'pilot_name' => 'Billy',
            'team_id' => '2',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilots')->insert([
            'id' => 5,
            'pilot_name' => 'Ghost',
            'team_id' => '1',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
        DB::table('pilots')->insert([
            'id' => 6,
            'pilot_name' => 'mikesk8s',
            'team_id' => '1',
            'misc' => '',
            'created_at' => null,
            'updated_at' => null
        ]);
    }
}
