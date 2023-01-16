<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKawinModel extends Model
{
    protected $table = 'status_kawin';
    protected $primaryKey = 'id_status_kawin';
    protected $fillable = [
        'status_kawin',
        'defunct_ind'
    ];
    use HasFactory;
}
