<?php

namespace App\Http\Controllers;

use App\Models\Kewatk25;
use App\Models\Kewatk23;
use App\Models\User;
use Illuminate\Http\Request;

class Kewatk25Controller extends Controller
{
    public function index()
    {
      $context = [
        "kewatk25" => Kewatk25::all(),
        "kewatk23" => Kewatk23::all(),
        "users" => User::all(),
      ];

      return view('modul.aset_tak_ketara.kewatk25.index', $context);

    }


    public function store(Request $request)
    {
      Kewatk25::create($request->all());
      return redirect('/kewatk25');
    }

    public function show(Kewatk25 $kewatk25)
    {

      return $kewatk25;
    }


    public function update(Request $request, Kewatk25 $kewatk25)
    {
      $kewatk25->update($request->all());

      return redirect('/kewatk25');

    }

    public function destroy(Kewatk25 $kewatk25)
    {
      return $kewatk25->delete();
    }

    public function generatePdf(Request $request, Kewatk25 $kewatk25) {
      # TO DO : add logic to group the data by quarter 

      $data = Kewatk25::
      join('kewatk3as','kewatk25s.no_siri_pendaftaran', '=', 'kewatk3as.no_siri_pendaftaran')
      ->where('kewatk25s.id', $kewatk25->id)
      ->select('kewatk3as.*', 'kewatk25s.*')
      ->first();

      //additional information
      $data->pelapor = "created_by";
      $data->pelapor = "jawatan";

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk25', [$data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk25",
      ];

      return view('modul.borang_viewer_atk', $context);


    }


}
