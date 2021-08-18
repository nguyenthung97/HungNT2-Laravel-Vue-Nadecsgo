<?php

namespace Database\Seeders;
use Database\Seeders\MapSeeder;
use Database\Seeders\BombDefSeeder;
use Database\Seeders\PositionSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call([
            MapSeeder::class,
            BombDefSeeder::class,
            PositionSeeder::class,
        ]);
    }
}
