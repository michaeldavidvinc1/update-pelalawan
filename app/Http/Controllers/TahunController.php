<?php

namespace App\Http\Controllers;

use App\Models\TahunModel;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index()
    {
        $data = TahunModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.tahun.tahun');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'tahun' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        TahunModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_tahun;
        $validatedData = $request->validate([
            'tahun'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        TahunModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
