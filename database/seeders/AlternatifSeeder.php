<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_alternatif')->insert([
            'id'=>1,
            'tahun'=>'2021',
            'id_kecamatan'=>1,
            'id_kriteria'=>1,
            'nilai'=>'1200',
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);
    }
}
