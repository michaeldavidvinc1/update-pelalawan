<?php

namespace App\Http\Controllers;

use App\Models\KondisiAsetModel;
use App\Models\TahunModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KondisiAsetController extends Controller
{
    public function index()
    {
        $data = DB::table('kondisi_aset')
        ->join('tahun', 'kondisi_aset.id_tahun', '=', 'tahun.id_tahun')
        ->select('kondisi_aset.*', 'tahun.tahun')
        ->latest()
        ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.kondisi-aset.kondisiAset', [
            'tahun' => TahunModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'id_tahun' => 'required|max:255',
            'baik' => 'required|max:255',
            'rusak_ringan' => 'required|max:255',
            'rusak_berat' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        KondisiAsetModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_kondisi_aset;
        $validatedData = $request->validate([
            'id_tahun' => 'required|max:255',
            'baik' => 'required|max:255',
            'rusak_ringan' => 'required|max:255',
            'rusak_berat' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        KondisiAsetModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
