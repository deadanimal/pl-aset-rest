<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0206;
use Illuminate\Http\Request;
use App\Models\Kewpa3A;
use App\Models\User;

class InfoPlpkPa0206Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0206::all();
    }

    public function store(Request $request)
    {
      InfoPlpk_pa_0206::create($request->all());
      return redirect('/plpk_pa_0206/'.$request->plpk06_id.'/edit');
 
    }

    public function show(InfoPlpk_pa_0206 $info_plpk_pa_0206)
    {
      return $info_plpk_pa_0206;
    }

    public function create() {

      $context = [
        "plpk_pa_0206" => \Session::get('plpk_pa_0206'),
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_plpk0206.create', $context);

    }


    public function edit(InfoPlpk_pa_0206 $info_plpk_pa_0206)
    {
      $context = [
        "info_plpk_pa_0206" => $info_plpk_pa_0206,
        "kewpa14" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_plpk0206.edit', $context);

    }




    public function update(Request $request, InfoPlpk_pa_0206 $info_plpk_pa_0206)
    {
      $info_plpk_pa_0206->update($request->all());
      return redirect('/plpk_pa_0206/'.$info_plpk_pa_0206->plpk06_id.'/edit');

    }

    public function destroy(InfoPlpk_pa_0206 $info_plpk_pa_0206)
    {
      return $info_plpk_pa_0206->delete();
    }



}
