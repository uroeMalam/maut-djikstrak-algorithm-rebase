<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class lahan extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_lahan';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_kecamatan', 'luas'
    ];

    public function AllData()
    {
        return DB::table($this->table)
                    ->select(
                        'tb_lahan.id',
                        'tb_kecamatan.kecamatan',
                        'tb_lahan.luas',
                        )
                    ->join('tb_kecamatan', 'tb_lahan.id_kecamatan', '=', 'tb_kecamatan.id')
                    ->where('tb_lahan.deleted_At',null)
                    ->get();
    }
}
