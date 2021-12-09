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
      return redirect('/kewpa11/'.$request->kewpa11_id.'/edit');
 
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

      $info_kewpa11->lokasi_sebenar=$request->lokasi_sebenar;
      $info_kewpa11->status_aset=$request->status_aset;
      $info_kewpa11->catatan=$request->catatan;
      $info_kewpa11->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewpa11->rujukan_kewpa11_id=$request->rujukan_kewpa11_id;      
      $info_kewpa11 -> save();

      return $info_kewpa11;

    }

    public function destroy(InfoKewpa11 $info_kewpa11)
    {
      return $info_kewpa11->delete();
    }



}
