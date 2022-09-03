<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class nilaiahp extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_nilaiahp';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_kriteria_a', 'id_kriteria_b', 'bobot'
    ];

    public function AllData()
    {
        return DB::table($this->table)
                    ->select(
                        'tb_nilaiahp.*',
                        'a.nama_kriteria as nama_kriteria_a',
                        'b.nama_kriteria as nama_kriteria_b',
                        )
                    ->join('tb_kriteria as a', 'tb_nilaiahp.id_kriteria_a', '=', 'a.id')
                    ->join('tb_kriteria as b', 'tb_nilaiahp.id_kriteria_b', '=', 'b.id')
                    ->where('tb_nilaiahp.deleted_At',null)
                    ->get();
    }
}
