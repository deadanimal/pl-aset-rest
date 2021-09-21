<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Kewpa_1;

use App\Http\Controllers\Kewpa1Controller;

#Route::middleware('auth:api')->get('/user', function (Request $request) {
#    return $request->user();
#});

// Aset Alih
Route::get('/kewpa1', [Kewpa1Controller::class, 'index']);
Route::post('/kewpa1', [Kewpa1Controller::class, 'store']);
Route::put('/kewpa1/{kewpa1}', [Kewpa1Controller::class, 'update']);
Route::delete('/kewpa1/{kewpa1}', [Kewpa1Controller::class, 'destroy']);
