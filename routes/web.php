<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */


use App\Http\Controllers\DataAsetKhususBinaanLuarController;
use App\Http\Controllers\DataAsetKhususController;
use App\Http\Controllers\GambarbinaanluarController;
use App\Http\Controllers\GambarblokController;
use App\Http\Controllers\InfoKewatk1Controller;
use App\Http\Controllers\InfoKewatk2Controller;
use App\Http\Controllers\InfoKewatk4Controller;
use App\Http\Controllers\InfoKewatk6Controller;
use App\Http\Controllers\InfoKewatk7Controller;
use App\Http\Controllers\InfoKewatk9Controller;
use App\Http\Controllers\InfoKewatk10Controller;
use App\Http\Controllers\InfoKewatk15Controller;
use App\Http\Controllers\InfoKewatk19Controller;
use App\Http\Controllers\InfoKewpa1Controller;
use App\Http\Controllers\InfoKewpa2Controller;
use App\Http\Controllers\InfoKewpa8Controller;
use App\Http\Controllers\InfoKewpa9Controller;
use App\Http\Controllers\InfoKewpa11Controller;
use App\Http\Controllers\InfoKewpa14Controller;
use App\Http\Controllers\InfoKewpa15Controller;
use App\Http\Controllers\InfoKewpa16Controller;
use App\Http\Controllers\InfoKewpa17Controller;
use App\Http\Controllers\InfoKewpa18Controller;
use App\Http\Controllers\InfoKewpa19Controller;
use App\Http\Controllers\InfoKewpa21Controller;
use App\Http\Controllers\InfoKewpa24Controller;
use App\Http\Controllers\InfoKewpa25Controller;
use App\Http\Controllers\InfoKewpa26Controller;
use App\Http\Controllers\InfoKewpa27Controller;
use App\Http\Controllers\InfoKewpa28Controller;
use App\Http\Controllers\InfoKewpa29Controller;
use App\Http\Controllers\InfoKewpa32Controller;
use App\Http\Controllers\InfoKewpa36Controller;
use App\Http\Controllers\InfoKewpa37Controller;
use App\Http\Controllers\InfoKewps1Controller;
use App\Http\Controllers\InfoKewps2Controller;
use App\Http\Controllers\InfoPlpkPa0202Controller;
use App\Http\Controllers\InfoPlpkPa0204Controller;
use App\Http\Controllers\InfoPlpkPa0206Controller;
use App\Http\Controllers\InfoPlpkPa0207Controller;
use App\Http\Controllers\InfoPlpkPa0208Controller;
use App\Http\Controllers\InfoPlpkPa0209Controller;
use App\Http\Controllers\Jkrpata92Controller;
use App\Http\Controllers\Jkrpataf68Controller;
use App\Http\Controllers\Jkrpataf69Controller;
use App\Http\Controllers\Jkrpataf102Controller;
use App\Http\Controllers\Jkrpataf104Controller;
use App\Http\Controllers\Jkrpataf114Controller;
use App\Http\Controllers\Jkrpataf610Controller;
use App\Http\Controllers\Jkrpataf612Controller;
use App\Http\Controllers\Kewatk1Controller;
use App\Http\Controllers\Kewatk2Controller;
use App\Http\Controllers\Kewatk3aController;
use App\Http\Controllers\Kewatk3bController;
use App\Http\Controllers\Kewatk4Controller;
use App\Http\Controllers\Kewatk5Controller;
use App\Http\Controllers\Kewatk6Controller;
use App\Http\Controllers\Kewatk7Controller;
use App\Http\Controllers\Kewatk8Controller;
use App\Http\Controllers\Kewatk9Controller;
use App\Http\Controllers\Kewatk10Controller;
use App\Http\Controllers\Kewatk11Controller;
use App\Http\Controllers\Kewatk12Controller;
use App\Http\Controllers\Kewatk13Controller;
use App\Http\Controllers\Kewatk14Controller;
use App\Http\Controllers\Kewatk15Controller;
use App\Http\Controllers\Kewatk16Controller;

