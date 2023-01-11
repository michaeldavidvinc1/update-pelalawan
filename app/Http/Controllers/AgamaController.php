<?php

namespace App\Http\Controllers;

use App\Models\AgamaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AgamaController extends Controller
{
    public function index()
    {
        $data = AgamaModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.agama.agama');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'agama' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        AgamaModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_agama;
        $validatedData = $request->validate([
            'agama'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        AgamaModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
