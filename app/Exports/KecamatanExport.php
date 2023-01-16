<?php

namespace App\Exports;

use App\Models\KecamatanModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KecamatanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KecamatanModel::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'Puskesmas',
            'Laki - Laki',
            'Perempuan',
            'L + P',
            'Rumah Tangga',
            'Luas Wilayah',
        ];
    }
}
