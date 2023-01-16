<?php

namespace App\Http\Controllers;

use App\Models\KonsentrasiNakesModel;
use Illuminate\Http\Request;

class KonsentrasiNakesController extends Controller
{
    public function index()
    {
        $data = KonsentrasiNakesModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.konsentrasi-nakes.konsentrasiNakes');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nama_konsentrasi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        KonsentrasiNakesModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_konsentrasi;
        $validatedData = $request->validate([
            'nama_konsentrasi'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        KonsentrasiNakesModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
