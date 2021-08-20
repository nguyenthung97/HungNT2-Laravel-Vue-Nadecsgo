<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class VideoSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csvs/video_nades.csv';
        $this->tablename = 'videos';
    }

    public function run()
    {
        // runs the seeder - alternatively, you could call $this->runSeeder(); for the same result
        parent::run();
    }
}
