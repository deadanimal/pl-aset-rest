<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3a;
use App\Models\Kewatk19;
use App\Models\InfoKewatk19;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewatk19Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $context = [
        "kewatk3a" => Kewatk3a::all(),
        "kewatk19" => Kewatk19::all()
      ];

      return view('modul.aset_tak_ketara.kewatk19.index', $context);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $context = [];
      return view('modul.aset_tak_ketara.kewatk19.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $kewatk19 = new Kewatk19;
        $kewatk19->agensi = $request->agensi;
        $kewatk19->save();  

        foreach (range(0, count($request->no_siri_pendaftaran) - 1) as $i) {

          $info_kewatk19 = new InfoKewatk19;
          $info_kewatk19->keadaan_aset = $request->keadaan_aset[$i];
          $info_kewatk19->no_siri_pendaftaran = $request->no_siri_pendaftaran[$i];
          $info_kewatk19->kaedah_pelupusan = $request->kaedah_pelupusan[$i];
          $info_kewatk19->catatan = $request->catatan[$i];
          $info_kewatk19->justifikasi = $request->justifikasi[$i];
          $info_kewatk19->kewatk19_id = $kewatk19->id;
          $info_kewatk19->save();

        }

        return redirect('/kewatk19');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewatk19  $kewatk19
     * @return \Illuminate\Http\Response
     */
    public function show(Kewatk19 $kewatk19)
    {
      $context = [

        "kewatk19" => $kewatk19,
        "kewatk3a" => Kewatk3a::all(),
        "info_kewatk19" => InfoKewatk19::where('kewatk19_id', $kewatk19->id)->get()
      ];

      return view('modul.aset_tak_ketara.kewatk19.info_index', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewatk19  $kewatk19
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewatk19 $kewatk19)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewatk19  $kewatk19
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewatk19 $kewatk19)
    {
        $kewatk19->update($request->all());
        return redirect('/kewatk19/'.$kewatk19->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewatk19  $kewatk19
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewatk19 $kewatk19)
    {
        //
      return $kewatk19->delete();
    }


    public function generatePdf(Kewatk19 $kewatk19) {

      $kewatk19->jumlah_hpa = 0;

      foreach($kewatk19->info_kewatk19 as $ik19) {
        $kewatk19->jumlah_hpa = $kewatk19->jumlah_hpa + $ik19->kewatk3a->harga_perolehan_asal;
      }


      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk19', [$kewatk19]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa19",
      ];

      return view('modul.borang_viewer_atk', $context);



    }
}
