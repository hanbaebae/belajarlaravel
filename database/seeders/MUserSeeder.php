<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use \DB;
use Illuminate\Support\Facades\Hash;

class MUserSeeder extends Seeder
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
                    'name' => 'Administrator',
                    'username' => 'admin',
                    'id_role' => config('env.role.admin'),
                    'password' => config('env.default_password'),
                ],
                
                [
                    'id' => 2,
                    'name' => 'Kabid',
                    'username' => 'kabid',
                    'id_role' => config('env.role.kabid'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 3,
                    'name' => 'Kadis',
                    'username' => 'kadis',
                    'id_role' => config('env.role.kadis'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 4,
                    'name' => 'Konselor',
                    'username' => 'konselor',
                    'id_role' => config('env.role.konselor'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 5,
                    'name' => 'Subkord',
                    'username' => 'subkord',
                    'id_role' => config('env.role.subkord'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 6,
                    'name' => 'OPD',
                    'username' => 'opd',
                    'id_role' => config('env.role.opd'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 7,
                    'name' => 'hotline',
                    'username' => 'hotline',
                    'id_role' => config('env.role.hotline'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 8,
                    'name' => 'Asisten',
                    'username' => 'asisten',
                    'id_role' => config('env.role.asisten'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 9,
                    'name' => 'Kelurahan',
                    'username' => 'kelurahan',
                    'id_role' => config('env.role.kelurahan'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 10,
                    'name' => 'Kecamatan',
                    'username' => 'kecamatan',
                    'id_role' => config('env.role.kecamatan'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 11,
                    'name' => 'Klien',
                    'username' => 'klien',
                    'id_role' => config('env.role.klien'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 12,
                    'name' => 'Psikolog',
                    'username' => 'psikolog',
                    'id_role' => config('env.role.psikolog'),
                    'password' => config('env.default_password'),
                ],
                [
                    'id' => 13,
                    'name' => 'Penulis Konten',
                    'username' => 'pkonten',
                    'id_role' => config('env.role.penulis'),
                    'password' => config('env.default_password'),
                ],
            ];

            foreach ($data as $key => $value) {
                DB::table('m_user')->updateOrInsert(['id' => $value['id']], [
                    'name' => $value['name'],
                    'username' => $value['username'],
                    'id_role' => $value['id_role'],
                    'password' => Hash::make($value['password']),
                ]);
            }

            $lastId = DB::table('m_user')->orderBy('id', 'desc')->first();
            if(!empty($lastId))
            {
                $newLastId = $lastId->id + 1;
                DB::update(DB::raw("ALTER SEQUENCE m_user_id_seq RESTART WITH {$newLastId}"));
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            echo $ex->getMessage();
        }
    }
}
