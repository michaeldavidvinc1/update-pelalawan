<?php

namespace App\Http\Controllers;

use App\Models\PenyakitModel;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $data = PenyakitModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.penyakit.penyakit');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nama_penyakit' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        PenyakitModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_penyakit;
        $validatedData = $request->validate([
            'nama_penyakit'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        PenyakitModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
