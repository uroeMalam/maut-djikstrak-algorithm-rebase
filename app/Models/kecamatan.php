<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;

class kecamatan extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_kecamatan';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kecamatan', 'latitude', 'longitude'
    ];
}
