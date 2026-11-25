<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\KategoriController;

Route::apiResource('kategori', KategoriController::class)->names('api.kategori');

Route::apiResource('produk', ProdukController::class)->names('api.produk');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');