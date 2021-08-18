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
                'MapImagePath'=>'../maps-image/mirage.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 2, 
                'MapName' => 'Inferno',
                'MapImagePath'=>'../maps-image/inferno.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 3, 
                'MapName' => 'Dust2',
                'MapImagePath'=>'../maps-image/dust2.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 4, 
                'MapName' => 'Overpass',
                'MapImagePath'=>'../maps-image/overpass.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 5, 
                'MapName' => 'Cache',
                'MapImagePath'=>'../maps-image/cache.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 6, 
                'MapName' => 'Train',
                'MapImagePath'=>'../maps-image/train.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 7, 
                'MapName' => 'Nuke',
                'MapImagePath'=>'../maps-image/nuke.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 8, 
                'MapName' => 'Vertigo',
                'MapImagePath'=>'../maps-image/vertigo.jpg' ,
                'width'=>750,
                'height'=>540,
            ],
            [
                'id' => 9, 
                'MapName' => 'Ancient',
                'MapImagePath'=>'../maps-image/ancient.jpg' ,
                'width'=>750,
                'height'=>540,
            ]
        ]);
    }
}
