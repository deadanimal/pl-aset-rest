<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0206;
use Illuminate\Http\Request;

class InfoPlpkPa0206Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0206::all();
    }

    public function store(Request $request)
    {

      $info_plpk_pa_0206 = new InfoPlpk_pa_0206;
      $info_plpk_pa_0206->deskripsi_alat_ganti=$request->deskripsi_alat_ganti;
      $info_plpk_pa_0206->kuantiti=$request->kuantiti;
      $info_plpk_pa_0206->catitan=$request->catitan;
      $info_plpk_pa_0206->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0206->plpk06_id=$request->plpk06_id;
      $info_plpk_pa_0206->save()

      return $info_plpk_pa_0206;

      
    }

    public function show(InfoPlpk_pa_0206 $info_plpk_pa_0206)
    {
      return $info_plpk_pa_0206;
    }

    public function update(Request $request, InfoPlpk_pa_0206 $info_plpk_pa_0206)
    {

      $info_plpk_pa_0206->deskripsi_alat_ganti=$request->deskripsi_alat_ganti;
      $info_plpk_pa_0206->kuantiti=$request->kuantiti;
      $info_plpk_pa_0206->catitan=$request->catitan;
      $info_plpk_pa_0206->kewpa14_id=$request->kewpa14_id;
      $info_plpk_pa_0206->plpk06_id=$request->plpk06_id;


      $info_plpk_pa_0206->save()

      return $info_plpk_pa_0206;

    }

    public function destroy(InfoPlpk_pa_0206 $info_plpk_pa_0206)
    {
      return $info_plpk_pa_0206->delete();
    }
}
