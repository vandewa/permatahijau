<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmasController;
use App\Http\Controllers\KegiatanOrmasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\PemberiController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\BelanjaBerasController;

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


        Route::get('cetak-zakat-beras', [PemberiController::class, 'CetakZakatBeras'])->name('cetak.zakat.beras');
        Route::get('cetak-zakat-uang', [PemberiController::class, 'CetakZakatUang'])->name('cetak.zakat.uang');
        Route::get('pemberi-zakat/cetak', [PemberiController::class, 'cetakPemberi'])->name('cetak.zakat');
        Route::get('penerima-zakat/rt1/cetak', [PenerimaanController::class, 'rt1'])->name('cetak.rt1');
        Route::get('penerima-zakat/rt2/cetak', [PenerimaanController::class, 'rt2'])->name('cetak.rt2');
        Route::get('penerima-zakat/rt3/cetak', [PenerimaanController::class, 'rt3'])->name('cetak.rt3');
        Route::get('penerima-zakat/rt4/cetak', [PenerimaanController::class, 'rt4'])->name('cetak.rt4');
        Route::get('penerima-zakat/rt5/cetak', [PenerimaanController::class, 'rt5'])->name('cetak.rt5');
        Route::get('penerima-zakat/semuart/cetak', [PenerimaanController::class, 'semuart'])->name('cetak.semuart');
        Route::get('cetak-laporan', [PemberiController::class, 'cetaklaporan'])->name('cetak.laporan');

        Route::resource('penerima-zakat', PenerimaanController::class);
        Route::resource('pemberi-zakat', PemberiController::class);
        Route::resource('warga', WargaController::class);
        Route::resource('belanja-beras', BelanjaBerasController::class);
        Route::get('beras', [PemberiController::class, 'beras'])->name('beras');
        Route::get('uang', [PemberiController::class, 'uang'])->name('uang');
    });
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/profile', [UserController::class, 'cekProfile'])->name('cek.profile');
    Route::get('/ganti-password', [UserController::class, 'ubahPassword'])->name('user.password');
    Route::put('/ganti-passwordnya', [UserController::class, 'ubahPasswordnya'])->name('user.ubah.password');
    Route::get('/keluar', [UserController::class, 'logout'])->name('keluar');
});
