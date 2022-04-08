<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmasController;
use App\Http\Controllers\KegiatanOrmasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ZakatController;

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

Route::get('/', [FrontController::class, 'index'])->name('beranda');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/admin/ormas/list', [OrmasController::class, 'getOrmas'])->name('ormas.list');
Route::get('/admin/kegiatan-ormas/list', [KegiatanOrmasController::class, 'getKegiatanOrmas'])->name('kegiatan-ormas.list');
Route::get('/admin/management-user/list', [UserController::class, 'getUser'])->name('management-user.list');
Route::get('/warga/list/{id}', [WargaController::class, 'getWarga'])->name('warga.list');

Route::resource('zakat', ZakatController::class);


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin:'], function () {
        Route::resource('ormas', OrmasController::class);
        Route::get('ormas/{id}/log', [OrmasController::class, 'log'])->name('ormas.log');
        Route::get('ormas/{id}/cetak-surat-pernyataan', [OrmasController::class, 'cetakSuratPernyataan'])->name('cetak.surat.pernyataan');
        Route::get('ormas/{id}/cetak-formulir-isian', [OrmasController::class, 'cetakFormulirIsian'])->name('cetak.formulir.isian');
        Route::get('ormas/{id}/cetak-formulir-keabsahan', [OrmasController::class, 'cetakFormulirKeabsahan'])->name('cetak.formulir.keabsahan');
        Route::resource('kegiatan-ormas', KegiatanOrmasController::class);
        Route::get('management-users/{id}', [UserController::class, 'password'])->name('lihat.password');
        Route::put('management-users/{id}/edit', [UserController::class, 'passwordUpdate'])->name('ganti.password');
        Route::resource('management-user', UserController::class);

        Route::resource('penerimaan-zakat', PenerimaanController::class);
        Route::resource('warga', WargaController::class);
        Route::get('beras', [PenerimaanController::class, 'beras'])->name('beras');
        Route::get('uang', [PenerimaanController::class, 'uang'])->name('uang');

       
    });
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/profile', [UserController::class, 'cekProfile'])->name('cek.profile');
    Route::get('/ganti-password', [UserController::class, 'ubahPassword'])->name('user.password');
    Route::put('/ganti-passwordnya', [UserController::class, 'ubahPasswordnya'])->name('user.ubah.password');
    Route::get('/keluar', [UserController::class, 'logout'])->name('keluar');
});