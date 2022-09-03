<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kriteria')->insert([
            'id'=>1,
            'kode_kriteria'=>'C01',
            'nama_kriteria'=>'Curah Hujan',
            'bobot'=>0.35,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ] );
                        
        DB::table('tb_kriteria')->insert([
            'id'=>2,
            'kode_kriteria'=>'C02',
            'nama_kriteria'=>'Kemiringan Lereng',
            'bobot'=>0.30,
            'created_at'=>'2022-07-10 09:06:27',
            'updated_at'=>'2022-07-10 09:06:27',
            'deleted_at'=>NULL
            ] );
                        
        DB::table('tb_kriteria')->insert([
            'id'=>3,
            'kode_kriteria'=>'C03',
            'nama_kriteria'=>'Tekstur Tanah',
            'bobot'=>0.35,
            'created_at'=>'2022-07-10 09:06:37',
            'updated_at'=>'2022-07-10 09:06:37',
            'deleted_at'=>NULL
            ] );
                        
        
    }
}
