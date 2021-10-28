<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0207;
use Illuminate\Http\Request;

class PlpkPa0207Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0207::all();
    }

    public function store(Request $request)
    {

      $plpk_pa_0207 = new Plpk_pa_0207;
      $plpk_pa_0207->bacaan_odometer=$request->bacaan_odometer;
      $plpk_pa_0207->tarikh_diperlukan=$request->tarikh_diperlukan;
      $plpk_pa_0207->kedudukan_tayar=$request->kedudukan_tayar;
      $plpk_pa_0207->nama_pembekal=$request->nama_pembekal;
      $plpk_pa_0207->jenis=$request->jenis;
      $plpk_pa_0207->penerima=$request->penerima;
      $plpk_pa_0207->unit_bengkel=$request->unit_bengkel;      
      $plpk_pa_0207->save();

      return $plpk_pa_0207;



    }

    public function show(Plpk_pa_0207 $plpk_pa_0207)
    {
      return $plpk_pa_0207;
    }

    public function update(Request $request, Plpk_pa_0207 $plpk_pa_0207)
    {

      $plpk_pa_0207->bacaan_odometer=$request->bacaan_odometer;
      $plpk_pa_0207->tarikh_diperlukan=$request->tarikh_diperlukan;
      $plpk_pa_0207->kedudukan_tayar=$request->kedudukan_tayar;
      $plpk_pa_0207->nama_pembekal=$request->nama_pembekal;
      $plpk_pa_0207->jenis=$request->jenis;
      $plpk_pa_0207->penerima=$request->penerima;
      $plpk_pa_0207->unit_bengkel=$request->unit_bengkel;      
      $plpk_pa_0207->save();

      return $plpk_pa_0207;

    }

    public function destroy(Plpk_pa_0207 $plpk_pa_0207)
    {
      return $plpk_pa_0207->delete();
    }
}
