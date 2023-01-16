<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAsetModel extends Model
{
    protected $table = 'tahun_aset';
    protected $primaryKey = 'id_tahun_aset';
    protected $fillable = [
        'id_organisasi',
        'id_jenis_aset',
        'id_tahun',
        'defunct_ind'
    ];
    use HasFactory;
}
