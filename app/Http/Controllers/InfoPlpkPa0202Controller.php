<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0202;
use Illuminate\Http\Request;

class InfoPlpkPa0202Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0202::all();
    }

    public function store(Request $request)
    {
      $info_plpk_pa_0202 = new InfoPlpk_pa_0202;
      $info_plpk_pa_0202 -> butiran_kerosakan = $request -> butiran_kerosakan;
      $info_plpk_pa_0202 -> tindakan = $request -> tindakan;
      $info_plpk_pa_0202 -> kewpa14_id = $request -> kewpa14_id;
      $info_plpk_pa_0202 -> plpk0202_id = $request -> plpk0202_id;

      return $info_plpk_pa_0202;

      
    }

    public function show(InfoPlpk_pa_0202 $info_plpk_pa_0202)
    {
      return $info_plpk_pa_0202;
    }

    public function update(Request $request, InfoPlpk_pa_0202 $info_plpk_pa_0202)
    {
      $info_plpk_pa_0202 -> butiran_kerosakan = $request -> butiran_kerosakan;
      $info_plpk_pa_0202 -> tindakan = $request -> tindakan;
      $info_plpk_pa_0202 -> kewpa14_id = $request -> kewpa14_id;
      $info_plpk_pa_0202 -> plpk0202_id = $request -> plpk0202_id;

      return $info_plpk_pa_0202;


    }

    public function destroy(InfoPlpk_pa_0202 $info_plpk_pa_0202)
    {
      return $info_plpk_pa_0202->delete();
    }

}
