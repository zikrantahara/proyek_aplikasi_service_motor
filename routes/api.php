<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PelangganApiController;
use App\Http\Controllers\API\KendaraanApiController;
use App\Http\Controllers\API\DaftarServiceApiController;
use App\Http\Controllers\API\DataServiceApiController;
use App\Http\Controllers\API\PembayaranApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route API Resource
Route::name('api.')->group(function () {
    Route::apiResource('pelanggan', PelangganApiController::class);
    Route::apiResource('kendaraan', KendaraanApiController::class);
    Route::apiResource('daftar-service', DaftarServiceApiController::class);
    Route::apiResource('data-service', DataServiceApiController::class);
    Route::apiResource('pembayaran', PembayaranApiController::class);
});
