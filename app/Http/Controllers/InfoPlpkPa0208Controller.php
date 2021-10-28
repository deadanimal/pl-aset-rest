<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0208;
use Illuminate\Http\Request;

class InfoPlpkPa0208Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0208::all();
    }

    public function store(Request $request)
    {

      $info_plpk_pa_0208 = new InfoPlpk_pa_0208;
      $info_plpk_pa_0208->butiran_pembaikan=$request->butiran_pembaikan;
      $info_plpk_pa_0208->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0208->plpk08_id=$request->plpk08_id;
      $info_plpk_pa_0208->save()

      return $info_plpk_pa_0208;

      
    }

    public function show(InfoPlpk_pa_0208 $info_plpk_pa_0208)
    {
      return $info_plpk_pa_0208;
    }

    public function update(Request $request, InfoPlpk_pa_0208 $info_plpk_pa_0208)
    {

      $info_plpk_pa_0208->butiran_pembaikan=$request->butiran_pembaikan;
      $info_plpk_pa_0208->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0208->plpk08_id=$request->plpk08_id;
      $info_plpk_pa_0208->save()

      return $info_plpk_pa_0208;

    }

    public function destroy(InfoPlpk_pa_0208 $info_plpk_pa_0208)
    {
      return $info_plpk_pa_0208->delete();
    }
}
