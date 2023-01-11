<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'email' => 'hiroshi_scorer@yahoo.com',
            'name' => 'Scorer',
            'email_verified_at' => null,
            'password' => '$2y$10$nG3DfMYfD8VGcD2huIS4renfDTPIWCQiAUyaHAK9JcByEIWTIKMxa'
        ]);

    }
}
