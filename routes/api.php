<?php 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kewps8APIController;
use App\Http\Controllers\Kewpa9APIController;
use App\Http\Controllers\Kewpa10APIController;
use App\Http\Controllers\PlpkPa0201APIController;
use App\Http\Controllers\AuthenticationController;

# sanctum 
Route::group(['middleware' => ['auth:sanctum']], function () {
});

# kewpa 
Route::apiResource('kewps8', Kewps8APIController::class);
Route::apiResource('kewpa9', Kewpa9APIController::class);
Route::apiResource('kewpa10a', Kewpa10Controller::class);
Route::apiResource('kewpa10b', PlpkPa0201APIController::class);

# auth 
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout']);
Route::post('/auth/user', [AuthenticationController::class, 'get_auth_user']);

