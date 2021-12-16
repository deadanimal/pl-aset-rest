<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0203;
use Illuminate\Http\Request;
use App\Models\Kewpa3A;
use App\Models\User;

class InfoPlpkPa0203Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0203::all();
    }

    public function store(Request $request)
    {
      InfoPlpk_pa_0203::create($request->all());
      return redirect('/plpk_pa_0203/'.$request->plpk03_id.'/edit');
 
    }

    public function show(InfoPlpk_pa_0203 $info_plpk_pa_0203)
    {
      return $info_plpk_pa_0203;
    }

    public function create() {

      $context = [
        "plpk_pa_0203" => \Session::get('plpk_pa_0203'),
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_plpk0203.create', $context);

    }


    public function edit(InfoPlpk_pa_0203 $info_plpk_pa_0203)
    {
      $context = [
        "info_plpk_pa_0203" => $info_plpk_pa_0203,
        "kewpa14" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_plpk0203.edit', $context);

    }




    public function update(Request $request, InfoPlpk_pa_0203 $info_plpk_pa_0203)
    {
      $info_plpk_pa_0203->update($request->all());
      return redirect('/plpk_pa_0203/'.$info_plpk_pa_0203->plpk03_id.'/edit');

    }

    public function destroy(InfoPlpk_pa_0203 $info_plpk_pa_0203)
    {
      return $info_plpk_pa_0203->delete();
    }



}
