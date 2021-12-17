<?php

namespace App\Http\Controllers;

use App\Models\InfoPlpk_pa_0208;
use Illuminate\Http\Request;
use App\Models\Kewpa3A;
use App\Models\User;

class InfoPlpkPa0208Controller extends Controller
{
    public function index()
    {
      return InfoPlpk_pa_0208::all();
    }

    public function store(Request $request)
    {
      InfoPlpk_pa_0208::create($request->all());
      return redirect('/plpk_pa_0208/'.$request->plpk08_id.'/edit');
 
    }

    public function show(InfoPlpk_pa_0208 $info_plpk_pa_0208)
    {
      return $info_plpk_pa_0208;
    }

    public function create() {

      $context = [
        "plpk_pa_0208" => \Session::get('plpk_pa_0208'),
        "kewpa14" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_plpk0208.create', $context);

    }


    public function edit(InfoPlpk_pa_0208 $info_plpk_pa_0208)
    {
      $context = [
        "info_plpk_pa_0208" => $info_plpk_pa_0208,
        "kewpa14" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_plpk0208.edit', $context);

    }




    public function update(Request $request, InfoPlpk_pa_0208 $info_plpk_pa_0208)
    {
      $info_plpk_pa_0208->update($request->all());
      return redirect('/plpk_pa_0208/'.$info_plpk_pa_0208->plpk08_id.'/edit');

    }

    public function destroy(InfoPlpk_pa_0208 $info_plpk_pa_0208)
    {
      return $info_plpk_pa_0208->delete();
    }



}
