<?php

namespace App\Http\Controllers;

use App\Models\JenisAsetModel;
use App\Models\OrganisasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisAsetController extends Controller
{
    public function index()
    {
        $data = DB::table('jenis_aset')
            ->join('organisasi', 'jenis_aset.id_organisasi', '=', 'organisasi.id_organisasi')
            ->select('jenis_aset.*', 'organisasi.name_organisasi')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.jenis-aset.jenisAset', [
            'organisasi' => OrganisasiModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nama_aset' => 'required|max:255',
            'id_organisasi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        JenisAsetModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_jenis_aset;
        $validatedData = $request->validate([
            'nama_aset' => 'required|max:255',
            'id_organisasi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        JenisAsetModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
