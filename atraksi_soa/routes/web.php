<?php

use App\Http\Controllers\AtraksiController;
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
Route::resource('/types', TypeController::class);
Route::resource('/atraksi', AtraksiController::class);


