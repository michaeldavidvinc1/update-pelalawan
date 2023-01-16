<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunModel extends Model
{
    protected $table = 'tahun';
    protected $primaryKey = 'id_tahun';
    protected $fillable = [
        'tahun',
        'defunct_ind'
    ];
    use HasFactory;
}
