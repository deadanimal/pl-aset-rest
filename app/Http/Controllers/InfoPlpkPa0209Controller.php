<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0209;
use Illuminate\Http\Request;
use App\Models\Kewpa3A;
use App\Models\User;

class InfoPlpkPa0209Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0209::all();
    }

    public function store(Request $request)
    {
      InfoPlpk_pa_0209::create($request->all());
      return redirect('/plpk_pa_0209/'.$request->plpk09_id.'/edit');
 
    }

    public function show(InfoPlpk_pa_0209 $info_plpk_pa_0209)
    {
      return $info_plpk_pa_0209;
    }

    public function create() {

      $context = [
        "plpk_pa_0209" => \Session::get('plpk_pa_0209'),
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_plpk0209.create', $context);

    }


    public function edit(InfoPlpk_pa_0209 $info_plpk_pa_0209)
    {
      $context = [
        "info_plpk_pa_0209" => $info_plpk_pa_0209,
        "kewpa14" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_plpk0209.edit', $context);

    }




    public function update(Request $request, InfoPlpk_pa_0209 $info_plpk_pa_0209)
    {
      $info_plpk_pa_0209->update($request->all());
      return redirect('/plpk_pa_0209/'.$info_plpk_pa_0209->plpk09_id.'/edit');

    }

    public function destroy(InfoPlpk_pa_0209 $info_plpk_pa_0209)
    {
      return $info_plpk_pa_0209->delete();
    }



}
