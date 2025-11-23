<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('daftarservice', DaftarServiceController::class);
Route::resource('dataservice', DataServiceController::class);
Route::resource('pembayaran', PembayaranController::class);
