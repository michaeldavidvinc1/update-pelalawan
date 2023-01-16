<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiAsetModel extends Model
{
    protected $table = 'kondisi_aset';
    protected $primaryKey = 'id_kondisi_aset';
    protected $fillable = [
        'id_tahun',
        'baik',
        'rusak_ringan',
        'rusak_berat',
        'defunct_ind'
    ];
    use HasFactory;
}
