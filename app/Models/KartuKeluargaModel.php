<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluargaModel extends Model
{
    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'id_kartu_keluarga';
    protected $fillable = [
        'no_kk',
        'alamat_kk',
        'rt_kk',
        'rw_kk',
        'kodepos_kk',
        'id_desa',
        'defunct_ind'
    ];
    use HasFactory;
}
