<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0204;
use Illuminate\Http\Request;

class PlpkPa0204Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0204::all();
    }

    public function store(Request $request)
    {
      $plpk_pa_0204 = new Plpk_pa_0204;
      $plpk_pa_0204->milleage=$request->milleage;
      $plpk_pa_0204->tarikh=$request->tarikh;
      $plpk_pa_0204->selangan_selenggara=$request->selangan_selenggara;
      $plpk_pa_0204->tugas_dijalankan_oleh=$request->tugas_dijalankan_oleh;
      $plpk_pa_0204->tarikh_dijalankan=$request->tarikh_dijalankan;
      $plpk_pa_0204->pemandu=$request->pemandu;


      $plpk_pa_0204 -> save();

      return $plpk_pa_0204;

      
    }

    public function show(Plpk_pa_0204 $plpk_pa_0204)
    {
      return $plpk_pa_0204;
    }

    public function update(Request $request, Plpk_pa_0204 $plpk_pa_0204)
    {
      $plpk_pa_0204->milleage=$request->milleage;
      $plpk_pa_0204->tarikh=$request->tarikh;
      $plpk_pa_0204->selangan_selenggara=$request->selangan_selenggara;
      $plpk_pa_0204->tugas_dijalankan_oleh=$request->tugas_dijalankan_oleh;
      $plpk_pa_0204->tarikh_dijalankan=$request->tarikh_dijalankan;
      $plpk_pa_0204->pemandu=$request->pemandu;

      $plpk_pa_0204 -> save();

      return $plpk_pa_0204;


    }

    public function destroy(Plpk_pa_0204 $plpk_pa_0204)
    {
      return $plpk_pa_0204->delete();
    }

}
