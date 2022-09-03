<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_subkriteria')->insert([
            'id'=>1,
            'id_kriteria'=>1,
            'nama_subkriteria'=>'Sangat Tinggi',
            'nilai'=>'5300 - 6000',
            'bobot'=>1,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>2,
            'id_kriteria'=>1,
            'nama_subkriteria'=>'Lebat',
            'nilai'=>'4200 - 5299',
            'bobot'=>2,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>3,
            'id_kriteria'=>1,
            'nama_subkriteria'=>'Sedang',
            'nilai'=>'3100 - 4199',
            'bobot'=>3,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>4,
            'id_kriteria'=>1,
            'nama_subkriteria'=>'Ringan',
            'nilai'=>'2000 - 3099',
            'bobot'=>4,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>5,
            'id_kriteria'=>1,
            'nama_subkriteria'=>' Sangat Ringan',
            'nilai'=>'0 - 1999',
            'bobot'=>5,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>6,
            'id_kriteria'=>2,
            'nama_subkriteria'=>'Sangat Curam',
            'nilai'=>'40,01-100',
            'bobot'=>1,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>7,
            'id_kriteria'=>2,
            'nama_subkriteria'=>'Curam',
            'nilai'=>'25,01-40',
            'bobot'=>2,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>8,
            'id_kriteria'=>2,
            'nama_subkriteria'=>'Agak Curam',
            'nilai'=>'15,01 - 25',
            'bobot'=>3,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>9,
            'id_kriteria'=>2,
            'nama_subkriteria'=>'Landai',
            'nilai'=>'8,01 - 15',
            'bobot'=>4,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>10,
            'id_kriteria'=>2,
            'nama_subkriteria'=>'Datar',
            'nilai'=>'0 - 8',
            'bobot'=>5,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>11,
            'id_kriteria'=>3,
            'nama_subkriteria'=>'Kasar',
            'nilai'=>1,
            'bobot'=>1,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>12,
            'id_kriteria'=>3,
            'nama_subkriteria'=>'Sedang',
            'nilai'=>2,
            'bobot'=>2,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_subkriteria')->insert([
            'id'=>13,
            'id_kriteria'=>3,
            'nama_subkriteria'=>'Halus',
            'nilai'=>3,
            'bobot'=>3,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

    }
}
