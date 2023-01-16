<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitMenonjolModel extends Model
{
    protected $table = 'penyakit_menonjol';
    protected $primaryKey = 'id_penyakit_menonjol';
    protected $fillable = [
        'id_tahun',
        'id_penyakit',
        'defunct_ind'
    ];
    use HasFactory;
}
