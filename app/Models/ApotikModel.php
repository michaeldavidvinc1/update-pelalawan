<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApotikModel extends Model
{
    protected $table = 'apotik';
    protected $primaryKey = 'id_apotik';
    protected $fillable = [
        'name_apotik',
        'alamat_apotik',
        'bidang_usaha',
        'apoteker',
        'defunct_ind'
    ];
    use HasFactory;
}
