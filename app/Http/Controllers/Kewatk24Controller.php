<?php

namespace App\Http\Controllers;

use App\Models\Kewatk24;
use App\Models\Kewatk23;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewatk24Controller extends Controller
{
    public function index()
    {

      $kewatk24 = Kewatk24::
      join('users','kewatk24s.pegawai_pengawal', '=', 'users.id')
      ->select('users.*', 'kewatk24s.*')
      ->get();


      $context = [
        "users" => User::all(),
        "kewatk24" => $kewatk24,
        "kewatk23" => Kewatk23::all(),
      ];

      return view('modul.aset_tak_ketara.kewatk24.index', $context);


    }


    public function store(Request $request)
    {
      $kewatk24 = new Kewatk24;
      $kewatk24->agensi=$request->agensi;
      $kewatk24->tarikh_pulang=$request->tarikh_pulang;
      $kewatk24->staff_id=$request->user()->id;
      $kewatk24->kewatk23_id=$request->kewatk23_id;
      $kewatk24->pegawai_pengawal=$request->pegawai_pengawal;      
      $kewatk24->save();

      return redirect('/kewatk24');
    }

    public function show(Kewatk24 $kewatk24)
    {

      return $kewatk24;
    }


    public function update(Request $request, Kewatk24 $kewatk24)
    {

      $kewatk24->agensi=$request->agensi;
      $kewatk24->tarikh_pulang=$request->tarikh_pulang;
      $kewatk24->kewatk23_id=$request->kewatk24_id;
      $kewatk24->pegawai_pengawal=$request->pegawai_pengawal;      
      $kewatk24->save();

      return redirect('/kewatk24');

    }

    public function destroy(Kewatk24 $kewatk24)
    {

      return $kewatk24->delete();
    }

    public function generatePdf(Request $request, Kewatk24 $kewatk24) {
      $data = Kewatk24::

      join('users', 'kewatk24s.pegawai_pengawal', '=', 'users.id')
      ->where('kewatk24s.id', $kewatk24->id)
      ->select('users.*', 'kewatk24s.*')
      ->first();

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk24', [$data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk24",
      ];

      return view('modul.borang_viewer_atk', $context);


    }


}
