<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0204;
use App\Models\Plpk_pa_0204;
use Illuminate\Http\Request;
use App\Models\Kewpa3A;
use App\Models\User;

class PlpkPa0204Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0204" => Plpk_pa_0204::all(),
      ];

      return view('modul.aset_alih.plpk0204.index', $context);
    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      $plpkpa0204 = Plpk_pa_0204::create($request->all());
      $plpkpa0204->save();

      foreach (range(0, count($request->kewpa14_id) - 1) as $i) {

          $info_plpkpa0204 = new InfoPlpk_pa_0204;
          $info_plpkpa0204->status=$request->status[$i];
          $info_plpkpa0204->kos=$request->kos[$i];
          $info_plpkpa0204->kuantiti=$request->kuantiti[$i];
          $info_plpkpa0204->bacaan=$request->bacaan[$i];
          $info_plpkpa0204->kewpa14_id=$request->kewpa14_id[$i];
          $info_plpkpa0204->plpk04_id=$plpkpa0204->id;
          $info_plpkpa0204->save();
        }

      return redirect('/plpk_pa_0204');

    }

    public function show(Plpk_pa_0204 $plpk_pa_0204)
    {
      return $plpk_pa_0204;
    }

    public function create(Plpk_pa_0204 $plpk_pa_0204)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "users" => User::all(),
      ];
      return view('modul.aset_alih.plpk0204.create', $context);

    }

    public function edit(Plpk_pa_0204 $plpk_pa_0204)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0204" => $plpk_pa_0204,
        "users" => User::all(),
      ];

      \Session::put('plpk_pa_0204', $plpk_pa_0204);

      return view('modul.aset_alih.plpk0204.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0204 $plpk_pa_0204)
    {
      $plpk_pa_0204->update($request->all());
      return redirect('/plpk_pa_0204/'.$plpk_pa_0204->id."/edit/");
    }

    public function destroy(Plpk_pa_0204 $plpk_pa_0204)
    {
      return $plpk_pa_0204->delete();
    }



}
