<?php

namespace App\Http\Controllers;

use App\Models\PenggunaanObatModel;
use App\Models\TahunModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaanObatController extends Controller
{
    public function index()
    {
        $data = DB::table('penggunaan_obat')
            ->join('tahun', 'penggunaan_obat.id_tahun', '=', 'tahun.id_tahun')
            ->select('penggunaan_obat.*', 'tahun.tahun')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.penggunaan-obat.penggunaanObat', [
            'tahun' => TahunModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'id_tahun' => 'required|max:255',
            'obat_paten' => 'required|max:255',
            'obat_generik' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        PenggunaanObatModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_penggunaan_obat;
        $validatedData = $request->validate([
            'id_tahun' => 'required|max:255',
            'obat_paten' => 'required|max:255',
            'obat_generik' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        PenggunaanObatModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
