<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0209;
use Illuminate\Http\Request;

class InfoPlpkPa0209Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0209::all();
    }

    public function store(Request $request)
    {

      $info_plpk_pa_0209 = new InfoPlpk_pa_0209;
      $info_plpk_pa_0209->tarikh_diperiksa=$request->tarikh_diperiksa;
      $info_plpk_pa_0209->pemeriksa_id=$request->pemeriksa_id;
      $info_plpk_pa_0209->pengesah_id=$request->pengesah_id;
      $info_plpk_pa_0209->save();

      return $info_plpk_pa_0209;

      
    }

    public function show(InfoPlpk_pa_0209 $info_plpk_pa_0209)
    {
      return $info_plpk_pa_0209;
    }

    public function update(Request $request, InfoPlpk_pa_0209 $info_plpk_pa_0209)
    {

      $info_plpk_pa_0209->tarikh_diperiksa=$request->tarikh_diperiksa;
      $info_plpk_pa_0209->pemeriksa_id=$request->pemeriksa_id;
      $info_plpk_pa_0209->pengesah_id=$request->pengesah_id;

      $info_plpk_pa_0209->save();

      return $info_plpk_pa_0209;

    }

    public function destroy(InfoPlpk_pa_0209 $info_plpk_pa_0209)
    {
      return $info_plpk_pa_0209->delete();
    }
}
