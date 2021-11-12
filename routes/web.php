<?php

use App\Http\Controllers\InfoKewatk1Controller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

use App\Http\Controllers\InfoKewatk2Controller;
use App\Http\Controllers\InfoKewatk4Controller;
use App\Http\Controllers\InfoKewatk6Controller;
use App\Http\Controllers\InfoKewatk7Controller;
use App\Http\Controllers\InfoKewatk9Controller;
use App\Http\Controllers\InfoKewatk10Controller;
use App\Http\Controllers\InfoKewpa1Controller;
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

# atk controller
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
use App\Http\Controllers\KodAsetController;
use App\Http\Controllers\KodJabatanController;
use App\Http\Controllers\KodLokasiController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PlpkPa0201Controller;
use App\Http\Controllers\PlpkPa0202Controller;
use App\Http\Controllers\PlpkPa0203Controller;
use App\Http\Controllers\PlpkPa0204Controller;
use App\Http\Controllers\PlpkPa0205Controller;

# umum controller
use App\Http\Controllers\PlpkPa0206Controller;
use App\Http\Controllers\PlpkPa0207Controller;
use App\Http\Controllers\PlpkPa0208Controller;
use App\Http\Controllers\PlpkPa0209Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

# authentication
Route::post('auth', [AuthenticationController::class, 'authenticateUser']);

Route::resource('kewpa1', Kewpa1Controller::class);
Route::resource('info_kewpa1', InfoKewpa1Controller::class);
Route::resource('kewpa2', Kewpa2Controller::class);
Route::resource('info_kewpa2', Kewpa2Controller::class);
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
Route::resource('info_kewatk1', InfoKewatk1Controller::class);
Route::resource('info_kewatk2', InfoKewatk2Controller::class);
Route::resource('info_kewatk4', InfoKewatk4Controller::class);
Route::resource('info_kewatk6', InfoKewatk6Controller::class);
Route::resource('info_kewatk7', InfoKewatk7Controller::class);
Route::resource('info_kewatk9', InfoKewatk9Controller::class);
Route::resource('info_kewatk10', InfoKewatk10Controller::class);

# stor routes
Route::resource('kewps1', Kewps1Controller::class);
Route::resource('infokewps1', InfoKewps1Controller::class);
Route::resource('kewps2', Kewps2Controller::class);
Route::resource('infokewps2', InfoKewps2Controller::class);
Route::resource('kewps3a', Kewps3aController::class);
Route::resource('kewps3b', Kewps3bController::class);
Route::resource('kewps4', Kewps4Controller::class);
Route::resource('kewps5', Kewps5Controller::class);

Route::get('modul', [OtherController::class, 'modul_index']);
Route::get('aset-alih', [OtherController::class, 'aset_alih_index']);
Route::get('aset-tak-alih', [OtherController::class, 'aset_tak_alih_index']);
Route::get('aset-tak-ketara', [OtherController::class, 'aset_tak_ketara_index']);
Route::get('stor', [OtherController::class, 'stor_index']);
Route::get('umum', [OtherController::class, 'umum_index']);

# kewatk1 utility
Route::get('kewatk1pdf/{kewatk1}', [Kewatk1Controller::class, 'generatePdf']);
Route::get('kewatk2pdf/{kewatk2}', [Kewatk2Controller::class, 'generatePdf']);
Route::get('kewatk4pdf', [Kewatk4Controller::class, 'generatePdf']);
Route::get('kewatk5pdf', [Kewatk5Controller::class, 'generatePdf']);
Route::get('kewatk3apdf/{kewatk3}', [Kewatk3aController::class, 'generatePdf']);
Route::get('kewatk3bpdf/{kewatk3}', [Kewatk3bController::class, 'generatePdf']);
Route::get('kewatk7pdf/{kewatk7}', [Kewatk7Controller::class, 'generatePdf']);
Route::get('kewatk10pdf/{tahun}', [Kewatk10Controller::class, 'generatePdf']);
Route::get('kewatk11pdf/{tahun}', [Kewatk11Controller::class, 'generatePdf']);
Route::get('kewatk12pdf', [Kewatk12Controller::class, 'generatePdf']);
Route::get('kewatk13pdf/{kewatk13}', [Kewatk13Controller::class, 'generatePdf']);

# stor utility
Route::get('/kewps1pdf/{kewps1}', [Kewps1Controller::class, 'generatePdf']);
Route::get('/kewps2pdf/{kewps2}', [Kewps2Controller::class, 'generatePdf']);
Route::get('/kewps3apdf/{kewps3a}', [Kewps3aController::class, 'generatePdf']);
Route::get('/kewps3bpdf', [Kewps3bController::class, 'generatePdf']);
Route::get('/kewps4pdf', [Kewps4Controller::class, 'generatePdf']);
