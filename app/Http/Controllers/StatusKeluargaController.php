<?php

namespace App\Http\Controllers;

use App\Models\StatusKeluargaModel;
use Illuminate\Http\Request;

class StatusKeluargaController extends Controller
{
    public function index()
    {
        $data = StatusKeluargaModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.status-keluarga.statusKeluarga');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'status_keluarga' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        StatusKeluargaModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_status_keluarga;
        $validatedData = $request->validate([
            'status_keluarga'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        StatusKeluargaModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
