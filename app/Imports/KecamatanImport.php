<?php

namespace App\Imports;

use App\Models\KecamatanModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KecamatanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rumah_tangga = 0;
        $luas_wilayah = 0;

        if($row['rumah_tangga'] == null) {
            $rumah_tangga = 0;
        } else {
            $rumah_tangga = $row['rumah_tangga'];
        }

        if($row['luas_wilayah'] == null) {
            $luas_wilayah = 0;
        } else {
            $luas_wilayah = $row['luas_wilayah'];
        }

        return new KecamatanModel([
            'kecamatan'     => $row['kecamatan'],
            'lakilaki'    => $row['laki_laki'],
            'perempuan'    => $row['perempuan'],
            'total'    => $row['total'],
            'rumah_tangga'    => $rumah_tangga,
            'luas_wilayah'    => $luas_wilayah,
            'defunct_ind' => 'N'
        ]);
    }

}
