<?php

namespace App\Exports;

use App\Models\DesaModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DesaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DesaModel::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Desa',
            'Laki_Laki',
            'Perempuan',
            'Total',
            'Rumah_Tangga',
        ];
    }
}
