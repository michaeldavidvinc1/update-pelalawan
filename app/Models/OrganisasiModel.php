<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisasiModel extends Model
{
    protected $table = 'organisasi';
    protected $primaryKey = 'id_organisasi';
    protected $fillable = [
        'name_organisasi',
        'id_jenis',
        'kelompok',
        'id_desa',
        'id_kecamatan',
        'defunct_ind'
    ];
    use HasFactory;
}