# atk controller
use App\Http\Controllers\Kewatk17Controller;
use App\Http\Controllers\Kewatk18Controller;
use App\Http\Controllers\Kewatk19Controller;
use App\Http\Controllers\Kewatk20Controller;
use App\Http\Controllers\Kewatk21Controller;
use App\Http\Controllers\Kewatk22Controller;
use App\Http\Controllers\Kewatk23Controller;
use App\Http\Controllers\Kewatk24Controller;
use App\Http\Controllers\Kewatk25Controller;
use App\Http\Controllers\Kewatk26Controller;
use App\Http\Controllers\Kewatk27Controller;
use App\Http\Controllers\Kewpa1Controller;
use App\Http\Controllers\Kewpa2Controller;
use App\Http\Controllers\Kewpa3AController;
use App\Http\Controllers\Kewpa3BController;
use App\Http\Controllers\Kewpa5n6Controller;
use App\Http\Controllers\Kewpa7Controller;
use App\Http\Controllers\Kewpa8Controller;
use App\Http\Controllers\Kewpa10Controller;
use App\Http\Controllers\Kewpa11Controller;
use App\Http\Controllers\Kewpa12Controller;
use App\Http\Controllers\Kewpa13Controller;
use App\Http\Controllers\Kewpa14Controller;
use App\Http\Controllers\Kewpa15Controller;
use App\Http\Controllers\Kewpa16Controller;
use App\Http\Controllers\Kewpa17Controller;
use App\Http\Controllers\Kewpa18Controller;
use App\Http\Controllers\Kewpa19Controller;
use App\Http\Controllers\Kewpa20Controller;
use App\Http\Controllers\Kewpa21Controller;
use App\Http\Controllers\Kewpa22Controller;
use App\Http\Controllers\Kewpa23Controller;
use App\Http\Controllers\Kewpa24Controller;
use App\Http\Controllers\Kewpa25Controller;
use App\Http\Controllers\Kewpa26Controller;
use App\Http\Controllers\Kewpa27Controller;
use App\Http\Controllers\Kewpa28Controller;
use App\Http\Controllers\Kewpa29Controller;
use App\Http\Controllers\Kewpa30Controller;
use App\Http\Controllers\Kewpa31Controller;
use App\Http\Controllers\Kewpa32Controller;
use App\Http\Controllers\Kewpa33Controller;
use App\Http\Controllers\Kewpa34Controller;
use App\Http\Controllers\Kewpa35Controller;
use App\Http\Controllers\Kewpa36Controller;
use App\Http\Controllers\Kewpa37Controller;
use App\Http\Controllers\Kewps1Controller;
use App\Http\Controllers\Kewps2Controller;
use App\Http\Controllers\Kewps3aController;
use App\Http\Controllers\Kewps3bController;
use App\Http\Controllers\Kewps4Controller;
use App\Http\Controllers\Kewps5Controller;
use App\Http\Controllers\Kewps6Controller;
use App\Http\Controllers\Kewps7Controller;
use App\Http\Controllers\Kewps8Controller;
use App\Http\Controllers\Kewps9Controller;

# atk controller
use App\Http\Controllers\Kewps10Controller;
use App\Http\Controllers\Kewps11Controller;
use App\Http\Controllers\Kewps12Controller;
use App\Http\Controllers\Kewps13Controller;
use App\Http\Controllers\Kewps14Controller;
use App\Http\Controllers\Kewps15Controller;
use App\Http\Controllers\Kewps16Controller;
use App\Http\Controllers\Kewps17Controller;
use App\Http\Controllers\Kewps18Controller;
use App\Http\Controllers\Kewps19Controller;
use App\Http\Controllers\Kewps20Controller;
use App\Http\Controllers\Kewps21Controller;
use App\Http\Controllers\Kewps22Controller;
use App\Http\Controllers\Kewps23Controller;
use App\Http\Controllers\Kewps24Controller;
use App\Http\Controllers\Kewps25Controller;
use App\Http\Controllers\Kewps26Controller;
use App\Http\Controllers\Kewps27Controller;
use App\Http\Controllers\Kewps28Controller;
use App\Http\Controllers\Kewps29Controller;
use App\Http\Controllers\Kewps30Controller;
use App\Http\Controllers\Kewps31Controller;
use App\Http\Controllers\Kewps32Controller;
use App\Http\Controllers\Kewps33Controller;
use App\Http\Controllers\Kewps34Controller;
use App\Http\Controllers\Kewps35Controller;
use App\Http\Controllers\Kewps36Controller;
use App\Http\Controllers\KodAsetController;
use App\Http\Controllers\KodJabatanController;
use App\Http\Controllers\KodLokasiController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\Plpkpa0102Controller;
use App\Http\Controllers\PlpkPa0201Controller;
use App\Http\Controllers\PlpkPa0202Controller;
use App\Http\Controllers\PlpkPa0203Controller;
use App\Http\Controllers\PlpkPa0204Controller;
use App\Http\Controllers\PlpkPa0205Controller;

