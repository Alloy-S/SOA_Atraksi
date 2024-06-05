<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Database\Factories\AtraksiFactory;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AtraksiController;
use App\Http\Controllers\EticketController;
use App\Http\Controllers\ProvinsiController;

Route::get('/', function () {
    return view('dashboard', [
        "title" => "Dashboard"
    ]);
});



// untuk admin
Route::get('/provinsi', [AtraksiController::class, 'getProvinsi']);
Route::get('/cities/{id}', [AtraksiController::class, 'getkota']);
Route::get('/atraksi/checkSlug', [AtraksiController::class, 'checkSlug']);
Route::post('/atraksi/publish', [AtraksiController::class, 'publishAtraksi']);
Route::get('atraksi/{atraksi}/upload', [PhotoController::class, 'index']);
Route::post('atraksi/{atraksi}/upload', [PhotoController::class, 'store']);
Route::delete('atraksi/{atraksi}/image/{photo}', [PhotoController::class, 'destroy']);

Route::resource('/types', TypeController::class);
Route::resource('/atraksi', AtraksiController::class);
Route::resource('/atraksi/{atraksi}/paket', PaketController::class);


