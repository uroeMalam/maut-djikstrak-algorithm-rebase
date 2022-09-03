<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class subkriteria extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_subkriteria';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_kriteria', 'nama_subkriteria', 'bobot', 'keterangan'
    ];

    public function AllData()
    {
        return DB::table($this->table)
                    ->select(
                        'tb_subkriteria.*',
                        'tb_kriteria.nama_kriteria',
                        )
                    ->join('tb_kriteria', 'tb_subkriteria.id_kriteria', '=', 'tb_kriteria.id')
                    ->where('tb_subkriteria.deleted_At',null)
                    ->get();
    }
}
