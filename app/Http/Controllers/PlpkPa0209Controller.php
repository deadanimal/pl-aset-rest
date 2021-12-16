<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0209;
use Illuminate\Http\Request;

class PlpkPa0209Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0209" => Plpk_pa_0209::all(),
      ];

      return view('modul.aset_alih.plpk0209.index', $context);
    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      $plpkpa0209 = Plpk_pa_0209::create($request->all());
      $plpkpa0209->save();

      foreach (range(0, count($request->kewpa14_id) - 1) as $i) {

          $info_plpkpa0209 = new InfoPlpk_pa_0209;
          $info_plpkpa0209->butiran_kerosakan=$request->butiran_kerosakan[$i];
          $info_plpkpa0209->tindakan=$request->tindakan[$i];
          $info_plpkpa0209->kewpa14_id=$request->kewpa14_id[$i];
          $info_plpkpa0209->plpk_pa_0209_id=$plpkpa0209->id;
          $info_plpkpa0209->save();
        }

      return redirect('/plpk_pa_0209');

    }

    public function show(Plpk_pa_0209 $plpk_pa_0209)
    {
      return $plpk_pa_0209;
    }

    public function create(Plpk_pa_0209 $plpk_pa_0209)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.plpk0209.create', $context);

    }

    public function edit(Plpk_pa_0209 $plpk_pa_0209)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0209" => $plpk_pa_0209
      ];

      \Session::put('plpk_pa_0209', $plpk_pa_0209);

      return view('modul.aset_alih.plpk0209.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0209 $plpk_pa_0209)
    {
      $plpk_pa_0209->update($request->all());
      return redirect('/plpk_pa_0209/'.$plpk_pa_0209->id."/edit/");
    }

    public function destroy(Plpk_pa_0209 $plpk_pa_0209)
    {
      return $plpk_pa_0209->delete();
    }



}