# umum controller
use App\Http\Controllers\UserController;
use App\Models\DataAsetKhusus;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


# authentication
Route::post('auth', [AuthenticationController::class, 'authenticateUser']);

Route::resource('kewpa1', Kewpa1Controller::class);
Route::resource('info_kewpa1', InfoKewpa1Controller::class);
Route::resource('kewpa2', Kewpa2Controller::class);
Route::resource('info_kewpa2', InfoKewpa2Controller::class);
Route::resource('kewpa3a', Kewpa3AController::class);
Route::resource('kewpa3b', Kewpa3BController::class);
Route::resource('kewpa5n6', Kewpa5n6Controller::class);
Route::resource('kewpa7', Kewpa7Controller::class);
Route::resource('kewpa8', Kewpa8Controller::class);
Route::resource('kewpa9', InfoKewpa8Controller::class);
Route::resource('info_kewpa9', InfoKewpa9Controller::class);
Route::resource('kewpa10', Kewpa10Controller::class);
Route::resource('plpk_pa_0201', PlpkPa0201Controller::class);
Route::resource('plpk_pa_0202', PlpkPa0202Controller::class);
Route::resource('info_plpk_pa_0202', InfoPlpkPa0202Controller::class);
Route::resource('plpk_pa_0203', PlpkPa0203Controller::class);
Route::resource('plpk_pa_0204', PlpkPa0204Controller::class);
Route::resource('info_plpk_pa_0204', InfoPlpkPa0204Controller::class);
Route::resource('plpk_pa_0205', PlpkPa0205Controller::class);
Route::resource('plpk_pa_0206', PlpkPa0206Controller::class);
Route::resource('info_plpk_pa_0206', InfoPlpkPa0206Controller::class);
Route::resource('plpk_pa_0207', PlpkPa0207Controller::class);
Route::resource('info_plpk_pa_0207', InfoPlpkPa0207Controller::class);
Route::resource('plpk_pa_0208', PlpkPa0208Controller::class);
Route::resource('info_plpk_pa_0208', InfoPlpkPa0208Controller::class);
Route::resource('info_plpk_pa_0209', InfoPlpkPa0209Controller::class);
Route::resource('plpk_pa_0209', PlpkPa0209Controller::class);
Route::resource('kewpa11', Kewpa11Controller::class);
Route::resource('info_kewpa11', InfoKewpa11Controller::class);
Route::resource('kewpa12', Kewpa12Controller::class);
Route::resource('kewpa13', Kewpa13Controller::class);
Route::resource('kewpa14', Kewpa14Controller::class);
Route::resource('info_kewpa14', InfoKewpa14Controller::class);
Route::resource('kewpa15', Kewpa15Controller::class);
Route::resource('info_kewpa15', InfoKewpa15Controller::class);
Route::resource('kewpa16', Kewpa16Controller::class);
Route::resource('info_kewpa16', InfoKewpa16Controller::class);
Route::resource('kewpa17', Kewpa17Controller::class);
Route::resource('info_kewpa17', InfoKewpa17Controller::class);
Route::resource('kewpa18', Kewpa18Controller::class);
Route::resource('info_kewpa18', InfoKewpa18Controller::class);
Route::resource('kewpa19', Kewpa19Controller::class);
Route::resource('info_kewpa19', InfoKewpa19Controller::class);
Route::resource('kewpa20', Kewpa20Controller::class);
Route::resource('kewpa21', Kewpa21Controller::class);
Route::resource('info_kewpa21', InfoKewpa21Controller::class);
Route::resource('kewpa22', Kewpa22Controller::class);
Route::resource('kewpa23', Kewpa23Controller::class);
Route::resource('kewpa24', Kewpa24Controller::class);
Route::resource('info_kewpa24', InfoKewpa24Controller::class);
Route::resource('kewpa25', Kewpa25Controller::class);
Route::resource('info_kewpa25', InfoKewpa25Controller::class);
Route::resource('kewpa26', Kewpa26Controller::class);
Route::resource('info_kewpa26', InfoKewpa26Controller::class);
Route::resource('kewpa27', Kewpa27Controller::class);
Route::resource('info_kewpa27', InfoKewpa27Controller::class);
Route::resource('kewpa28', Kewpa28Controller::class);
Route::resource('info_kewpa28', InfoKewpa28Controller::class);
Route::resource('kewpa29', Kewpa29Controller::class);
Route::resource('info_kewpa29', InfoKewpa29Controller::class);
Route::resource('kewpa30', Kewpa30Controller::class);
Route::resource('kewpa31', Kewpa31Controller::class);
Route::resource('kewpa32', Kewpa32Controller::class);
Route::resource('info_kewpa32', InfoKewpa32Controller::class);
Route::resource('kewpa33', Kewpa33Controller::class);
Route::resource('kewpa34', Kewpa34Controller::class);
Route::resource('kewpa35', Kewpa35Controller::class);
Route::resource('kewpa36', Kewpa36Controller::class);
Route::resource('info_kewpa36', InfoKewpa36Controller::class);
Route::resource('kewpa37', Kewpa37Controller::class);
Route::resource('info_kewpa37', InfoKewpa37Controller::class);

