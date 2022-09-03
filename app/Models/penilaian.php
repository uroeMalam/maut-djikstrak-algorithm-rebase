<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class penilaian extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_penilaian';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'tahun', 'id_kecamatan', 'id_kriteria', 'id_subkriteria'
    ];

    public function AllData()
    {
        return DB::table($this->table)
                    ->select(
                        'tb_penilaian.id',
                        'tb_penilaian.tahun',
                        'tb_kecamatan.kecamatan',
                        'tb_kriteria.nama_kriteria',
                        'tb_subkriteria.nama_subkriteria',
                        )
                    ->join('tb_kecamatan', 'tb_penilaian.id_kecamatan', '=', 'tb_kecamatan.id')
                    ->join('tb_kriteria', 'tb_penilaian.id_kriteria', '=', 'tb_kriteria.id')
                    ->join('tb_subkriteria', 'tb_penilaian.id_subkriteria', '=', 'tb_subkriteria.id')
                    ->where('tb_penilaian.deleted_At',null)
                    ->get();
    }
}
