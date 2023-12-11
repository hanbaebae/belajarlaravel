<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use \DB;

class MRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            $data = [
                [
                    'id' => 1,
                    'name' => 'Admin',
                ],
                [
                    'id' => 2,
                    'name' => 'Kabid',
                ],
                [
                    'id' => 3,
                    'name' => 'Kadis',
                ],
                [
                    'id' => 4,
                    'name' => 'Konselor',
                ],
                [
                    'id' => 5,
                    'name' => 'Subkord',
                ],
                [
                    'id' => 6,
                    'name' => 'OPD',
                ],
                [
                    'id' => 7,
                    'name' => 'Hotline',
                ],
                [
                    'id' => 8,
                    'name' => 'Asisten',
                ],
                [
                    'id' => 9,
                    'name' => 'Kelurahan',
                ],
                [
                    'id' => 10,
                    'name' => 'Kecamatan',
                ],
                [
                    'id' => 11,
                    'name' => 'Klien',
                ],
                [
                    'id' => 12,
                    'name' => 'Psikolog',
                ],
                [
                    'id' => 13,
                    'name' => 'Penulis Konten',
                ],
                [
                    'id' => 14,
                    'name' => 'Mahasiswa',
                ],
                [
                    'id' => 15,
                    'name' => 'Fasilitator',
                ],
            ];
            
            foreach ($data as $key => $value) {
                DB::table('m_role')->updateOrInsert(['id' => $value['id']], [
                    'name' => $value['name'],
                ]);
            }

            $lastId = DB::table('m_role')->orderBy('id', 'desc')->first();
            if(!empty($lastId))
            {
                $newLastId = $lastId->id + 1;
                DB::update(DB::raw("ALTER SEQUENCE m_role_id_seq RESTART WITH {$newLastId}"));
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            echo $ex->getMessage();
        }
    }
}
