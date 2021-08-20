<?php

namespace Database\Seeders;
use Database\Seeders\MapSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\VideoSeeder;
use Database\Seeders\BombDefSeeder;
use Database\Seeders\PositionSeeder;

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
            UserSeeder::class,
            VideoSeeder::class
        ]);
    }
}
