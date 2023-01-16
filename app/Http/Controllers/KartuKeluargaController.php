<?php

namespace App\Http\Controllers;

use App\Models\DesaModel;
use App\Models\KartuKeluargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KartuKeluargaController extends Controller
{
    public function index()
    {
        $data = DB::table('kartu_keluarga')
        ->join('desa', 'kartu_keluarga.id_desa', '=', 'desa.id_desa')
        ->select('kartu_keluarga.*', 'desa.desa')
        ->latest()
        ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.kartu-keluarga.kartuKeluarga', [
            'desa' => DesaModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'no_kk' => 'required|max:255',
            'alamat_kk' => 'required|max:255',
            'rt_kk' => 'required|max:255',
            'rw_kk' => 'required|max:255',
            'kodepos_kk' => 'required|max:255',
            'id_desa' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        KartuKeluargaModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_kartu_keluarga;
        $validatedData = $request->validate([
            'no_kk' => 'required|max:255',
            'alamat_kk' => 'required|max:255',
            'rt_kk' => 'required|max:255',
            'rw_kk' => 'required|max:255',
            'kodepos_kk' => 'required|max:255',
            'id_desa' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        KartuKeluargaModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
