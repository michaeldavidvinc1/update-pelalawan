<?php

namespace App\Http\Controllers;

use App\Models\AgamaModel;
use App\Models\KeluargaModel;
use App\Models\StatusKawinModel;
use App\Models\StatusKeluargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeluargaController extends Controller
{
    public function index()
    {
        $data = DB::table('keluarga')
            ->join('status_kawin', 'keluarga.id_status_kawin', '=', 'status_kawin.id_status_kawin')
            ->join('agama', 'keluarga.id_agama', '=', 'agama.id_agama')
            ->join('status_keluarga', 'keluarga.id_status_keluarga', '=', 'status_keluarga.id_status_keluarga')
            ->select('keluarga.*', 'status_kawin.status_kawin', 'agama.agama',  'status_keluarga.status_keluarga')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.keluarga.keluarga', [
            'statusKawin' => StatusKawinModel::all()->where('defunct_ind', 'N'),
            'agama' => AgamaModel::all()->where('defunct_ind', 'N'),
            'statusKeluarga' => StatusKeluargaModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nik' => 'required|max:255',
            'no_kk' => 'required|max:255',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'id_status_kawin' => 'required|max:255',
            'id_agama' => 'required|max:255',
            'id_status_keluarga' => 'required|max:255',
            'status_jamkesda' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        KeluargaModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_keluarga;
        $validatedData = $request->validate([
            'nik' => 'required|max:255',
            'no_kk' => 'required|max:255',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'id_status_kawin' => 'required|max:255',
            'id_agama' => 'required|max:255',
            'id_status_keluarga' => 'required|max:255',
            'status_jamkesda' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        KeluargaModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
