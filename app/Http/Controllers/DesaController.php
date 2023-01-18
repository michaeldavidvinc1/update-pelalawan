<?php

namespace App\Http\Controllers;

use App\Exports\DesaExport;
use App\Imports\DesaImport;
use App\Models\DesaModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DesaController extends Controller
{
    public function index()
    {
        $data = DesaModel::latest()->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.desa.desa');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'desa' => 'required|max:255',
            'lakilaki' => 'required',
            'perempuan' => 'required',
            'rumah_tangga' => 'max:255',
            'defunct_ind' => 'required',
        ]);

        $validator['total'] = $request->lakilaki + $request->perempuan;

        if($request->rumah_tangga == "" || $request->rumah_tangga == null) {
            $validator['rumah_tangga'] = 0;
        }

        DesaModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_desa;
        $validatedData = $request->validate([
            'desa' => 'required|max:255',
            'lakilaki' => 'required',
            'perempuan' => 'required',
            'rumah_tangga' => 'max:255',
            'defunct_ind' => 'required',
        ]);

        $validatedData['total'] = $request->lakilaki + $request->perempuan;

        if($request->rumah_tangga == "" || $request->rumah_tangga == null) {
            $validatedData['rumah_tangga'] = 0;
        }

        DesaModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }

    public function import(Request $request)
    {
            Excel::import(new DesaImport, $request->file('desa'));
            Alert::success('Success', 'Import Berhasil');
            return back();
    }

    public function export()
    {
        return Excel::download(new DesaExport, 'desa.xlsx');
    }
}
