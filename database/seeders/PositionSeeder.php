<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $row = 1;
        // if (($handle = fopen(base_path("public/de_infernoxlsx.csv"), "r")) !== false) {
        //     while (($data = fgetcsv($handle, 0, ",")) !== false) {
        //         if ($row === 1) {
        //             $row++;
        //             continue;
        //         }
        //         $row++;

        //         $dbData = [
        //             'MapID' => '"'.$data[0].'"',
        //             'PosName' => '"'.$data[1].'"',
        //             'Counter' => '"'.$data[2].'"',
        //             'posTop' => '"'.$data[3].'"',
        //             'posLeft' => '"'.$data[4].'"',
        //         ];

        //         $colNames = array_keys($dbData);

        //         $createQuery = 'INSERT INTO positions ('.implode(',', $colNames).') VALUES ('.implode(',', $dbData).')';

        //         DB::statement($createQuery, $data);
        //         $this->command->info($row);
        //     }
        //     fclose($handle);
        // }
    }
}
