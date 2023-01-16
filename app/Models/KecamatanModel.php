<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $fillable = [
        'kecamatan',
        'lakilaki',
        'perempuan',
        'total',
        'rumah_tangga',
        'luas_wilayah',
        'defunct_ind',
    ];
    use HasFactory;
}
