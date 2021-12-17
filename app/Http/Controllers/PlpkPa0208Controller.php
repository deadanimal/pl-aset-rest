<?php

namespace App\Http\Controllers;

use App\Models\Plpk_pa_0208;
use App\Models\Kewpa3A;
use App\Models\InfoPlpk_pa_0208;
use App\Models\User;
use Illuminate\Http\Request;

class PlpkPa0208Controller extends Controller
{
    public function index()
    {
      $context = [
        "plpk_pa_0208" => Plpk_pa_0208::all(),
      ];

      return view('modul.aset_alih.plpk0208.index', $context);
    }

    public function store(Request $request)
    {
      
      $request['status'] = "DERAF";
      $plpkpa0208 = Plpk_pa_0208::create($request->all());
      $plpkpa0208->save();

      foreach (range(0, count($request->kewpa14_id) - 1) as $i) {

          $info_plpkpa0208 = new InfoPlpk_pa_0208;
          $info_plpkpa0208->butiran_pembaikan=$request->butiran_pembaikan[$i];
          $info_plpkpa0208->kewpa14_id=$request->kewpa14_id[$i];
          $info_plpkpa0208->plpk08_id=$plpkpa0208->id;
          $info_plpkpa0208->save();
        }

      return redirect('/plpk_pa_0208');

    }

    public function show(Plpk_pa_0208 $plpk_pa_0208)
    {
      return $plpk_pa_0208;
    }

    public function create(Plpk_pa_0208 $plpk_pa_0208)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "users" => User::all(),
      ];
      return view('modul.aset_alih.plpk0208.create', $context);

    }

    public function edit(Plpk_pa_0208 $plpk_pa_0208)
    {
      $context = [
        "kewpa14" => Kewpa3A::all(),
        "plpk_pa_0208" => $plpk_pa_0208,
        "users" => User::all(),
      ];

      \Session::put('plpk_pa_0208', $plpk_pa_0208);

      return view('modul.aset_alih.plpk0208.edit', $context);

    }


    public function update(Request $request, Plpk_pa_0208 $plpk_pa_0208)
    {
      $plpk_pa_0208->update($request->all());
      return redirect('/plpk_pa_0208/'.$plpk_pa_0208->id."/edit/");
    }

    public function destroy(Plpk_pa_0208 $plpk_pa_0208)
    {
      return $plpk_pa_0208->delete();
    }



}
