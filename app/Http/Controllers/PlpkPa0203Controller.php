<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0203;
use Illuminate\Http\Request;

class PlpkPa0203Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0203::all();
    }

    public function store(Request $request)
    {
      $plpk_pa_0203 = new Plpk_pa_0203;

      $plpk_pa_0203->plpk03_id=$request->plpk03_id;
      $plpk_pa_0203->tarikh_permohonan=$request->tarikh_permohonan;
      $plpk_pa_0203->status_keutamaan=$request->status_keutamaan;
      $plpk_pa_0203->nota_penjelasan=$request->nota_penjelasan;
      $plpk_pa_0203->pembaiki_disyorkan=$request->pembaiki_disyorkan;
      $plpk_pa_0203->nota_kebenaran=$request->nota_kebenaran;
      $plpk_pa_0203->created_date=$request->created_date;
      $plpk_pa_0203->modified_date=$request->modified_date;
      $plpk_pa_0203->pegawai_penyelenggaraan=$request->pegawai_penyelenggaraan;

      $plpk_pa_0203 -> save();



      return $plpk_pa_0203;

      
    }

    public function show(Plpk_pa_0203 $plpk_pa_0203)
    {
      return $plpk_pa_0203;
    }

    public function update(Request $request, Plpk_pa_0203 $plpk_pa_0203)
    {
      $plpk_pa_0203->plpk03_id=$request->plpk03_id;
      $plpk_pa_0203->tarikh_permohonan=$request->tarikh_permohonan;
      $plpk_pa_0203->status_keutamaan=$request->status_keutamaan;
      $plpk_pa_0203->nota_penjelasan=$request->nota_penjelasan;
      $plpk_pa_0203->pembaiki_disyorkan=$request->pembaiki_disyorkan;
      $plpk_pa_0203->nota_kebenaran=$request->nota_kebenaran;
      $plpk_pa_0203->created_date=$request->created_date;
      $plpk_pa_0203->modified_date=$request->modified_date;
      $plpk_pa_0203->pegawai_penyelenggaraan=$request->pegawai_penyelenggaraan;

      $plpk_pa_0203 -> save();



      return $plpk_pa_0203;


    }

    public function destroy(Plpk_pa_0203 $plpk_pa_0203)
    {
      return $plpk_pa_0203->delete();
    }
}
