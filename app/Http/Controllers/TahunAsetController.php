<?php

namespace App\Http\Controllers;

use App\Models\JenisAsetModel;
use App\Models\OrganisasiModel;
use App\Models\TahunAsetModel;
use App\Models\TahunModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunAsetController extends Controller
{
    public function index()
    {
        $data = DB::table('tahun_aset')
            ->join('organisasi', 'tahun_aset.id_organisasi', '=', 'organisasi.id_organisasi')
            ->join('jenis_aset', 'tahun_aset.id_jenis_aset', '=', 'jenis_aset.id_jenis_aset')
            ->join('tahun', 'tahun_aset.id_tahun', '=', 'tahun.id_tahun')
            ->select('tahun_aset.*', 'organisasi.name_organisasi', 'jenis_aset.nama_aset', 'tahun.tahun')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.tahun-aset.tahunAset', [
            'organisasi' => OrganisasiModel::all()->where('defunct_ind', 'N'),
            'jenisAset' => JenisAsetModel::all()->where('defunct_ind', 'N'),
            'tahun' => TahunModel::all(),
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'id_organisasi' => 'required|max:255',
            'id_jenis_aset' => 'required|max:255',
            'id_tahun' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        TahunAsetModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_tahun_aset;
        $validatedData = $request->validate([
            'id_organisasi' => 'required|max:255',
            'id_jenis_aset' => 'required|max:255',
            'id_tahun' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        TahunAsetModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