# umum routes
Route::resource('lokasi', KodLokasiController::class);
Route::resource('kod-aset', KodAsetController::class);
Route::resource('jabatan', KodJabatanController::class);
Route::resource('pengumuman', PengumumanController::class);
Route::resource('pengguna', UserController::class);

# atk routes

Route::resource('kewatk1', Kewatk1Controller::class);
Route::resource('kewatk2', Kewatk2Controller::class);
Route::resource('kewatk3a', Kewatk3aController::class);
Route::resource('kewatk3b', Kewatk3bController::class);
Route::resource('kewatk4', Kewatk4Controller::class);
Route::resource('kewatk5', Kewatk5Controller::class);
Route::resource('kewatk6', Kewatk6Controller::class);
Route::resource('kewatk7', Kewatk7Controller::class);
Route::resource('kewatk8', Kewatk8Controller::class);
Route::resource('kewatk9', Kewatk9Controller::class);
Route::resource('kewatk10', Kewatk10Controller::class);
Route::resource('kewatk11', Kewatk11Controller::class);
Route::resource('kewatk12', Kewatk12Controller::class);
Route::resource('kewatk13', Kewatk13Controller::class);
Route::resource('kewatk14', Kewatk14Controller::class);
Route::resource('kewatk15', Kewatk15Controller::class);
Route::resource('kewatk16', Kewatk16Controller::class);
Route::resource('kewatk17', Kewatk17Controller::class);
Route::resource('kewatk18', Kewatk18Controller::class);
Route::resource('kewatk19', Kewatk19Controller::class);
Route::resource('kewatk20', Kewatk20Controller::class);
Route::resource('kewatk21', Kewatk21Controller::class);
Route::resource('kewatk22', Kewatk22Controller::class);
Route::resource('kewatk23', Kewatk23Controller::class);
Route::resource('kewatk24', Kewatk24Controller::class);
Route::resource('kewatk25', Kewatk25Controller::class);
Route::resource('kewatk26', Kewatk26Controller::class);
Route::resource('kewatk27', Kewatk27Controller::class);

