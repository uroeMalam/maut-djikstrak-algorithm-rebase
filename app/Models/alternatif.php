<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class alternatif extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_alternatif';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'tahun', 'id_kecamatan', 'id_kriteria', 'nilai'
    ];

    public function AllData()
    {
        return DB::table($this->table)
                    ->select(
                        'tb_alternatif.id',
                        'tb_alternatif.tahun',
                        'tb_kecamatan.kecamatan',
                        'tb_kriteria.nama_kriteria',                        
                        'tb_alternatif.nilai',
                        )
                    ->join('tb_kecamatan', 'tb_alternatif.id_kecamatan', '=', 'tb_kecamatan.id')
                    ->join('tb_kriteria', 'tb_alternatif.id_kriteria', '=', 'tb_kriteria.id')
                    ->where('tb_alternatif.deleted_At',null)
                    ->get();
    }
}
