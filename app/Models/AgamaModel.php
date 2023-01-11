<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgamaModel extends Model
{
    protected $table = 'agama';
    protected $primaryKey = 'id_agama';
    protected $fillable = [
        'agama',
        'defunct_ind'
    ];
    use HasFactory;
}
