<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKesehatanModel extends Model
{
    protected $table = 'tenaga_kesehatan';
    protected $primaryKey = 'id_nakes';
    protected $fillable = [
        'nama_nakes',
        'id_konsentrasi',
        'id_spesialis',
        'id_organisasi',
        'defunct_ind'
    ];
    use HasFactory;
}
