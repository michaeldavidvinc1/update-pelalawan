<?php

namespace App\Http\Controllers;

use App\Models\ApotikModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataDasarController extends Controller
{
    public function tablePage() {
        $data = ApotikModel::all()->where('defunct_ind', 'N');
        $nakes = DB::table('tenaga_kesehatan')
        ->join('konsentrasi_nakes', 'tenaga_kesehatan.id_konsentrasi', '=', 'konsentrasi_nakes.id_konsentrasi')
        ->join('spesialis_dokter', 'tenaga_kesehatan.id_spesialis', '=', 'spesialis_dokter.id_spesialis')
        ->join('organisasi', 'tenaga_kesehatan.id_organisasi', '=', 'organisasi.id_organisasi')
        ->select('tenaga_kesehatan.*', 'konsentrasi_nakes.nama_konsentrasi', 'spesialis_dokter.nama_spesialis', 'organisasi.name_organisasi')
        ->latest()
        ->get()
        ->where('defunct_ind', 'N');
        $organisasi = DB::table('organisasi')
            ->join('kecamatan', 'organisasi.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->join('desa', 'organisasi.id_desa', '=', 'desa.id_desa')
            ->join('jenis_organisasi', 'organisasi.id_jenis', '=', 'jenis_organisasi.id_jenis')
            ->select('organisasi.*', 'kecamatan.kecamatan', 'desa.desa',  'jenis_organisasi.nama_organisasi')
            ->latest()
            ->get()
            ->where('defunct_ind', 'N');
        $penyakit = DB::table('penyakit_menonjol')
            ->join('tahun', 'penyakit_menonjol.id_tahun', '=', 'tahun.id_tahun')
            ->join('penyakit', 'penyakit_menonjol.id_penyakit', '=', 'penyakit.id_penyakit')
            ->select('penyakit_menonjol.*', 'tahun.tahun', 'penyakit.nama_penyakit')
            ->latest()
            ->get()
            ->where('defunct_ind', 'N');
        $penggunaanObat = DB::table('penggunaan_obat')
            ->join('tahun', 'penggunaan_obat.id_tahun', '=', 'tahun.id_tahun')
            ->select('penggunaan_obat.*', 'tahun.tahun')
            ->latest()
            ->get()
            ->where('defunct_ind', 'N');
        $kontrasepsi = DB::table('penggunaan_kontrasepsi')
            ->join('tahun', 'penggunaan_kontrasepsi.id_tahun', '=', 'tahun.id_tahun')
            ->join('alat_kontrasepsi', 'penggunaan_kontrasepsi.id_kontrasepsi', '=', 'alat_kontrasepsi.id_kontrasepsi')
            ->select('penggunaan_kontrasepsi.*', 'tahun.tahun', 'alat_kontrasepsi.nama_kontrasepsi')
            ->latest()
            ->get()
            ->where('defunct_ind', 'N');

        return view('datadasar', compact('data', 'nakes', 'organisasi', 'penyakit', 'penggunaanObat', 'kontrasepsi'));
    }
}
