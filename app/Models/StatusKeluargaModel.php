<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKeluargaModel extends Model
{
    protected $table = 'status_keluarga';
    protected $primaryKey = 'id_status_keluarga';
    protected $fillable = [
        'status_keluarga',
        'defunct_ind'
    ];
    use HasFactory;
}
