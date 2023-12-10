<?php

namespace Database\Seeders;

use App\Models\MPendidikanTerakhirModel;
use Illuminate\Database\Seeder;

class PendidikanTerakhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "SD"
            ],
            [
                "name" => "SMP"
            ],
            [
                "name" => "SMA"
            ],
        ];

        MPendidikanTerakhirModel::insert($data);
    }
}
