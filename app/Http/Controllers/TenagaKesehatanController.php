<?php

namespace App\Http\Controllers;

use App\Models\KonsentrasiNakesModel;
use App\Models\OrganisasiModel;
use App\Models\SpesialisDokterModel;
use App\Models\TenagaKesehatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenagaKesehatanController extends Controller
{
    public function index()
    {
        $data = DB::table('tenaga_kesehatan')
            ->join('konsentrasi_nakes', 'tenaga_kesehatan.id_konsentrasi', '=', 'konsentrasi_nakes.id_konsentrasi')
            ->join('spesialis_dokter', 'tenaga_kesehatan.id_spesialis', '=', 'spesialis_dokter.id_spesialis')
            ->join('organisasi', 'tenaga_kesehatan.id_organisasi', '=', 'organisasi.id_organisasi')
            ->select('tenaga_kesehatan.*', 'konsentrasi_nakes.nama_konsentrasi', 'spesialis_dokter.nama_spesialis',  'organisasi.name_organisasi')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.tenaga-kesehatan.tenagaKesehatan', [
            'konsentrasi' => KonsentrasiNakesModel::all()->where('defunct_ind', 'N'),
            'spesialis' => SpesialisDokterModel::all()->where('defunct_ind', 'N'),
            'organisasi' => OrganisasiModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nama_nakes' => 'required|max:255',
            'id_konsentrasi' => 'required|max:255',
            'id_spesialis' => 'required|max:255',
            'id_organisasi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        TenagaKesehatanModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_nakes;
        $validatedData = $request->validate([
            'nama_nakes' => 'required|max:255',
            'id_konsentrasi' => 'required|max:255',
            'id_spesialis' => 'required|max:255',
            'id_organisasi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        TenagaKesehatanModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
