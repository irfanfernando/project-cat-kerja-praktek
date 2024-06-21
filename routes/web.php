<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\PembelianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    // Data Nota Penjualan
    Route::get('/laporanpenjualan', [LaporanPenjualanController::class, 'index'])->name('laporanpenjualan');
    Route::get('/laporanpenjualan/create', [LaporanPenjualanController::class, 'create'])->name('laporanpenjualan.create');
    Route::post('/laporanpenjualan/store', [LaporanPenjualanController::class, 'store'])->name('laporanpenjualan.store');
    Route::get('/laporanpenjualan/{id}/edit', [LaporanPenjualanController::class, 'edit'])->name('laporanpenjualan.edit');
    Route::put('/laporanpenjualan/{id}/update', [LaporanPenjualanController::class, 'update'])->name('laporanpenjualan.update');
    Route::delete('/laporanpenjualan/{id}', [LaporanPenjualanController::class, 'destroy'])->name('laporanpenjualan.destroy');
    Route::get('/laporanpenjualan/cetaknotapenjualan/{id}', [LaporanPenjualanController::class, 'cetaknotapenjualan'])->name('laporanpenjualan.cetaknotapenjualan');
    Route::get('/laporanpenjualan/cetaklaporanpenjualan', [LaporanPenjualanController::class, 'cetaklaporanpenjualan'])->name('laporanpenjualan.cetaklaporanpenjualan');
    Route::post('/laporanpenjualan/filter', [LaporanPenjualanController::class, 'cetaklaporanpenjualan'])->name('laporanpenjualan.filter');

    // Data Pembelian
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
    Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('/pembelian/{id}/edit', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::put('/pembelian/{id}/update', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('/pembelian/{id}', [PembelianController::class, 'destroy'])->name('pembelian.destroy');
    Route::get('/pembelian/cetaksuratpo/{id}', [PembelianController::class, 'cetaksuratpo'])->name('pembelian.cetaksuratpo');

    // Data Stock
    Route::get('/stok', [StokController::class, 'index'])->name('stok');
    Route::get('/stok/create', [StokController::class, 'create'])->name('stok.create');
    Route::post('/stok/store', [StokController::class, 'store'])->name('stok.store');
    Route::get('/stok/{id}/edit', [StokController::class, 'edit'])->name('stok.edit');
    Route::put('/stok/{id}/update', [StokController::class, 'update'])->name('stok.update');
    Route::delete('/stok/{id}', [StokController::class, 'destroy'])->name('stok.destroy');
    Route::get('/stok/cetakstok', [StokController::class, 'cetakstok'])->name('stok.cetakstok');

    // Data Stock Masuk
    Route::get('/masuk', [MasukController::class, 'index'])->name('masuk');
    Route::get('/masuk/create', [MasukController::class, 'create'])->name('masuk.create');
    Route::post('/masuk/store', [MasukController::class, 'store'])->name('masuk.store');
    Route::get('/masuk/{id}/edit', [MasukController::class, 'edit'])->name('masuk.edit');
    Route::put('/masuk/{id}/update', [MasukController::class, 'update'])->name('masuk.update');
    Route::delete('/masuk/{id}', [MasukController::class, 'destroy'])->name('masuk.destroy');

    // Data Stock Keluar
    Route::get('/keluar', [KeluarController::class, 'index'])->name('keluar');
    Route::get('/keluar/create', [KeluarController::class, 'create'])->name('keluar.create');
    Route::post('/keluar/store', [KeluarController::class, 'store'])->name('keluar.store');
    Route::get('/keluar/{id}/edit', [KeluarController::class, 'edit'])->name('keluar.edit');
    Route::put('/keluar/{id}/update', [KeluarController::class, 'update'])->name('keluar.update');
    Route::delete('/keluar/{id}', [KeluarController::class, 'destroy'])->name('keluar.destroy');
    Route::get('/keluar/cetaklaporanmutasi', [KeluarController::class, 'cetaklaporanmutasi'])->name('keluar.cetaklaporanmutasi');
    Route::post('/keluar/filter', [KeluarController::class, 'cetaklaporanmutasi'])->name('keluar.filter');

    // Data Pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/{id}/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
    Route::get('/stok/cetakpelanggan', [PelangganController::class, 'cetakpelanggan'])->name('pelanggan.cetakpelanggan');

    // Halaman tampil 
    Route::get('/tampilstok', [StokController::class, 'tampilstok'])->name('tampilstok');
    Route::get('/tampilstokmasuk', [MasukController::class, 'tampilstokmasuk'])->name('tampilstokmasuk');
    Route::get('/tampilstokkeluar', [KeluarController::class, 'tampilstokkeluar'])->name('tampilstokkeluar');
    Route::get('/tampillaporanpenjualan', [LaporanPenjualanController::class, 'tampillaporanpenjualan'])->name('tampillaporanpenjualan');
    Route::get('/tampilpelanggan', [PelangganController::class, 'tampilpelanggan'])->name('tampilpelanggan');

});


