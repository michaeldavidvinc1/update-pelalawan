<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAsetModel extends Model
{
    protected $table = 'jenis_aset';
    protected $primaryKey = 'id_jenis_aset';
    protected $fillable = [
        'nama_aset',
        'id_organisasi',
        'defunct_ind'
    ];
    use HasFactory;
}
