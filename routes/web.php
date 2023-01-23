<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AlatKontrasepsiController;
use App\Http\Controllers\ApotikController;
use App\Http\Controllers\AsnController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangIlmuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataDasarController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\JenisAsetController;
use App\Http\Controllers\JenisOrganisasiController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KondisiAsetController;
use App\Http\Controllers\KonsentrasiNakesController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PenggunaanKontrasepsiController;
use App\Http\Controllers\PenggunaanObatController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\PenyakitMenonjolController;
use App\Http\Controllers\SpesialisDokterController;
use App\Http\Controllers\StatusKawinController;
use App\Http\Controllers\StatusKeluargaController;
use App\Http\Controllers\TahunAsetController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TenagaKesehatanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('/login', [AuthController::class, 'auth']);
Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/datadasar', function () {
        return view('datadasar');
    });

    Route::get('/bantuan', function () {
        return view('bantuan');
    });
});

Route::middleware(['admin'])->group(function () {
    Route::get('/datadasar', [DataDasarController::class, 'tablePage']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/agama', [AgamaController::class, 'index'])->name('agama.index');
    Route::post('/agama', [AgamaController::class, 'create'])->name('agama.add');
    Route::post('/agama-update', [AgamaController::class, 'update'])->name('agama.update');
    Route::get('/alat-kontrasepsi', [AlatKontrasepsiController::class, 'index'])->name('alatKontrasepsi.index');
    Route::post('/alat-kontrasepsi', [AlatKontrasepsiController::class, 'create'])->name('alatKontrasepsi.add');
    Route::post('/alat-kontrasepsi-update', [AlatKontrasepsiController::class, 'update'])->name('alatKontrasepsi.update');
    Route::get('/bidang-ilmu', [BidangIlmuController::class, 'index'])->name('bidangIlmu.index');
    Route::post('/bidang-ilmu', [BidangIlmuController::class, 'create'])->name('bidangIlmu.add');
    Route::post('/bidang-ilmu-update', [BidangIlmuController::class, 'update'])->name('bidangIlmu.update');
    Route::get('/jenis-organisasi', [JenisOrganisasiController::class, 'index'])->name('jenisOrganisasi.index');
    Route::post('/jenis-organisasi', [JenisOrganisasiController::class, 'create'])->name('jenisOrganisasi.add');
    Route::post('/jenis-organisasi-update', [JenisOrganisasiController::class, 'update'])->name('jenisOrganisasi.update');
    Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::post('/kecamatan', [KecamatanController::class, 'create'])->name('kecamatan.add');
    Route::post('/kecamatan-update', [KecamatanController::class, 'update'])->name('kecamatan.update');
    Route::post('/import-kecamatan', [KecamatanController::class, 'import'])->name('kecamatan.import');
    Route::get('/export-kecamatan', [KecamatanController::class, 'export'])->name('kecamatan.export');
    Route::get('/konsentrasi-nakes', [KonsentrasiNakesController::class, 'index'])->name('konsentrasiNakes.index');
    Route::post('/konsentrasi-nakes', [KonsentrasiNakesController::class, 'create'])->name('konsentrasiNakes.add');
    Route::post('/konsentrasi-nakes-update', [KonsentrasiNakesController::class, 'update'])->name('konsentrasiNakes.update');
    Route::get('/penyakit', [PenyakitController::class, 'index'])->name('penyakit.index');
    Route::post('/penyakit', [PenyakitController::class, 'create'])->name('penyakit.add');
    Route::post('/penyakit-update', [PenyakitController::class, 'update'])->name('penyakit.update');
    Route::get('/spesialis-dokter', [SpesialisDokterController::class, 'index'])->name('spesialisDokter.index');
    Route::post('/spesialis-dokter', [SpesialisDokterController::class, 'create'])->name('spesialisDokter.add');
    Route::post('/spesialis-dokter-update', [SpesialisDokterController::class, 'update'])->name('spesialisDokter.update');
    Route::get('/status-kawin', [StatusKawinController::class, 'index'])->name('statusKawin.index');
    Route::post('/status-kawin', [StatusKawinController::class, 'create'])->name('statusKawin.add');
    Route::post('/status-kawin-update', [StatusKawinController::class, 'update'])->name('statusKawin.update');
    Route::get('/tahun', [TahunController::class, 'index'])->name('tahun.index');
    Route::post('/tahun', [TahunController::class, 'create'])->name('tahun.add');
    Route::post('/tahun-update', [TahunController::class, 'update'])->name('tahun.update');
    Route::get('/status-keluarga', [StatusKeluargaController::class, 'index'])->name('statusKeluarga.index');
    Route::post('/status-keluarga', [StatusKeluargaController::class, 'create'])->name('statusKeluarga.add');
    Route::post('/status-keluarga-update', [StatusKeluargaController::class, 'update'])->name('statusKeluarga.update');
    Route::get('/apotik', [ApotikController::class, 'index'])->name('apotik.index');
    Route::post('/apotik', [ApotikController::class, 'create'])->name('apotik.add');
    Route::post('/apotik-update', [ApotikController::class, 'update'])->name('apotik.update');
    Route::get('/asn', [AsnController::class, 'index'])->name('asn.index');
    Route::post('/asn', [AsnController::class, 'create'])->name('asn.add');
    Route::post('/asn-update', [AsnController::class, 'update'])->name('asn.update');
    Route::get('/desa', [DesaController::class, 'index'])->name('desa.index');
    Route::post('/desa', [DesaController::class, 'create'])->name('desa.add');
    Route::post('/desa-update', [DesaController::class, 'update'])->name('desa.update');
    Route::post('/import-desa', [DesaController::class, 'import'])->name('desa.import');
    Route::get('/export-desa', [DesaController::class, 'export'])->name('desa.export');
    Route::get('/kondisi-aset', [KondisiAsetController::class, 'index'])->name('kondisiAset.index');
    Route::post('/kondisi-aset', [KondisiAsetController::class, 'create'])->name('kondisiAset.add');
    Route::post('/kondisi-aset-update', [KondisiAsetController::class, 'update'])->name('kondisiAset.update');
    Route::get('/kartu-keluarga', [KartuKeluargaController::class, 'index'])->name('kartuKeluarga.index');
    Route::post('/kartu-keluarga', [KartuKeluargaController::class, 'create'])->name('kartuKeluarga.add');
    Route::post('/kartu-keluarga-update', [KartuKeluargaController::class, 'update'])->name('kartuKeluarga.update');
    Route::get('/keluarga', [KeluargaController::class, 'index'])->name('keluarga.index');
    Route::post('/keluarga', [KeluargaController::class, 'create'])->name('keluarga.add');
    Route::post('/keluarga-update', [KeluargaController::class, 'update'])->name('keluarga.update');
    Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi.index');
    Route::post('/organisasi', [OrganisasiController::class, 'create'])->name('organisasi.add');
    Route::post('/organisasi-update', [OrganisasiController::class, 'update'])->name('organisasi.update');
    Route::get('/jenis-aset', [JenisAsetController::class, 'index'])->name('jenisAset.index');
    Route::post('/jenis-aset', [JenisAsetController::class, 'create'])->name('jenisAset.add');
    Route::post('/jenis-aset-update', [JenisAsetController::class, 'update'])->name('jenisAset.update');
    Route::get('/penggunaan-kontrasepsi', [PenggunaanKontrasepsiController::class, 'index'])->name('penggunaanKontrasepsi.index');
    Route::post('/penggunaan-kontrasepsi', [PenggunaanKontrasepsiController::class, 'create'])->name('penggunaanKontrasepsi.add');
    Route::post('/penggunaan-kontrasepsi-update', [PenggunaanKontrasepsiController::class, 'update'])->name('penggunaanKontrasepsi.update');
    Route::get('/penggunaan-obat', [PenggunaanObatController::class, 'index'])->name('penggunaanObat.index');
    Route::post('/penggunaan-obat', [PenggunaanObatController::class, 'create'])->name('penggunaanObat.add');
    Route::post('/penggunaan-obat-update', [PenggunaanObatController::class, 'update'])->name('penggunaanObat.update');
    Route::get('/penyakit-menonjol', [PenyakitMenonjolController::class, 'index'])->name('penyakitMenonjol.index');
    Route::post('/penyakit-menonjol', [PenyakitMenonjolController::class, 'create'])->name('penyakitMenonjol.add');
    Route::post('/penyakit-menonjol-update', [PenyakitMenonjolController::class, 'update'])->name('penyakitMenonjol.update');
    Route::get('/tahun-aset', [TahunAsetController::class, 'index'])->name('tahunAset.index');
    Route::post('/tahun-aset', [TahunAsetController::class, 'create'])->name('tahunAset.add');
    Route::post('/tahun-aset-update', [TahunAsetController::class, 'update'])->name('tahunAset.update');
    Route::get('/tenaga-kesehatan', [TenagaKesehatanController::class, 'index'])->name('tenagaKesehatan.index');
    Route::post('/tenaga-kesehatan', [TenagaKesehatanController::class, 'create'])->name('tenagaKesehatan.add');
    Route::post('/tenaga-kesehatan-update', [TenagaKesehatanController::class, 'update'])->name('tenagaKesehatan.update');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'create'])->name('user.add');
    Route::post('/user-update', [UserController::class, 'update'])->name('user.update');
});
