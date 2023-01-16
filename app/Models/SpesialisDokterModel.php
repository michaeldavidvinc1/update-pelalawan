<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesialisDokterModel extends Model
{
    protected $table = 'spesialis_dokter';
    protected $primaryKey = 'id_spesialis';
    protected $fillable = [
        'nama_spesialis',
        'defunct_ind'
    ];
    use HasFactory;
}
