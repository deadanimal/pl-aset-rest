<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0204;
use Illuminate\Http\Request;

class InfoPlpkPa0204Controller extends Controller
{
public function index()

    {
      return InfoPlpk_pa_0204::all();
    }

    public function store(Request $request)
    {

      $info_plpk_pa_0204 = new InfoPlpk_pa_0204;
      $info_plpk_pa_0204->status=$request->status;
      $info_plpk_pa_0204->kuantiti=$request->kuantiti;
      $info_plpk_pa_0204->kos=$request->kos;
      $info_plpk_pa_0204->bacaan=$request->bacaan;
      $info_plpk_pa_0204->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0204->plpk04_id=$request->plpk04_id;
      $info_plpk_pa_0204->save();

      return $info_plpk_pa_0204;

      
    }

    public function show(InfoPlpk_pa_0204 $info_plpk_pa_0204)
    {
      return $info_plpk_pa_0204;
    }

    public function update(Request $request, InfoPlpk_pa_0204 $info_plpk_pa_0204)
    {
      $info_plpk_pa_0204->status=$request->status;
      $info_plpk_pa_0204->kuantiti=$request->kuantiti;
      $info_plpk_pa_0204->kos=$request->kos;
      $info_plpk_pa_0204->bacaan=$request->bacaan;
      $info_plpk_pa_0204->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0204->plpk04_id=$request->plpk04_id;
      $info_plpk_pa_0204->save();



      $info_plpk_pa_0204->save();
      return $info_plpk_pa_0204;

    }

    public function destroy(InfoPlpk_pa_0204 $info_plpk_pa_0204)
    {
      return $info_plpk_pa_0204->delete();
    }
}
