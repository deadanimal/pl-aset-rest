<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0203;
use Illuminate\Http\Request;

class InfoPlpkPa0203Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0203::all();
    }

    public function store(Request $request)
    {

      $info_plpk_pa_0203 = new InfoPlpk_pa_0203;
      $info_plpk_pa_0203->butiran_kerosakan=$request->butiran_kerosakan;
      $info_plpk_pa_0203->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0203->plpk03_id=$request->plpk03_id;
      $info_plpk_pa_0203->save()

      return $info_plpk_pa_0203;

      
    }

    public function show(InfoPlpk_pa_0203 $info_plpk_pa_0203)
    {
      return $info_plpk_pa_0203;
    }

    public function update(Request $request, InfoPlpk_pa_0203 $info_plpk_pa_0203)
    {
      $info_plpk_pa_0203->butiran_kerosakan=$request->butiran_kerosakan;
      $info_plpk_pa_0203->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0203->plpk03_id=$request->plpk03_id;

      $info_plpk_pa_0203->save()

      return $info_plpk_pa_0203;

    }

    public function destroy(InfoPlpk_pa_0203 $info_plpk_pa_0203)
    {
      return $info_plpk_pa_0203->delete();
    }
}
