<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangilmuModel extends Model
{
    protected $table = 'bidang_ilmu';
    protected $primaryKey = 'id_bidang_ilmu';
    protected $fillable = [
        'bidang_ilmu',
        'defunct_ind'
    ];
    use HasFactory;
}
