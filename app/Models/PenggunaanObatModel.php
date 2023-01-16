<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanObatModel extends Model
{
    protected $table = 'penggunaan_obat';
    protected $primaryKey = 'id_penggunaan_obat';
    protected $fillable = [
        'id_tahun',
        'obat_paten',
        'obat_generik',
        'defunct_ind'
    ];
    use HasFactory;
}