Route::resource('info_kewatk1', InfoKewatk1Controller::class);
Route::resource('info_kewatk2', InfoKewatk2Controller::class);
Route::resource('info_kewatk4', InfoKewatk4Controller::class);
Route::resource('info_kewatk6', InfoKewatk6Controller::class);
Route::resource('info_kewatk7', InfoKewatk7Controller::class);
Route::resource('info_kewatk9', InfoKewatk9Controller::class);
Route::resource('info_kewatk10', InfoKewatk10Controller::class);
Route::resource('info_kewatk15', InfoKewatk15Controller::class);
Route::resource('info_kewatk19', InfoKewatk19Controller::class);

# stor routes
Route::group(['middleware' => 'auth'], function () {
    Route::resource('kewps1', Kewps1Controller::class);
    Route::resource('infokewps1', InfoKewps1Controller::class);
    Route::resource('kewps2', Kewps2Controller::class);
    Route::resource('infokewps2', InfoKewps2Controller::class);
    Route::resource('kewps3a', Kewps3aController::class);
    Route::resource('kewps3b', Kewps3bController::class);
    Route::resource('kewps4', Kewps4Controller::class);
    Route::resource('kewps5', Kewps5Controller::class);
    Route::resource('kewps6', Kewps6Controller::class);

    Route::resource('kewps7', Kewps7Controller::class);
    Route::resource('kewps8', Kewps8Controller::class);
    Route::resource('kewps9', Kewps9Controller::class);
    Route::resource('kewps10', Kewps10Controller::class);
    Route::resource('kewps11', Kewps11Controller::class);
    Route::resource('kewps12', Kewps12Controller::class);
    Route::resource('kewps13', Kewps13Controller::class);
    Route::resource('kewps14', Kewps14Controller::class);
    Route::resource('kewps15', Kewps15Controller::class);
    Route::resource('kewps16', Kewps16Controller::class);
    Route::resource('kewps17', Kewps17Controller::class);
    Route::resource('kewps18', Kewps18Controller::class);
    Route::resource('kewps19', Kewps19Controller::class);
    Route::resource('kewps20', Kewps20Controller::class);
    Route::resource('kewps21', Kewps21Controller::class);
    Route::resource('kewps22', Kewps22Controller::class);
    Route::resource('kewps23', Kewps23Controller::class);
    Route::resource('kewps24', Kewps24Controller::class);
    Route::resource('kewps25', Kewps25Controller::class);
    Route::resource('kewps26', Kewps26Controller::class);
    Route::resource('kewps27', Kewps27Controller::class);
    Route::resource('kewps28', Kewps28Controller::class);
    Route::resource('kewps29', Kewps29Controller::class);
    Route::resource('kewps30', Kewps30Controller::class);
    Route::resource('kewps31', Kewps31Controller::class);
    Route::resource('kewps32', Kewps32Controller::class);
    Route::resource('kewps33', Kewps33Controller::class);
    Route::resource('kewps34', Kewps34Controller::class);
    Route::resource('kewps35', Kewps35Controller::class);
    Route::resource('kewps36', Kewps36Controller::class);

    //for selection
    Route::get('kewps2_dinamic', [Kewps2Controller::class, 'getDinamic']);
    Route::get('kewps3_dinamic', [Kewps3aController::class, 'getDinamic']);
    Route::get('kewps13_dinamic', [Kewps13Controller::class, 'getDinamic']);
    Route::get('kewps12_dinamic', [Kewps12Controller::class, 'getDinamic']);
    Route::get('kewps6_dinamic', [Kewps6Controller::class, 'getDinamic']);
});

#ata Routes
Route::group(['middleware' => 'auth'], function () {

    Route::resource('/jkrpataf102', Jkrpataf102Controller::class);
    Route::resource('/jkrpataf68', Jkrpataf68Controller::class);
    Route::resource('/jkrpata92', Jkrpata92Controller::class);
    Route::resource('/jkrpataf69', Jkrpataf69Controller::class);
    Route::resource('/jkrpataf610', Jkrpataf610Controller::class);
    Route::resource('/jkrpataf612', Jkrpataf612Controller::class);
    Route::resource('/dataasetkhusus', DataAsetKhususController::class);
    Route::resource('/dakbinaanluar', DataAsetKhususBinaanLuarController::class);
    Route::resource('/gambarblok', GambarblokController::class);
    Route::resource('/gambarbinaanluar', GambarbinaanluarController::class);
    Route::resource('/jkrpataf104', Jkrpataf104Controller::class);
    Route::resource('/jkrpataf114', Jkrpataf114Controller::class);
    Route::resource('/plpkpa0102', Plpkpa0102Controller::class);
});

