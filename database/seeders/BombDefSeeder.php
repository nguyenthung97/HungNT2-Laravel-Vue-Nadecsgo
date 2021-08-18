<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BombDefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bombs_defs')->insert([
            [
                'id'=>1,
                'BombName'=>'Smoke',
            ],
            [
                'id'=>2,
                'BombName'=>'Molotov',
            ],
            [
                'id'=>3,
                'BombName'=>'Flash',
            ],
            [
                'id'=>4,
                'BombName'=>'Grenade',
            ],
        ]);
    }
}
