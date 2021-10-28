<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0209;
use Illuminate\Http\Request;

class PlpkPa0209Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0209::all();
    }

    public function store(Request $request)
    {

      $plpk_pa_0209 = new Plpk_pa_0209;
      $plpk_pa_0209->perihal_kerosakan=$request->perihal_kerosakan;
      $plpk_pa_0209->kewpa14_id=$request->kewpa14_id;
      $plpk_pa_0209->plpk09_id=$request->plpk09_id;
      $plpk_pa_0209->save();

      return $plpk_pa_0209;



    }

    public function show(Plpk_pa_0209 $plpk_pa_0209)
    {
      return $plpk_pa_0209;
    }

    public function update(Request $request, Plpk_pa_0209 $plpk_pa_0209)
    {
      $plpk_pa_0209->perihal_kerosakan=$request->perihal_kerosakan;
      $plpk_pa_0209->kewpa14_id=$request->kewpa14_id;
      $plpk_pa_0209->plpk09_id=$request->plpk09_id;

      $plpk_pa_0209->save();

      return $plpk_pa_0209;

    }

    public function destroy(Plpk_pa_0209 $plpk_pa_0209)
    {
      return $plpk_pa_0209->delete();
    }
}
