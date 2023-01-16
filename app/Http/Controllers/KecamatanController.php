<?php

namespace App\Http\Controllers;

use App\Exports\KecamatanExport;
use App\Imports\KecamatanImport;
use App\Models\KecamatanModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanController extends Controller
{
    public function index()
    {
        $data = KecamatanModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.kecamatan.kecamatan');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'kecamatan' => 'required|max:255',
            'lakilaki' => 'required',
            'perempuan' => 'required',
            'defunct_ind' => 'required',
        ]);

        $validator['total'] = $request->lakilaki + $request->perempuan;

        if($request->rumah_tangga == "" || $request->rumah_tangga == null) {
            $validator['rumah_tangga'] = 0;
        }

        if($request->luas_wilayah == "" || $request->luas_wilayah == null) {
            $validator['luas_wilayah'] = 0;
        }

        KecamatanModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_kecamatan;
        $validatedData = $request->validate([
            'kecamatan' => 'required|max:255',
            'lakilaki' => 'required',
            'perempuan' => 'required',
            'defunct_ind' => 'required',
        ]);

        $validatedData['total'] = $request->lakilaki + $request->perempuan;

        if($request->rumah_tangga == "" || $request->rumah_tangga == null) {
            $validatedData['rumah_tangga'] = 0;
        }

        if($request->luas_wilayah == "" || $request->luas_wilayah == null) {
            $validatedData['luas_wilayah'] = 0;
        }

        KecamatanModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }

    public function import(Request $request)
    {
            Excel::import(new KecamatanImport, $request->file('kecamatan'));
            Alert::success('Success', 'Import Berhasil');
            return back();
    }

    public function export()
    {
        return Excel::download(new KecamatanExport, 'kecamatan.xlsx');
    }
}
