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
            'steam_id' => '76561198862856552',
            'name' => 'ChocoPocky',
            'role' => 'admin',
            'avatar' => 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/35/350527411f9a1908470222f0544b817b2f861de7_medium.jpg',
            'created_at' => '2021-08-19 19:04:53',
            'updated_at' => '2021-08-19 19:04:53'
        ]);
    }
}
