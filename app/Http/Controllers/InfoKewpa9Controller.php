<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa9;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;

class InfoKewpa9Controller extends Controller
{
     public function index()
    {
      return InfoKewpa9::all();
    }

    public function store(Request $request)
    {
      InfoKewpa9::create($request->all());
      return redirect('/kewpa9/'.$request->kewpa9_id.'/edit');

      
    }

    public function show(InfoKewpa9 $info_kewpa9)
    {
      return $info_kewpa9;
    }

    public function create() {

      $context = [
        "kewpa9" => \Session::get('kewpa9'),
        "kewpa3a" => Kewpa3A::all(),
      ];
      return view('modul.aset_alih.info_kewpa9.create', $context);

    }

    public function edit(InfoKewpa9 $info_kewpa9)
    {
      $context = [
        "info_kewpa9" => $info_kewpa9,
        "kewpa3a" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_kewpa9.edit', $context);

    }


    public function update(Request $request, InfoKewpa9 $info_kewpa9)
    {


      $info_kewpa9->update($request->all());
      return redirect('/kewpa9/'.$info_kewpa9->kewpa9_id.'/edit');

    }

    public function destroy(InfoKewpa9 $info_kewpa9)
    {
      $kewpa9_id = $info_kewpa9->id;
      $info_kewpa9->delete();
      return redirect('/kewpa9/'.$kewpa9_id.'/edit');
    }



}
