<?php

use App\Http\Controllers\AtraksiController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/cities/{id}', [ProvinsiController::class, 'getCities']);
Route::get('/atraksi/checkSlug', [AtraksiController::class, 'checkSlug']);
Route::get('atraksi/{atraksi}/upload', [PhotoController::class, 'index']);
Route::post('atraksi/{atraksi}/upload', [PhotoController::class, 'store']);
Route::delete('atraksi/{atraksi}/image/{photo}', [PhotoController::class, 'destroy']);

Route::resource('/types', TypeController::class);
Route::resource('/atraksi', AtraksiController::class);
Route::resource('/atraksi/{atraksi}/paket', PaketController::class);


