<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0205;
use Illuminate\Http\Request;

class PlpkPa0205Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0205::all();
    }

    public function store(Request $request)
    {

      $plpk_pa_0205 = new Plpk_pa_0205;

      $info_plpk_pa_0205->pemandu=$request->pemandu;
      $info_plpk_pa_0205->kewpal14_id=$request->kewpal14_id;
      $info_plpk_pa_0205->pengarah=$request->pengarah;
      $info_plpk_pa_0205->created_date=$request->created_date;
      $info_plpk_pa_0205->modified_date=$request->modified_date;      
      $plpk_pa_0205->save();



      return $plpk_pa_0205;



    }

    public function show(Plpk_pa_0205 $plpk_pa_0205)
    {
      return $plpk_pa_0205;
    }

    public function update(Request $request, Plpk_pa_0205 $plpk_pa_0205)
    {

      $info_plpk_pa_0205->pemandu=$request->pemandu;
      $info_plpk_pa_0205->kewpal14_id=$request->kewpal14_id;
      $info_plpk_pa_0205->pengarah=$request->pengarah;
      $info_plpk_pa_0205->created_date=$request->created_date;
      $info_plpk_pa_0205->modified_date=$request->modified_date;      
      $plpk_pa_0205->save();

      return $plpk_pa_0205;

    }

    public function destroy(Plpk_pa_0205 $plpk_pa_0205)
    {
      return $plpk_pa_0205->delete();
    }
}
