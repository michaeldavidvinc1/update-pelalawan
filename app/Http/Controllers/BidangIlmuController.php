<?php

namespace App\Http\Controllers;

use App\Models\BidangilmuModel;
use Illuminate\Http\Request;

class BidangIlmuController extends Controller
{
    public function index()
    {
        $data = BidangilmuModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.bidang-ilmu.bidangIlmu');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'bidang_ilmu' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        BidangilmuModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_bidang_ilmu;
        $validatedData = $request->validate([
            'bidang_ilmu'     => 'required|max:255',
            'defunct_ind'     => 'required',
        ]);

        BidangilmuModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
