<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataDasarController;
use App\Http\Controllers\ApotikController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KonsentrasiNakesController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\SpesialisDokterController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\JenisOrganisasiController;
use App\Http\Controllers\KondisiAsetPertahunController;
use App\Http\Controllers\JenisAsetController;
use App\Http\Controllers\StatusKawinController;
use App\Http\Controllers\StatusKeluargaController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\TahunAsetController;
use App\Http\Controllers\AlatKontrasepsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\TenagaKesehatanController;
use App\Http\Controllers\BidangIlmuController;
use App\Http\Controllers\AsnController;
use App\Http\Controllers\PenggunaanObatController;
use App\Http\Controllers\PenyakitMenonjolController;
use App\Http\Controllers\PenggunaanKontrasepsiController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KecamatanExcelController;
use App\Http\Controllers\DesaExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [CaptchaServiceController::class, 'index'])->middleware('guest')->name('login');
Route::post('/logout', [CaptchaServiceController::class, 'logout']);
Route::post('/login', [CaptchaServiceController::class, 'auth']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');


    Route::get('/datadasar', function () {
        return view('datadasar');
    });

    Route::get('/bantuan', function () {
        return view('bantuan');
    });

});

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('/apotik', ApotikController::class);
    Route::post('/apotik-edit', [ApotikController::class, 'edit'])->name('apotik.edit');
    //
    Route::resource('/tahun', TahunController::class);
    Route::post('/tahun-edit', [TahunController::class, 'edit'])->name('tahun.edit');
    //
    Route::resource('/kecamatan', KecamatanController::class);
    Route::post('/kecamatan-edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    //
    Route::resource('/jenis-organisasi', JenisOrganisasiController::class);
    Route::post('/jenis-organisasi-edit', [JenisOrganisasiController::class, 'edit'])->name('jenis-organisasi.edit');
    //
    Route::resource('/desa', DesaController::class);
    Route::post('/desa-edit', [DesaController::class, 'edit'])->name('desa.edit');
    //
    Route::resource('/konsentrasi-nakes', KonsentrasiNakesController::class);
    Route::post('/konsentrasi-nakes-edit', [KonsentrasiNakesController::class, 'edit'])->name('konsentrasi-nakes.edit');
    //
    Route::resource('/spesialis-dokter', SpesialisDokterController::class);
    Route::post('/spesialis-dokter-edit', [SpesialisDokterController::class, 'edit'])->name('spesialis-dokter.edit');
    //
    Route::resource('/penyakit', PenyakitController::class);
    Route::post('/penyakit-edit', [PenyakitController::class, 'edit'])->name('penyakit.edit');
    //
    Route::resource('/organisasi', OrganisasiController::class);
    Route::post('/organisasi-edit', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
    //
    Route::resource('/jenis-aset', JenisAsetController::class);
    Route::post('/jenis-aset-edit', [JenisAsetController::class, 'edit'])->name('jenis-aset.edit');
    //
    Route::resource('/jenis-aset', JenisAsetController::class);
    Route::post('/jenis-aset-edit', [JenisAsetController::class, 'edit'])->name('jenis-aset.edit');
    //
    Route::resource('/tahun-aset', TahunAsetController::class);
    Route::post('/tahun-aset-edit', [TahunAsetController::class, 'edit'])->name('tahun-aset.edit');
    //
    Route::resource('/kondisiaset-pertahun', KondisiAsetPertahunController::class);
    Route::post('/kondisiaset-pertahun-edit', [KondisiAsetPertahunController::class, 'edit'])->name('kondisiaset-pertahun.edit');
    //
    Route::resource('/kartu-keluarga', KartuKeluargaController::class);
    Route::post('/kartu-keluarga-edit', [KartuKeluargaController::class, 'edit'])->name('kartu-keluarga.edit');
    //
    Route::resource('/status-kawin', StatusKawinController::class);
    Route::post('/status-kawin-edit', [StatusKawinController::class, 'edit'])->name('status-kawin.edit');
    //
    Route::resource('/agama', AgamaController::class);
    Route::post('/agama-edit', [AgamaController::class, 'edit'])->name('agama.edit');
    //
    Route::resource('/status-dalamkeluarga', StatusKeluargaController::class);
    Route::post('/status-dalamkeluarga-edit', [StatusKeluargaController::class, 'edit'])->name('status-dalamkeluarga.edit');
    //
    Route::resource('/keluarga', KeluargaController::class);
    Route::post('/keluarga-edit', [KeluargaController::class, 'edit'])->name('keluarga.edit');
    //
    Route::resource('/alat-kontrasepsi', AlatKontrasepsiController::class);
    Route::post('/alat-kontrasepsi-edit', [AlatKontrasepsiController::class, 'edit'])->name('alat-kontrasepsi.edit');
    //
    Route::resource('/tenaga-kesehatan', TenagaKesehatanController::class);
    Route::post('/tenaga-kesehatan-edit', [TenagaKesehatanController::class, 'edit'])->name('tenaga-kesehatan.edit');
    //
    Route::resource('/bidang-ilmu', BidangIlmuController::class);
    Route::post('/bidang-ilmu-edit', [BidangIlmuController::class, 'edit'])->name('bidang-ilmu.edit');
    //
    Route::resource('/asn', AsnController::class);
    Route::post('/asn-edit', [AsnController::class, 'edit'])->name('asn.edit');
    //
    Route::resource('/penggunaan-obat', PenggunaanObatController::class);
    Route::post('/penggunaan-obat-edit', [PenggunaanObatController::class, 'edit'])->name('penggunaan-obat.edit');
    //
    Route::resource('/penyakit-menonjol', PenyakitMenonjolController::class);
    Route::post('/penyakit-menonjol-edit', [PenyakitMenonjolController::class, 'edit'])->name('penyakit-menonjol.edit');
    //
    Route::resource('/penggunaan-kontrasepsi', PenggunaanKontrasepsiController::class);
    Route::post('/penggunaan-kontrasepsi-edit', [PenggunaanKontrasepsiController::class, 'edit'])->name('penggunaan-kontrasepsi.edit');

    Route::get('/datadasar', [DataDasarController::class, 'tablePage']);

    //Captcha URL Start
    Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
    Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha'])->name('captcha.reload');
    //Captcha URL End

    //AUTH Start

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user-read', [UserController::class, 'read']);
    Route::get('/user-create', [UserController::class, 'create']);
    Route::get('/user-store', [UserController::class, 'store']);
    Route::get('/user-show/{id}', [UserController::class, 'show']);
    Route::get('/user-update/{id}', [UserController::class, 'update']);
    Route::get('/user-destroy/{id}', [UserController::class, 'destroy']);

    //AUTH End
    Route::get('/kecamatan-index', [KecamatanController::class, 'indexExcel'])->name('kecamatan.excel.index');
    Route::post('/kecamatan-create', [KecamatanController::class, 'createExcel'])->name('kecamatan.excel.create');
    Route::post('/kecamatan-update', [KecamatanController::class, 'updateExcel'])->name('kecamatan.excel.update');

});

//* Import & Export Excel

Route::post('/import-kecamatan', [KecamatanExcelController::class, 'import'])->name('import.kecamatan');
Route::get('/export-kecamatan', [KecamatanExcelController::class, 'export'])->name('export.kecamatan');

Route::post('/import-desa', [DesaExcelController::class, 'import'])->name('import.desa');
Route::get('/export-desa', [DesaExcelController::class, 'export'])->name('export.desa');












