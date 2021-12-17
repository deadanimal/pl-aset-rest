<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0205;
use App\Models\Kewpa3A;
use App\Models\User;
use Illuminate\Http\Request;

class PlpkPa0205Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0205" => Plpk_pa_0205::all(),
      ];

      return view('modul.aset_alih.plpk0205.index', $context);
    }

    public function store(Request $request)
    {

      $request['status'] = "DERAF";
      $plpkpa0205 = Plpk_pa_0205::create($request->all());
      $plpkpa0205->save();

      return redirect('/plpk_pa_0205');

    }

    public function show(Plpk_pa_0205 $plpk_pa_0205)
    {
      return $plpk_pa_0205;
    }

    public function create(Plpk_pa_0205 $plpk_pa_0205)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "users" => User::all(),
      ];
      return view('modul.aset_alih.plpk0205.create', $context);

    }

    public function edit(Plpk_pa_0205 $plpk_pa_0205)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0205" => $plpk_pa_0205,
        "users" => User::all(),
      ];


      return view('modul.aset_alih.plpk0205.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0205 $plpk_pa_0205)
    {
      $plpk_pa_0205->update($request->all());
      return redirect('/plpk_pa_0205/'.$plpk_pa_0205->id."/edit/");
    }

    public function destroy(Plpk_pa_0205 $plpk_pa_0205)
    {
      return $plpk_pa_0205->delete();
    }



}
