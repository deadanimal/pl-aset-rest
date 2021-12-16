<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0203;
use App\Models\Kewpa3A;
use App\Models\InfoPlpk_pa_0203;
use App\Models\User;
use Illuminate\Http\Request;

class PlpkPa0203Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0203" => Plpk_pa_0203::all(),
      ];

      return view('modul.aset_alih.plpk0203.index', $context);
    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      $plpkpa0203 = Plpk_pa_0203::create($request->all());
      $plpkpa0203->save();

      foreach (range(0, count($request->kewpa14_id) - 1) as $i) {

          $info_plpkpa0203 = new InfoPlpk_pa_0203;
          $info_plpkpa0203->butiran_kerosakan=$request->butiran_kerosakan[$i];
          $info_plpkpa0203->kewpa14_id=$request->kewpa14_id[$i];
          $info_plpkpa0203->plpk03_id=$plpkpa0203->id;
          $info_plpkpa0203->save();
        }

      return redirect('/plpk_pa_0203');

    }

    public function show(Plpk_pa_0203 $plpk_pa_0203)
    {
      return $plpk_pa_0203;
    }

    public function create(Plpk_pa_0203 $plpk_pa_0203)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "users" => User::all(),
      ];
      return view('modul.aset_alih.plpk0203.create', $context);

    }

    public function edit(Plpk_pa_0203 $plpk_pa_0203)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0203" => $plpk_pa_0203,
        "users" => User::all(),
      ];

      \Session::put('plpk_pa_0203', $plpk_pa_0203);

      return view('modul.aset_alih.plpk0203.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0203 $plpk_pa_0203)
    {
      $plpk_pa_0203->update($request->all());
      return redirect('/plpk_pa_0203/'.$plpk_pa_0203->id."/edit/");
    }

    public function destroy(Plpk_pa_0203 $plpk_pa_0203)
    {
      return $plpk_pa_0203->delete();
    }



}
