<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0207;
use Illuminate\Http\Request;

class InfoPlpkPa0207Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0207::all();
    }

    public function store(Request $request)
    {

      $info_plpk_pa_0207 = new InfoPlpk_pa_0207;
      $info_plpk_pa_0207->saiz=$request->saiz;
      $info_plpk_pa_0207->tayar_bocor=$request->tayar_bocor;
      $info_plpk_pa_0207->kuantiti_tayar=$request->kuantiti_tayar;
      $info_plpk_pa_0207->kuantiti_tiub=$request->kuantiti_tiub;
      $info_plpk_pa_0207->kuantiti_pelapik=$request->kuantiti_pelapik;
      $info_plpk_pa_0207->punca_kerosakan=$request->punca_kerosakan;
      $info_plpk_pa_0207->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0207->plpk07_id=$request->plpk07_id;
      $info_plpk_pa_0207->save()

      return $info_plpk_pa_0207;

      
    }

    public function show(InfoPlpk_pa_0207 $info_plpk_pa_0207)
    {
      return $info_plpk_pa_0207;
    }

    public function update(Request $request, InfoPlpk_pa_0207 $info_plpk_pa_0207)
    {

      $info_plpk_pa_0207->saiz=$request->saiz;
      $info_plpk_pa_0207->tayar_bocor=$request->tayar_bocor;
      $info_plpk_pa_0207->kuantiti_tayar=$request->kuantiti_tayar;
      $info_plpk_pa_0207->kuantiti_tiub=$request->kuantiti_tiub;
      $info_plpk_pa_0207->kuantiti_pelapik=$request->kuantiti_pelapik;
      $info_plpk_pa_0207->punca_kerosakan=$request->punca_kerosakan;
      $info_plpk_pa_0207->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0207->plpk07_id=$request->plpk07_id;
      $info_plpk_pa_0207->save()

      return $info_plpk_pa_0207;

    }

    public function destroy(InfoPlpk_pa_0207 $info_plpk_pa_0207)
    {
      return $info_plpk_pa_0207->delete();
    }
}
