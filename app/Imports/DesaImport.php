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
        $rumah_tangga = 0;
        if($row['rumah_tangga'] == null) {
            $rumah_tangga = 0;
        } else {
            $rumah_tangga = $row['rumah_tangga'];
        }
        return new DesaModel([
            'desa'     => $row['desa'],
            'lakilaki'    => $row['laki_laki'],
            'perempuan'    => $row['perempuan'],
            'total'    => $row['total'],
            'rumah_tangga'    => $rumah_tangga,
            'defunct_ind' => 'N'
        ]);
    }
}
