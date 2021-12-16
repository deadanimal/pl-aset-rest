<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0206;
use App\Models\Kewpa3A;
use App\Models\InfoPlpk_pa_0206;
use App\Models\User;
use Illuminate\Http\Request;

class PlpkPa0206Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0206" => Plpk_pa_0206::all(),
      ];

      return view('modul.aset_alih.plpk0206.index', $context);
    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      $plpkpa0206 = Plpk_pa_0206::create($request->all());
      $plpkpa0206->save();

      foreach (range(0, count($request->kewpa14_id) - 1) as $i) {

          $info_plpkpa0206 = new InfoPlpk_pa_0206;
          $info_plpkpa0206->deskripsi_alat_ganti=$request->deskripsi_alat_ganti[$i];
          $info_plpkpa0206->kuantiti=$request->kuantiti[$i];
          $info_plpkpa0206->catitan=$request->catitan[$i];
          $info_plpkpa0206->kewpa14_id=$request->kewpa14_id[$i];
          $info_plpkpa0206->plpk06_id=$plpkpa0206->id;
          $info_plpkpa0206->save();
        }

      return redirect('/plpk_pa_0206');

    }

    public function show(Plpk_pa_0206 $plpk_pa_0206)
    {
      return $plpk_pa_0206;
    }

    public function create(Plpk_pa_0206 $plpk_pa_0206)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "users" => User::all(),
      ];
      return view('modul.aset_alih.plpk0206.create', $context);

    }

    public function edit(Plpk_pa_0206 $plpk_pa_0206)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0206" => $plpk_pa_0206,
        "users" => User::all(),
      ];

      \Session::put('plpk_pa_0206', $plpk_pa_0206);

      return view('modul.aset_alih.plpk0206.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0206 $plpk_pa_0206)
    {
      $plpk_pa_0206->update($request->all());
      return redirect('/plpk_pa_0206/'.$plpk_pa_0206->id."/edit/");
    }

    public function destroy(Plpk_pa_0206 $plpk_pa_0206)
    {
      return $plpk_pa_0206->delete();
    }



}
