<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maps')->insert([
            [
                'id' => 1, 
                'MapName' => 'Mirage',
                'MapImagePath'=>'/image/maps-image/mirage.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 2, 
                'MapName' => 'Inferno',
                'MapImagePath'=>'/image/maps-image/inferno.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 3, 
                'MapName' => 'Dust2',
                'MapImagePath'=>'/image/maps-image/dust2.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 4, 
                'MapName' => 'Overpass',
                'MapImagePath'=>'/image/maps-image/overpass.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 5, 
                'MapName' => 'Cache',
                'MapImagePath'=>'/image/maps-image/cache.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 6, 
                'MapName' => 'Train',
                'MapImagePath'=>'/image/maps-image/train.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 7, 
                'MapName' => 'Nuke',
                'MapImagePath'=>'/image/maps-image/nuke.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 8, 
                'MapName' => 'Vertigo',
                'MapImagePath'=>'/image/maps-image/vertigo.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 9, 
                'MapName' => 'Ancient',
                'MapImagePath'=>'/image/maps-image/ancient.jpg' ,
                'width'=>750,
                'height'=>540,
            ]
        ]);
    }
}
