<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaModel extends Model
{
    protected $table = 'desa';
    protected $primaryKey = 'id_desa';
    protected $fillable = [
        'desa',
        'lakilaki',
        'perempuan',
        'total',
        'rumah_tangga',
        'defunct_ind',
    ];
    use HasFactory;
}
