<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AlatKontrasepsiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangIlmuController;
use App\Http\Controllers\DashboardController;
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
        return view('welcome');
    });
});

Route::middleware(['admin'])->group(function () {
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


});
