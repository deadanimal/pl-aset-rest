<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0201;
use App\Models\KodJabatan;
use App\Models\Kewpa3A;
use App\Models\User;
use Illuminate\Http\Request;

class PlpkPa0201Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0201" => Plpk_pa_0201::all(),
      ];


      return view('modul.aset_alih.plpk0201.index', $context);
    }

    public function store(Request $request)
    {

      $request['status'] = "DERAF";
      $request['nama_pengadu'] = $request->user()->name;
      $plpkpa0201 = Plpk_pa_0201::create($request->all());
      $plpkpa0201->save();

      return redirect('/plpk_pa_0201');

    }

    public function show(Plpk_pa_0201 $plpk_pa_0201)
    {
      return $plpk_pa_0201;
    }

    public function create(Plpk_pa_0201 $plpk_pa_0201)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "users" => User::all(),
        "kod_jabatans" => KodJabatan::all(),
      ];
      return view('modul.aset_alih.plpk0201.create', $context);

    }

    public function edit(Plpk_pa_0201 $plpk_pa_0201)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0201" => $plpk_pa_0201,
        "users" => User::all(),
        "kod_jabatans" => KodJabatan::all(),
      ];


      return view('modul.aset_alih.plpk0201.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0201 $plpk_pa_0201)
    {
      $plpk_pa_0201->update($request->all());
      return redirect('/plpk_pa_0201/'.$plpk_pa_0201->id."/edit/");
    }

    public function destroy(Plpk_pa_0201 $plpk_pa_0201)
    {
      return $plpk_pa_0201->delete();
    }



}
