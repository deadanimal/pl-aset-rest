<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0202;
use App\Models\InfoPlpk_pa_0202;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;

class PlpkPa0202Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0202" => Plpk_pa_0202::all(),
      ];

      return view('modul.aset_alih.plpk0202.index', $context);
    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      $plpkpa0202 = Plpk_pa_0202::create($request->all());
      $plpkpa0202->save();

      foreach (range(0, count($request->kewpa14_id) - 1) as $i) {

          $info_plpkpa0202 = new InfoPlpk_pa_0202;
          $info_plpkpa0202->butiran_kerosakan=$request->butiran_kerosakan[$i];
          $info_plpkpa0202->tindakan=$request->tindakan[$i];
          $info_plpkpa0202->kewpa14_id=$request->kewpa14_id[$i];
          $info_plpkpa0202->plpk_pa_0202_id=$plpkpa0202->id;
          $info_plpkpa0202->save();
        }

      return redirect('/plpk_pa_0202');

    }

    public function show(Plpk_pa_0202 $plpk_pa_0202)
    {
      return $plpk_pa_0202;
    }

    public function create(Plpk_pa_0202 $plpk_pa_0202)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.plpk0202.create', $context);

    }

    public function edit(Plpk_pa_0202 $plpk_pa_0202)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0202" => $plpk_pa_0202
      ];

      \Session::put('plpk_pa_0202', $plpk_pa_0202);

      return view('modul.aset_alih.plpk0202.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0202 $plpk_pa_0202)
    {
      $plpk_pa_0202->update($request->all());
      return redirect('/plpk_pa_0202/'.$plpk_pa_0202->id."/edit/");
    }

    public function destroy(Plpk_pa_0202 $plpk_pa_0202)
    {
      return $plpk_pa_0202->delete();
    }



}
