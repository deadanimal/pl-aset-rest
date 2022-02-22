<?php

namespace App\Http\Controllers;

use App\Models\Kewpa14;
use App\Models\Kewpa3A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Kewpa14Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewpa14" => Kewpa3A::where('status_selenggara', 'Perlu' )->get(),
      ];

      return view('modul.aset_alih.kewpa14.index', $context);

    }

    public function store(Request $request)
    {
      
    }

    public function create() {

      $context  = [
        "kewpa3a" => Kewpa3A::where('status_selenggara', 'Tidak Perlu')->get(),
      ];

      return view('modul.aset_alih.kewpa14.create', $context);
    
    }

    public function show(Kewpa14 $kewpa14)
    {
      return $kewpa14;
    }

    public function update(Request $request, $id)
    {
      $request->merge(['status_selenggara' => 'Perlu']);
      $kewpa3A = Kewpa3A::where('no_siri_pendaftaran', $request->no_siri_pendaftaran)->first();
      $kewpa3A->update($request->all());
      return redirect('/kewpa14');
    }

    public function destroy(Kewpa14 $kewpa14)
    {
      return $kewpa14->delete();
    }

    public function generatePdf() {

      $context = [
        "kewpa14" => Kewpa3A::where('status_selenggara', 'Perlu' )->get()
      ];
      
      $response = Http::post('https://libreoffice.prototype.com.my/cetak/kpa14', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa14",
      ];

      return view('modul.borang_viewer_pa', $context);



    }

}
