<?php

namespace App\Http\Controllers;

use App\Models\SpesialisDokterModel;
use Illuminate\Http\Request;

class SpesialisDokterController extends Controller
{
    public function index()
    {
        $data = SpesialisDokterModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.spesialis-dokter.spesialisDokter');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nama_spesialis' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        SpesialisDokterModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_spesialis;
        $validatedData = $request->validate([
            'nama_spesialis'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        SpesialisDokterModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
