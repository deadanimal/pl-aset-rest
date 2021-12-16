<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0207;
use Illuminate\Http\Request;
use App\Models\Kewpa3A;
use App\Models\User;

class InfoPlpkPa0207Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0207::all();
    }

    public function store(Request $request)
    {
      InfoPlpk_pa_0207::create($request->all());
      return redirect('/plpk_pa_0207/'.$request->plpk07_id.'/edit');
 
    }

    public function show(InfoPlpk_pa_0207 $info_plpk_pa_0207)
    {
      return $info_plpk_pa_0207;
    }

    public function create() {

      $context = [
        "plpk_pa_0207" => \Session::get('plpk_pa_0207'),
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_plpk0207.create', $context);

    }


    public function edit(InfoPlpk_pa_0207 $info_plpk_pa_0207)
    {
      $context = [
        "info_plpk_pa_0207" => $info_plpk_pa_0207,
        "kewpa14" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_plpk0207.edit', $context);

    }




    public function update(Request $request, InfoPlpk_pa_0207 $info_plpk_pa_0207)
    {
      $info_plpk_pa_0207->update($request->all());
      return redirect('/plpk_pa_0207/'.$info_plpk_pa_0207->plpk07_id.'/edit');

    }

    public function destroy(InfoPlpk_pa_0207 $info_plpk_pa_0207)
    {
      return $info_plpk_pa_0207->delete();
    }



}
