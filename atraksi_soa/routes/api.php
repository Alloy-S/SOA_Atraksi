<?php

use App\Http\Controllers\AtraksiController;
use App\Http\Controllers\EticketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/eticket', EticketController::class);
Route::get('/atraksi/info', [AtraksiController::class, 'getAtraksiInfo']);
Route::get('/atraksi/paket', [AtraksiController::class, 'getAtraksiPaket']);

