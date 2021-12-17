<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0201;
use Illuminate\Http\Request;

class PlpkPa0201Controller extends Controller
{
    public function index()
    {
      return Plpk_pa_0201::all();
    }

    public function store(Request $request)
    {
      return Plpk_pa_0201::create($request->all());
    }

    public function show($plpk_pa_0201)
    {
      return Plpk_pa_0201::where('id',$plpk_pa_0201)->first();
    }

    public function update(Request $request, $plpk_pa_0201)
    {
      $plpk_pa_0201 = Plpk_pa_0201::where('id', $plpk_pa_0201)->first();
      $plpk_pa_0201->update($request->all());

      return $plpk_pa_0201;

    }

    public function destroy($plpk_pa_0201)
    {
      $plpk_pa_0201 = Plpk_pa_0201::where('id', $plpk_pa_0201)->first();
      return $plpk_pa_0201->delete();
    }
}