Route::get('modul', [OtherController::class, 'modul_index'])->middleware('auth');
Route::get('aset-alih', [OtherController::class, 'aset_alih_index']);
Route::get('aset-tak-alih', [OtherController::class, 'aset_tak_alih_index']);
Route::get('aset-tak-ketara', [OtherController::class, 'aset_tak_ketara_index']);
Route::get('stor', [OtherController::class, 'stor_index'])->middleware('auth');
Route::get('umum', [OtherController::class, 'umum_index']);

# kewatk1 utility
Route::get('kewatk1pdf/{kewatk1}', [Kewatk1Controller::class, 'generatePdf']);
Route::get('kewatk2pdf/{kewatk2}', [Kewatk2Controller::class, 'generatePdf']);
Route::get('kewatk4pdf/{kewatk4}', [Kewatk4Controller::class, 'generatePdf']);
Route::get('kewatk5pdf', [Kewatk5Controller::class, 'generatePdf']);
Route::get('kewatk3apdf/{kewatk3}', [Kewatk3aController::class, 'generatePdf']);
Route::get('kewatk3bpdf/{kewatk3}', [Kewatk3bController::class, 'generatePdf']);
Route::get('kewatk7pdf/{kewatk7}', [Kewatk7Controller::class, 'generatePdf']);
Route::get('kewatk8pdf/{kewatk8}', [Kewatk8Controller::class, 'generatePdf']);
Route::get('kewatk9pdf/{kewatk9}', [Kewatk9Controller::class, 'generatePdf']);
Route::get('kewatk10pdf/{tahun}', [Kewatk10Controller::class, 'generatePdf']);
Route::get('kewatk11pdf/{tahun}', [Kewatk11Controller::class, 'generatePdf']);
Route::get('kewatk12pdf', [Kewatk12Controller::class, 'generatePdf']);
Route::get('kewatk13pdf/{kewatk13}', [Kewatk13Controller::class, 'generatePdf']);
Route::get('kewatk14pdf/{tahun}', [Kewatk14Controller::class, 'generatePdf']);
Route::get('kewatk15pdf/{kewatk15}', [Kewatk15Controller::class, 'generatePdf']);
Route::get('kewatk16pdf/{tahun}', [Kewatk16Controller::class, 'generatePdf']);
Route::get('kewatk17pdf/{kewatk17}', [Kewatk17Controller::class, 'generatePdf']);
Route::get('kewatk18pdf/{kewatk18}', [Kewatk18Controller::class, 'generatePdf']);
Route::get('kewatk19pdf/{kewatk19}', [Kewatk19Controller::class, 'generatePdf']);
Route::get('kewatk23pdf/{kewatk23}', [Kewatk23Controller::class, 'generatePdf']);
Route::get('kewatk24pdf/{kewatk24}', [Kewatk24Controller::class, 'generatePdf']);
Route::get('kewatk25pdf/{kewatk25}', [Kewatk25Controller::class, 'generatePdf']);

