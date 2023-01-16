<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsnModel extends Model
{
    protected $table = 'asn';
    protected $primaryKey = 'id_asn';
    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'pendidikan_terakhir',
        'id_bidang_ilmu',
        'id_organisasi',
        'defunct_ind'
    ];
    use HasFactory;
}
