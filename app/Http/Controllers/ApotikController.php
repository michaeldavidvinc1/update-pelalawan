<?php

namespace App\Http\Controllers;

use App\Models\ApotikModel;
use Illuminate\Http\Request;

class ApotikController extends Controller
{
    public function index()
    {
        $data = ApotikModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.apotik.apotik');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'name_apotik' => 'required|max:255',
            'bidang_usaha' => 'required|max:255',
            'alamat_apotik' => 'required|max:255',
            'apoteker' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        ApotikModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_apotik;
        $validatedData = $request->validate([
            'name_apotik' => 'required|max:255',
            'bidang_usaha' => 'required|max:255',
            'alamat_apotik' => 'required|max:255',
            'apoteker' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        ApotikModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
