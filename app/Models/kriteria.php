<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class kriteria extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_kriteria';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kode_kriteria', 'nama_kriteria', 'bobot', 'jenis' ,'keterangan'
    ];
}
