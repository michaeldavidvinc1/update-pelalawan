<?php

namespace App\Http\Controllers;

use App\Models\AlatKontrasepsiModel;
use Illuminate\Http\Request;

class AlatKontrasepsiController extends Controller
{
    public function index()
    {
        $data = AlatKontrasepsiModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.alat-kontrasepsi.alatKontrasepsi');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nama_kontrasepsi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        AlatKontrasepsiModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_kontrasepsi;
        $validatedData = $request->validate([
            'nama_kontrasepsi'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        AlatKontrasepsiModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
