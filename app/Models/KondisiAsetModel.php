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
        'nama_aset',
        'jumlah',
        'kondisi',
        'defunct_ind'
    ];
    use HasFactory;
}
