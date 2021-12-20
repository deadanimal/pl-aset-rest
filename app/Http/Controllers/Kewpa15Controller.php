<?php

namespace App\Http\Controllers;

use App\Models\Kewpa15;
use App\Models\InfoKewpa15;
use App\Models\Kewpa3A;
use App\Models\KodJabatan;
use App\Models\User;
use Illuminate\Http\Request;

class Kewpa15Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewpa15" => Kewpa15::all(),
      ];


      return view('modul.aset_alih.kewpa15.index', $context);

    }

    public function create(Request $request) {
      $context = [
        "jabatan" => KodJabatan::all(),
        "kewpa3a" => Kewpa3A::all(),
        "pegawai" => User::all(),
      ];

      return view('modul.aset_alih.kewpa15.create', $context);
    }

    public function edit(Request $request, Kewpa15 $kewpa15) {

      $context = [
        "kewpa3a" => Kewpa3A::all(),
        "kewpa15" => $kewpa15
      ];

      \Session::put('kewpa15', $kewpa15);

      return view('modul.aset_alih.kewpa15.edit', $context);

    }

    public function store(Request $request)
    {
      
      $request['status']="DERAF";
      $kewpa15 = Kewpa15::create($request->all());
      $kewpa15->save();

      foreach (range(0, count($request->tarikh) - 1) as $i) {

          $info_kewpa15 = new InfoKewpa15;
          $info_kewpa15->tarikh=$request->tarikh[$i];
          $info_kewpa15->jenis_penyelenggaraan=$request->jenis_penyelenggaraan[$i];
          $info_kewpa15->butir_kerja=$request->butir_kerja[$i];
          $info_kewpa15->nama_syarikat=$request->nama_syarikat[$i];
          $info_kewpa15->kos=$request->kos[$i];      
          //$info_kewpa15->pegawai_pengesah=$request->pegawai_pengesah[$i];      
          $info_kewpa15->kewpa15_id=$kewpa15->id;      
          $info_kewpa15->save();

        }

      return redirect('/kewpa15');
    }

    public function show(Kewpa15 $kewpa15)
    {
      return $kewpa15;
    }

    public function update(Request $request, Kewpa15 $kewpa15)
    {
      $kewpa15->update($request->all());
      return redirect('/kewpa15/'.$kewpa15->id.'/edit');


    }

    public function destroy(Kewpa15 $kewpa15)
    {
      return $kewpa15->delete();
    }
}