# stor utility
Route::get('/kewps1pdf/{kewps1}', [Kewps1Controller::class, 'generatePdf']);
Route::get('/kewps2pdf/{kewps2}', [Kewps2Controller::class, 'generatePdf']);
Route::get('/kewps3apdf/{kewps3a}', [Kewps3aController::class, 'generatePdf']);
Route::get('/kewps3bpdf', [Kewps3bController::class, 'generatePdf']);
Route::get('/kewps4pdf', [Kewps4Controller::class, 'generatePdf']);
Route::get('/kewps5pdf', [Kewps5Controller::class, 'generatePdf']);
Route::get('/kewps6pdf', [Kewps6Controller::class, 'generatePdf']);
Route::get('/kewps7pdf/{kewps7}', [Kewps7Controller::class, 'generatePdf']);
Route::get('/kewps8pdf', [Kewps8Controller::class, 'generatePdf']);
Route::get('/kewps9pdf', [Kewps9Controller::class, 'generatePdf']);
Route::get('/kewps10pdf/{kewps10}', [Kewps10Controller::class, 'generatePdf']);
Route::get('/kewps11pdf/{kewps11}', [Kewps11Controller::class, 'generatePdf']);
Route::get('/kewps12pdf/{kewps12}', [Kewps12Controller::class, 'generatePdf']);
Route::get('/kewps13pdf', [Kewps13Controller::class, 'generatePdf']);
Route::get('/kewps14pdf/{kewps14}', [Kewps14Controller::class, 'generatePdf']);
Route::get('/kewps15pdf/{kewps15}', [Kewps15Controller::class, 'generatePdf']);
Route::get('/kewps16pdf/{kewps16}', [Kewps16Controller::class, 'generatePdf']);
Route::get('/kewps17pdf/{kewps17}', [Kewps17Controller::class, 'generatePdf']);
Route::get('/kewps18pdf/{kewps18}', [Kewps18Controller::class, 'generatePdf']);
Route::get('/kewps19pdf/{kewps19}', [Kewps19Controller::class, 'generatePdf']);
Route::get('/kewps20pdf/{kewps20}', [Kewps20Controller::class, 'generatePdf']);
Route::get('/kewps21pdf/{kewps21}', [Kewps21Controller::class, 'generatePdf']);
Route::get('/kewps23pdf/{kewps23}', [Kewps23Controller::class, 'generatePdf']);
Route::get('/kewps24pdf/{kewps24}', [Kewps24Controller::class, 'generatePdf']);
Route::get('/kewps25pdf/{kewps25}', [Kewps25Controller::class, 'generatePdf']);
Route::get('/kewps26pdf/{kewps26}', [Kewps26Controller::class, 'generatePdf']);
Route::get('/kewps27pdf/{kewps27}', [Kewps27Controller::class, 'generatePdf']);
Route::get('/kewps28pdf/{kewps28}', [Kewps28Controller::class, 'generatePdf']);
Route::get('/kewps29pdf/{kewps29}', [Kewps29Controller::class, 'generatePdf']);
Route::get('/kewps30pdf', [Kewps30Controller::class, 'generatePdf']);
Route::get('/kewps31pdf/{kewps31}', [Kewps31Controller::class, 'generatePdf']);
Route::get('/kewps32pdf/{kewps32}', [Kewps32Controller::class, 'generatePdf']);
Route::get('/kewps33pdf/{kewps33}', [Kewps33Controller::class, 'generatePdf']);
Route::get('/kewps34pdf/{kewps34}', [Kewps34Controller::class, 'generatePdf']);
Route::get('/kewps35pdf/{kewps35}', [Kewps35Controller::class, 'generatePdf']);
Route::get('/kewps36pdf/{kewps36}', [Kewps36Controller::class, 'generatePdf']);

//ata utility
Route::get('/jkrpataf68pdf/{jkrpataf68}', [Jkrpataf68Controller::class, 'generatePdf']);
Route::get('/jkrpataf69pdf/{jkrpataf69}', [Jkrpataf69Controller::class, 'generatePdf']);
Route::get('/jkrpataf610pdf/{jkrpataf610}', [Jkrpataf610Controller::class, 'generatePdf']);
Route::get('/jkrpata92pdf/{jkrpata92}', [Jkrpata92Controller::class, 'generatePdf']);
Route::get('/jkrpataf102pdf/{jkrpataf102}', [Jkrpataf102Controller::class, 'generatePdf']);
Route::get('/jkrpataf104pdf/{jkrpataf104}', [Jkrpataf104Controller::class, 'generatePdf']);
Route::get('/jkrpataf114pdf', [Jkrpataf114Controller::class, 'generatePdf']);
Route::get('/jkrpataf612pdf/{jkrpataf612}', [Jkrpataf612Controller::class, 'generatePdf']);
