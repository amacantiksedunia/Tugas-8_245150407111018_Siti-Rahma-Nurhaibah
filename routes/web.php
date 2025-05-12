<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class, 'index']);
Route::get('/create', [ItemController::class, 'create']);
Route::post('/store', [ItemController::class, 'store']);
Route::get('/edit/{id}', [ItemController::class, 'edit']);
Route::post('/update/{id}', [ItemController::class, 'update']);
Route::get('/show/{id}', [ItemController::class, 'show']);
Route::get('/delete/{id}', [ItemController::class, 'destroy']);