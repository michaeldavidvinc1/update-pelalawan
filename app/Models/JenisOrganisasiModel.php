<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisOrganisasiModel extends Model
{
    protected $table = 'jenis_organisasi';
    protected $primaryKey = 'id_jenis';
    protected $fillable = [
        'nama_organisasi',
        'defunct_ind'
    ];
    use HasFactory;
}
