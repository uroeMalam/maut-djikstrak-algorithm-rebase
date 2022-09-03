<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('tb_kecamatan')->insert([
                'id'=>1,
                'kecamatan'=>'Sawang',
                'latitude'=>'5.0645474',
                'longitude'=>'96.7482257',
                'created_at'=>'2022-07-10 02:06:08',
                'updated_at'=>'2022-08-05 11:11:21',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>2,
                'kecamatan'=>'Nisam',
                'latitude'=>'5.1739716',
                'longitude'=>'96.9756457',
                'created_at'=>'2022-08-05 10:32:50',
                'updated_at'=>'2022-08-05 11:11:54',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>3,
                'kecamatan'=>'Nisam Antara',
                'latitude'=>'5.0136036',
                'longitude'=>'96.7978827',
                'created_at'=>'2022-08-05 10:33:05',
                'updated_at'=>'2022-08-05 11:12:17',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>4,
                'kecamatan'=>'Banda Baro',
                'latitude'=>'5.1841155',
                'longitude'=>'96.9392327',
                'created_at'=>'2022-08-05 11:12:34',
                'updated_at'=>'2022-08-05 11:12:34',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>5,
                'kecamatan'=>'Kuta Makmur',
                'latitude'=>'5.0942472',
                'longitude'=>'96.9731679',
                'created_at'=>'2022-08-05 11:12:53',
                'updated_at'=>'2022-08-05 11:12:53',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>6,
                'kecamatan'=>'Simpang Kramat',
                'latitude'=>'5.053513',
                'longitude'=>'96.9967658',
                'created_at'=>'2022-08-05 11:13:11',
                'updated_at'=>'2022-08-05 11:13:11',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>7,
                'kecamatan'=>'Syantalira Bayu',
                'latitude'=>'5.0825797',
                'longitude'=>'97.1061498',
                'created_at'=>'2022-08-05 11:13:32',
                'updated_at'=>'2022-08-05 11:13:32',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>8,
                'kecamatan'=>'Geuredong Pase',
                'latitude'=>'4.9649893',
                'longitude'=>'96.8721857',
                'created_at'=>'2022-08-05 11:14:04',
                'updated_at'=>'2022-08-05 11:14:04',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>9,
                'kecamatan'=>'Meurah Mulia',
                'latitude'=>'5.0609506',
                'longitude'=>'97.1550682',
                'created_at'=>'2022-08-05 11:14:28',
                'updated_at'=>'2022-08-05 11:14:39',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>10,
                'kecamatan'=>'Matang Kuli',
                'latitude'=>'5.0306326',
                'longitude'=>'97.2377972',
                'created_at'=>'2022-08-05 11:14:59',
                'updated_at'=>'2022-08-05 11:14:59',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>11,
                'kecamatan'=>'Paya Bakong',
                'latitude'=>'4.9337458',
                'longitude'=>'97.1615209',
                'created_at'=>'2022-08-05 11:15:20',
                'updated_at'=>'2022-08-05 11:15:20',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>12,
                'kecamatan'=>'Pirak Timu',
                'latitude'=>'4.9890076',
                'longitude'=>'97.2469218',
                'created_at'=>'2022-08-05 11:15:37',
                'updated_at'=>'2022-08-05 11:15:37',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>13,
                'kecamatan'=>'Cot Girek',
                'latitude'=>'4.8617892',
                'longitude'=>'97.2096691',
                'created_at'=>'2022-08-05 11:15:53',
                'updated_at'=>'2022-08-05 11:15:53',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>14,
                'kecamatan'=>'Tanah Jambo Aye',
                'latitude'=>'5.1006693',
                'longitude'=>'97.3220792',
                'created_at'=>'2022-08-05 11:16:17',
                'updated_at'=>'2022-08-05 11:16:17',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>15,
                'kecamatan'=>'Langkahan',
                'latitude'=>'4.9212165',
                'longitude'=>'97.2979212',
                'created_at'=>'2022-08-05 11:16:36',
                'updated_at'=>'2022-08-05 11:16:36',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>16,
                'kecamatan'=>'Seunuddon',
                'latitude'=>'5.1979356',
                'longitude'=>'97.3366938',
                'created_at'=>'2022-08-05 11:16:53',
                'updated_at'=>'2022-08-05 11:16:53',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>17,
                'kecamatan'=>'Baktiya',
                'latitude'=>'5.0624565',
                'longitude'=>'97.2681486',
                'created_at'=>'2022-08-05 11:17:14',
                'updated_at'=>'2022-08-05 11:17:14',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>18,
                'kecamatan'=>'Baktiya Barat',
                'latitude'=>'5.1296336',
                'longitude'=>'97.2749644',
                'created_at'=>'2022-08-05 11:17:36',
                'updated_at'=>'2022-08-05 11:17:36',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>19,
                'kecamatan'=>'Lhoksukon',
                'latitude'=>'5.0354053',
                'longitude'=>'97.2978613',
                'created_at'=>'2022-08-05 11:17:59',
                'updated_at'=>'2022-08-05 11:17:59',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>20,
                'kecamatan'=>'Tanah Luas',
                'latitude'=>'4.9827987',
                'longitude'=>'96.9848577',
                'created_at'=>'2022-08-05 11:18:20',
                'updated_at'=>'2022-08-05 11:18:20',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>21,
                'kecamatan'=>'Nibong',
                'latitude'=>'5.0448621',
                'longitude'=>'97.1830878',
                'created_at'=>'2022-08-05 11:18:41',
                'updated_at'=>'2022-08-05 11:18:41',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>22,
                'kecamatan'=>'Samudera',
                'latitude'=>'5.0450312',
                'longitude'=>'97.1830877',
                'created_at'=>'2022-08-05 11:19:18',
                'updated_at'=>'2022-08-05 11:19:18',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>23,
                'kecamatan'=>'Syamtalira Aron',
                'latitude'=>'5.101235',
                'longitude'=>'97.2220022',
                'created_at'=>'2022-08-05 11:19:36',
                'updated_at'=>'2022-08-05 11:19:36',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>24,
                'kecamatan'=>'Tanah Pasir',
                'latitude'=>'5.1341261',
                'longitude'=>'97.2295148',
                'created_at'=>'2022-08-05 11:19:55',
                'updated_at'=>'2022-08-05 11:19:55',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>25,
                'kecamatan'=>'Lapang',
                'latitude'=>'5.1443601',
                'longitude'=>'97.2558787',
                'created_at'=>'2022-08-05 11:20:14',
                'updated_at'=>'2022-08-05 11:20:14',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>26,
                'kecamatan'=>'Muara Batu',
                'latitude'=>'5.239684',
                'longitude'=>'96.9139108',
                'created_at'=>'2022-08-05 11:20:39',
                'updated_at'=>'2022-08-05 11:20:39',
                'deleted_at'=>NULL
                ] );
                            
                DB::table('tb_kecamatan')->insert([
                'id'=>27,
                'kecamatan'=>'Dewantara',
                'latitude'=>'5.2343055',
                'longitude'=>'96.9714242',
                'created_at'=>'2022-08-05 11:20:59',
                'updated_at'=>'2022-08-05 11:20:59',
                'deleted_at'=>NULL
                ] );
    }
}
