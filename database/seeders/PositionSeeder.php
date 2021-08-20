<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class PositionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csvs/positions.csv';

        $this->tablename = 'positions';
    }

    public function run()
    {
        parent::run();
    }
}
