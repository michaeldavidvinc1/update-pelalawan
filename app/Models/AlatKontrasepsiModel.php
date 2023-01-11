<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatKontrasepsiModel extends Model
{
    protected $table = 'alat_kontrasepsi';
    protected $primaryKey = 'id_kontrasepsi';
    protected $fillable = [
        'nama_kontrasepsi',
        'defunct_ind'
    ];
    use HasFactory;
}
