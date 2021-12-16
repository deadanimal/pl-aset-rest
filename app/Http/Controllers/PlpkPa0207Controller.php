<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0207;
use App\Models\Kewpa3A;
use App\Models\InfoPlpk_pa_0207;
use App\Models\User;
use Illuminate\Http\Request;

class PlpkPa0207Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0207" => Plpk_pa_0207::all(),
      ];

      return view('modul.aset_alih.plpk0207.index', $context);
    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      $plpkpa0207 = Plpk_pa_0207::create($request->all());
      $plpkpa0207->save();

      foreach (range(0, count($request->kewpa14_id) - 1) as $i) {

          $info_plpkpa0207 = new InfoPlpk_pa_0207;
          $info_plpkpa0207->butiran_kerosakan=$request->butiran_kerosakan[$i];
          $info_plpkpa0207->kewpa14_id=$request->kewpa14_id[$i];
          $info_plpkpa0207->plpk07_id=$plpkpa0207->id;
          $info_plpkpa0207->save();
        }

      return redirect('/plpk_pa_0207');

    }

    public function show(Plpk_pa_0207 $plpk_pa_0207)
    {
      return $plpk_pa_0207;
    }

    public function create(Plpk_pa_0207 $plpk_pa_0207)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "users" => User::all(),
      ];
      return view('modul.aset_alih.plpk0207.create', $context);

    }

    public function edit(Plpk_pa_0207 $plpk_pa_0207)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0207" => $plpk_pa_0207,
        "users" => User::all(),
      ];

      \Session::put('plpk_pa_0207', $plpk_pa_0207);

      return view('modul.aset_alih.plpk0207.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0207 $plpk_pa_0207)
    {
      $plpk_pa_0207->update($request->all());
      return redirect('/plpk_pa_0207/'.$plpk_pa_0207->id."/edit/");
    }

    public function destroy(Plpk_pa_0207 $plpk_pa_0207)
    {
      return $plpk_pa_0207->delete();
    }



}
