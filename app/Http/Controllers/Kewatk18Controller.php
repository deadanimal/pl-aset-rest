<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kewatk18;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewatk18Controller extends Controller
{
    public function index()
    {
      $pegawai = User::all();

      $kewatk18 = Kewatk18::all();
      foreach($kewatk18 as $k18) {
        $k18->nama_pegawai = User::where('id', $k18->pegawai)->first()->name;
      }

      $context = [
        "kewatk18" => $kewatk18,
        "pegawai" => $pegawai,
      ];

      return view('modul.aset_tak_ketara.kewatk18.index', $context);
    }


    public function store(Request $request)
    {
      $kewatk18 = new Kewatk18;

      $pegawai = User::where('id', $request->pegawai)->first();

      $kewatk18->tempoh=$request->tempoh;
      $kewatk18->pegawai=$pegawai->id;
      $kewatk18->tarikh_mula=$request->tarikh_mula;
      $kewatk18->tarikh_tamat=$request->tarikh_tamat;
      $kewatk18->created_by=$request->user()->id;
      $kewatk18->save();

      return redirect('/kewatk18');
    }

    public function show(Kewatk18 $kewatk18)
    {

      return $kewatk18;
    }


    public function update(Request $request, Kewatk18 $kewatk18)
    {
      $pegawai = User::where('id', $request->pegawai)->first();

      $kewatk18->tempoh=$request->tempoh;
      $kewatk18->pegawai=$pegawai->id;
      $kewatk18->tarikh_mula=$request->tarikh_mula;
      $kewatk18->tarikh_tamat=$request->tarikh_tamat;
      $kewatk18->created_by=$request->created_by;
      $kewatk18->save();



      $kewatk18->save();


      return redirect('/kewatk18');

    }

    public function destroy(Kewatk18 $kewatk18)
    {

      return $kewatk18->delete();
    }

    public function generatePdf(Request $request, Kewatk18 $kewatk18) {

      $kewatk18->created_by = User::where('id', $kewatk18->created_by)->first()->name;
      $kewatk18->nama_pegawai = User::where('id', $kewatk18->pegawai)->first()->name;
      $kewatk18->tarikh = "20-11-2021" ;

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk18', [$kewatk18]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title"=> "Kewatk18"
      ];

      return view('modul.borang_viewer_atk', $context);


    }
}
