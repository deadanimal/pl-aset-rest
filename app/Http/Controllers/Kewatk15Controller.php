<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3a;
use App\Models\Kewatk15;
use App\Models\InfoKewatk15;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\InfoKewatk15Controller;

class Kewatk15Controller extends Controller {
    public function index()
    {

      $kewatk3a = Kewatk3a::all();
      $kewatk15 = Kewatk15::all();

      $context = [
        "kewatk3a" => $kewatk3a,
        "kewatk15" => $kewatk15,
      ];

      return view('modul.aset_tak_ketara.kewatk15.index', $context);

    }


    public function store(Request $request)
    {
      $kewatk15 = new Kewatk15;
      
      $kewatk15->status="DERAF";
      $kewatk15->pemohon=$request->user()->name;
      $kewatk15->penyerah=$request->user()->name;

      $kewatk15->save();
     
      $this->storeInfoKewatk15($request, $kewatk15->id);

      return redirect('/kewatk15');

    }

    public function show(Kewatk15 $kewatk15)
    {
      $info_kewatk15 = InfoKewatk15::where('kewatk15_id', $kewatk15->id)->get();
      $kewatk3a = Kewatk3a::all();

      $context = [
        "kewatk15" => $kewatk15,
        "kewatk3a" => $kewatk3a,
        "info_kewatk15" => $info_kewatk15,
      ];
return view('modul.aset_tak_ketara.kewatk15.edit', $context); }
    public function update(Request $request, Kewatk15 $kewatk15)
    {

      return redirect('/kewatk15');
    }

    public function destroy(Kewatk15 $kewatk15)
    {
      $kewatk15->delete();
      (new InfoKewatk15Controller)->destroy_related($kewatk15);
    }

    public function storeInfoKewatk15($request, $kewatk15_id)
    {

      foreach(range(0, count($request->no_siri_pendaftaran)-1) as $i) {
        $temp = new InfoKewatk15;
        $temp->no_siri_pendaftaran = $request->no_siri_pendaftaran[$i];
        $temp->catatan = $request->catatan[$i];
        $temp->jenis_pindahan = $request->jenis_pindahan[$i];
        $temp->kewatk15_id = $kewatk15_id;
        $temp->save();

      }

    }

    public function generatePdf(Request $request, Kewatk15 $kewatk15) {

      $kewatk15->data = InfoKewatk15::where('kewatk15_id', $kewatk15->id)->get(); 
      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk15', [$kewatk15]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk15"
      ];

      return view('modul.borang_viewer_atk', $context);


    }

}
