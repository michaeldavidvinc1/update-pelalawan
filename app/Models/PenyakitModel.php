<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitModel extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey = 'id_penyakit';
    protected $fillable = [
        'nama_penyakit',
        'defunct_ind'
    ];
    use HasFactory;
}
