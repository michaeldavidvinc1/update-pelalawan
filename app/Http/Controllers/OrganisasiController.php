<?php

namespace App\Http\Controllers;

use App\Models\DesaModel;
use App\Models\JenisOrganisasiModel;
use App\Models\KecamatanModel;
use App\Models\OrganisasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganisasiController extends Controller
{
    public function index()
    {
        $data = DB::table('organisasi')
            ->join('kecamatan', 'organisasi.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->join('desa', 'organisasi.id_desa', '=', 'desa.id_desa')
            ->join('jenis_organisasi', 'organisasi.id_jenis', '=', 'jenis_organisasi.id_jenis')
            ->select('organisasi.*', 'kecamatan.kecamatan', 'desa.desa',  'jenis_organisasi.nama_organisasi')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.organisasi.organisasi', [
            'kecamatan' => KecamatanModel::all()->where('defunct_ind', 'N'),
            'jenisOrganisasi' => JenisOrganisasiModel::all()->where('defunct_ind', 'N'),
            'desa' => DesaModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'name_organisasi' => 'required|max:255',
            'id_jenis' => 'required|max:255',
            'kelompok' => 'required|max:255',
            'id_desa' => 'required|max:255',
            'id_kecamatan' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        OrganisasiModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_organisasi;
        $validatedData = $request->validate([
            'name_organisasi' => 'required|max:255',
            'id_jenis' => 'required|max:255',
            'kelompok' => 'required|max:255',
            'id_desa' => 'required|max:255',
            'id_kecamatan' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        OrganisasiModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
