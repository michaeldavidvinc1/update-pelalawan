<?php

namespace App\Http\Controllers;

use App\Models\PenyakitMenonjolModel;
use App\Models\PenyakitModel;
use App\Models\TahunModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyakitMenonjolController extends Controller
{
    public function index()
    {
        $data = DB::table('penyakit_menonjol')
            ->join('tahun', 'penyakit_menonjol.id_tahun', '=', 'tahun.id_tahun')
            ->join('penyakit', 'penyakit_menonjol.id_penyakit', '=', 'penyakit.id_penyakit')
            ->select('penyakit_menonjol.*', 'tahun.tahun', 'penyakit.nama_penyakit')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.penyakit-menonjol.penyakitMenonjol', [
            'tahun' => TahunModel::all()->where('defunct_ind', 'N'),
            'penyakit' => PenyakitModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'id_tahun' => 'required|max:255',
            'id_penyakit' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        PenyakitMenonjolModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_penyakit_menonjol;
        $validatedData = $request->validate([
            'id_tahun' => 'required|max:255',
            'id_penyakit' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        PenyakitMenonjolModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
