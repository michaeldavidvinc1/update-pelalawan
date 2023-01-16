<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanKontrasepsiModel extends Model
{
    protected $table = 'penggunaan_kontrasepsi';
    protected $primaryKey = 'id_penggunaan_kontrasepsi';
    protected $fillable = [
        'id_tahun',
        'id_kontrasepsi',
        'defunct_ind'
    ];
    use HasFactory;
}
