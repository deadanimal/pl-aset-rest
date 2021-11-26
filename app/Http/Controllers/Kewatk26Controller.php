<?php

namespace App\Http\Controllers;

use App\Models\Kewatk26;
use App\Models\User;
use App\Models\Kewatk3a;
use Illuminate\Http\Request;

class Kewatk26Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewatk3a" => Kewatk3a::all(),
        "kewatk26" => Kewatk26::all(),
        "users" => User::all(),
      ];

      return view('modul.aset_tak_ketara.kewatk26.index', $context);

    }


    public function store(Request $request)
    {
      $kewatk26 = new Kewatk26;
      Kewatk26::create($request->all());
     
      return redirect('/kewatk26');
    }

    public function show(Kewatk26 $kewatk26)
    {

      return $kewatk26;
    }


    public function update(Request $request, Kewatk26 $kewatk26)
    {

      $kewatk26->update($request->all());

      return redirect('/kewatk26');

    }

    public function destroy(Kewatk26 $kewatk26)
    {

      return $kewatk26->delete();
    }

    public function generatePdf(Request $request, Kewatk26 $kewatk26) {
      # TO DO : add logic to group the data by quarter 

      $data = Kewatk26::
      join('kewatk3as','kewatk26s.no_siri_pendaftaran', '=', 'kewatk3as.no_siri_pendaftaran')
      ->where('kewatk26s.id', $kewatk26->id)
      ->select('kewatk3as.*', 'kewatk26s.*')
      ->first();

      //additional information
      $data->pelapor = "created_by";
      $data->pelapor = "jawatan";

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk26', [$data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk26",
      ];

      return view('modul.borang_viewer_atk', $context);


    }


}
