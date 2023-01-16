<?php

namespace App\Http\Controllers;

use App\Models\AsnModel;
use App\Models\BidangilmuModel;
use App\Models\OrganisasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsnController extends Controller
{
    public function index()
    {
        $data = DB::table('asn')
            ->join('bidang_ilmu', 'asn.id_bidang_ilmu', '=', 'bidang_ilmu.id_bidang_ilmu')
            ->join('organisasi', 'asn.id_organisasi', '=', 'organisasi.id_organisasi')
            ->select('asn.*', 'bidang_ilmu.bidang_ilmu', 'organisasi.name_organisasi')
            ->latest()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', 'agama-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.components.asn.asn', [
            'bidangIlmu' => BidangilmuModel::all()->where('defunct_ind', 'N'),
            'organisasi' => OrganisasiModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'nip' => 'required|max:255',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'pendidikan_terakhir' => 'required|max:255',
            'id_bidang_ilmu' => 'required|max:255',
            'id_organisasi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        AsnModel::create($validator);
        return back();
    }

    public function update(Request $request)
    {

        $id = $request->id_asn;
        $validatedData = $request->validate([
            'nip' => 'required|max:255',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'pendidikan_terakhir' => 'required|max:255',
            'id_bidang_ilmu' => 'required|max:255',
            'id_organisasi' => 'required|max:255',
            'defunct_ind' => 'required',
        ]);

        AsnModel::findOrFail($id)
            ->update($validatedData);
        return back();
    }
}
