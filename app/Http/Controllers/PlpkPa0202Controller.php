<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0202;
use Illuminate\Http\Request;

class PlpkPa0202Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0202::all();
    }

    public function store(Request $request)
    {
      
      $plpk_pa_0202 = new Plpk_pa_0202;
      $plpk_pa_0202->plpk0202_id = $request->plpk0202_id;
      $plpk_pa_0202->bacaan_odometer = $request->bacaan_odometer;
      $plpk_pa_0202->pemandu = $request->pemandu;

      return $plpk_pa_0202;

    }

    public function show(Plpk_pa_0202 $plpk_pa_0202)
    {
      return $plpk_pa_0202;
    }

    public function update(Request $request, Plpk_pa_0202 $plpk_pa_0202)
    {

      $plpk_pa_0202->plpk0202_id = $request->plpk0202_id;
      $plpk_pa_0202->bacaan_odometer = $request->bacaan_odometer;
      $plpk_pa_0202->pemandu = $request->pemandu;

      return $plpk_pa_0202;

    }

    public function destroy(Plpk_pa_0202 $plpk_pa_0202)
    {
      return $plpk_pa_0202->delete();
    }



}
