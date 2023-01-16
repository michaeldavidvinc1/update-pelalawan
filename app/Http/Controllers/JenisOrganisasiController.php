<?php

namespace App\Http\Controllers;

use App\Models\JenisOrganisasiModel;
use Illuminate\Http\Request;

class JenisOrganisasiController extends Controller
{
    public function index()
    {
        $data = JenisOrganisasiModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.jenis-organisasi.jenisOrganisasi');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nama_organisasi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        JenisOrganisasiModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_jenis;
        $validatedData = $request->validate([
            'nama_organisasi'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        JenisOrganisasiModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
