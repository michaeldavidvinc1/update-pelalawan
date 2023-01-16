<?php

namespace App\Http\Controllers;

use App\Models\AlatKontrasepsiModel;
use App\Models\PenggunaanKontrasepsiModel;
use App\Models\TahunModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaanKontrasepsiController extends Controller
{
    public function index()
    {
        $data = DB::table('penggunaan_kontrasepsi')
            ->join('tahun', 'penggunaan_kontrasepsi.id_tahun', '=', 'tahun.id_tahun')
            ->join('alat_kontrasepsi', 'penggunaan_kontrasepsi.id_kontrasepsi', '=', 'alat_kontrasepsi.id_kontrasepsi')
            ->select('penggunaan_kontrasepsi.*', 'tahun.tahun', 'alat_kontrasepsi.nama_kontrasepsi')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.penggunaan-kontrasepsi.penggunaanKontrasepsi', [
            'tahun' => TahunModel::all()->where('defunct_ind', 'N'),
            'kontrasepsi' => AlatKontrasepsiModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'id_tahun' => 'required|max:255',
            'id_kontrasepsi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        PenggunaanKontrasepsiModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_penggunaan_kontrasepsi;
        $validatedData = $request->validate([
            'id_tahun' => 'required|max:255',
            'id_kontrasepsi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        PenggunaanKontrasepsiModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
