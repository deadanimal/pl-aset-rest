<?php
namespace App\Http\Controllers;

use App\Http\Controllers\InfoKewatk10Controller;

use App\Models\Kewatk10;
use App\Models\Kewatk9;
use Illuminate\Http\Request;
use App\Models\InfoKewatk10;
use Illuminate\Support\Facades\Http;

use Exception;
use PDF;

class Kewatk10Controller extends Controller
{

    public function index()
    {
      return view('modul.aset_tak_ketara.kewatk10.index');
    }


    public function store($tahun)
    {
      $kewatk10 = new Kewatk10;
      $kewatk10->tahun=$tahun;
      $kewatk10->agensi="Perbadanan Labuan";
      $kewatk10->save();
      return $kewatk10;
    }

    public function show(Request $request, $tahun)
    {
      $kewatk10 = Kewatk10::where('tahun', $tahun)->first();
      if ($kewatk10 === null) {
        $kewatk10 = $this->store($tahun);
      }

      $info_kewatk10 = (new InfoKewatk10Controller)->store($tahun, $kewatk10->id);
      return $info_kewatk10;


    }


    public function update(Request $request, Kewatk10 $kewatk10)
    {

      $kewatk10->tahun=$request->tahun;
      $kewatk10->agensi=$request->agensi;
      $kewatk10->staff_id=$request->staff_id;

      $kewatk10->save();

      return $kewatk10;
    }

    public function destroy(Kewatk10 $kewatk10)
    {

      return $kewatk10->delete();
    }

    public function generatePdf(Request $request, $tahun) {
      $info_kewatk10 = InfoKewatk10::where('tahun_semasa', $tahun)->first();
      $response = Http::post('http://127.0.0.1:8001/cetak/atk10', [$info_kewatk10]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url
      ];

      return view('modul.borang_viewer', $context);


    }



}
