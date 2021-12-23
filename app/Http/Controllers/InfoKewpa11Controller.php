<?php

namespace App\Http\Controllers;

use App\Models\InfoKewpa11;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;

class InfoKewpa11Controller extends Controller
{
    public function index()
    {
      return InfoKewpa11::all();
    }

    public function store(Request $request)
    {
      InfoKewpa11::create($request->all());
      return redirect('/kewpa11/'.$request->rujukan_kewpa11_id.'/edit');
 
    }

    public function show(InfoKewpa11 $info_kewpa11)
    {
      return $info_kewpa11;
    }

    public function create() {

      $context = [
        "kewpa11" => \Session::get('kewpa11'),
        "kewpa3a" => Kewpa3A::all(),
      ];
      
      return view('modul.aset_alih.info_kewpa11.create', $context);

    }


    public function edit(InfoKewpa11 $info_kewpa11)
    {
      $context = [
        "info_kewpa11" => $info_kewpa11,
        "kewpa3a" => Kewpa3A::all(),
      ];

      return view('modul.aset_alih.info_kewpa11.edit', $context);

    }




    public function update(Request $request, InfoKewpa11 $info_kewpa11)
    {
      $info_kewpa11->update($request->all());
      return redirect('/kewpa11/'.$info_kewpa11->rujukan_kewpa11_id.'/edit');

    }

    public function destroy(InfoKewpa11 $info_kewpa11)
    {
      return $info_kewpa11->delete();
    }



}
