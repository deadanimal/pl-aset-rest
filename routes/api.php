<?php 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kewps8APIController;
use App\Http\Controllers\Kewpa9APIController;
use App\Http\Controllers\Kewpa10APIController;
use App\Http\Controllers\Kewpa11APIController;
use App\Http\Controllers\Kewpa21APIController;
use App\Http\Controllers\PlpkPa0201APIController;
use App\Http\Controllers\PengumumanAPIController;
use App\Http\Controllers\AuthenticationController;

# sanctum protecter of galaxy
Route::group(['middleware' => ['auth:sanctum']], function () {
});

# kewpa 
Route::apiResource('kewps8', Kewps8APIController::class);
Route::apiResource('kewpa9', Kewpa9APIController::class);
Route::apiResource('kewpa10a', Kewpa10APIController::class);
Route::apiResource('kewpa10b', PlpkPa0201APIController::class);
Route::apiResource('kewpa11', Kewpa11APIController::class);
Route::apiResource('kewpa21', Kewpa21APIController::class);

# pengumuman

Route::apiResource('pengumuman', PengumumanAPIController::class);

# custom
Route::post('scan_info_kewpa11/', [Kewpa11APIController::class, 'get_scanned_infokewpa11']);
Route::post('scan_info_kewpa21/', [Kewpa21APIController::class, 'get_scanned_infokewpa21']);

# auth 
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout']);
Route::post('/auth/user', [AuthenticationController::class, 'get_auth_user']);

