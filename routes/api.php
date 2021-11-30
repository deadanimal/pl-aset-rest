<?php 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kewps8APIController;
use App\Http\Controllers\Kewpa9Controller;
use App\Http\Controllers\Kewpa10Controller;
use App\Http\Controllers\PlpkPa0201Controller;


#KEWPA Controller 
#
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
  
Route::apiResource('kewps8', Kewps8APIController::class);
Route::apiResource('kewpa9', Kewpa9Controller::class);
Route::apiResource('kewpa10a', Kewpa10Controller::class);
Route::apiResource('kewpa10b', PlpkPa0201Controller::class);

