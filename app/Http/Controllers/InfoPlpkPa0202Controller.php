<?php

namespace App\Http\Controllers;

use App\Models\Kewpa3A;
use App\Models\InfoPlpk_pa_0202;
use Illuminate\Http\Request;

class InfoPlpkPa0202Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0202::all();
    }

    public function store(Request $request)
    {
      InfoPlpk_pa_0202::create($request->all());
      return redirect('/plpk_pa_0202/'.$request->plpk_pa_0202_id.'/edit');
 
    }

    public function show(InfoPlpk_pa_0202 $info_plpk_pa_0202)
    {
      return $info_plpk_pa_0202;
    }

    public function create() {

      $context = [
        "plpk_pa_0202" => \Session::get('plpk_pa_0202'),
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_plpk0202.create', $context);

    }


    public function edit(InfoPlpk_pa_0202 $info_plpk_pa_0202)
    {
      $context = [
        "info_plpk_pa_0202" => $info_plpk_pa_0202,
        "kewpa14" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_plpk0202.edit', $context);

    }




    public function update(Request $request, InfoPlpk_pa_0202 $info_plpk_pa_0202)
    {
      $info_plpk_pa_0202->update($request->all());
      return redirect('/plpk_pa_0202/'.$info_plpk_pa_0202->plpk_pa_0202_id.'/edit');

    }

    public function destroy(InfoPlpk_pa_0202 $info_plpk_pa_0202)
    {
      return $info_plpk_pa_0202->delete();
    }



}
