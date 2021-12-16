<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0204;
use Illuminate\Http\Request;
use App\Models\Kewpa3A;

class InfoPlpkPa0204Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0204::all();
    }

    public function store(Request $request)
    {
      InfoPlpk_pa_0204::create($request->all());
      return redirect('/plpk_pa_0204/'.$request->plpk04_id.'/edit');
 
    }

    public function show(InfoPlpk_pa_0204 $info_plpk_pa_0204)
    {
      return $info_plpk_pa_0204;
    }

    public function create() {

      $context = [
        "plpk_pa_0204" => \Session::get('plpk_pa_0204'),
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_plpk0204.create', $context);

    }


    public function edit(InfoPlpk_pa_0204 $info_plpk_pa_0204)
    {
      $context = [
        "info_plpk_pa_0204" => $info_plpk_pa_0204,
        "kewpa14" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_plpk0204.edit', $context);

    }




    public function update(Request $request, InfoPlpk_pa_0204 $info_plpk_pa_0204)
    {
      $info_plpk_pa_0204->update($request->all());
      return redirect('/plpk_pa_0204/'.$info_plpk_pa_0204->plpk04_id.'/edit');

    }

    public function destroy(InfoPlpk_pa_0204 $info_plpk_pa_0204)
    {
      return $info_plpk_pa_0204->delete();
    }



}
