<?php

namespace App\Http\Controllers;

use App\Models\StatusKawinModel;
use Illuminate\Http\Request;

class StatusKawinController extends Controller
{
    public function index()
    {
        $data = StatusKawinModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.status-kawin.statusKawin');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'status_kawin' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        StatusKawinModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_status_kawin;
        $validatedData = $request->validate([
            'status_kawin'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        StatusKawinModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
