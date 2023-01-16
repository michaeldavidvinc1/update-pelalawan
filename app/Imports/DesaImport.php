<?php

namespace App\Imports;

use App\Models\DesaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DesaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DesaModel([
            'kecamatan'     => $row['Kecamatan'],
            'lakilaki'    => $row['Laki - Laki'],
            'perempuan'    => $row['Perempuan'],
            'total'    => $row['L + P'],
            'rumah_tangga'    => $row['Rumah Tangga'],
            'luas_wilayah'    => $row['Luas Wilayah'],
        ]);
    }
}
