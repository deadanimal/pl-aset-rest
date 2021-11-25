<?php

namespace App\Http\Controllers;


use App\Models\Kewatk14;
use App\Models\InfoKewatk13;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewatk14Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('modul.aset_tak_ketara.kewatk14.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewatk14  $kewatk14
     * @return \Illuminate\Http\Response
     */
    public function show(Kewatk14 $kewatk14)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewatk14  $kewatk14
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewatk14 $kewatk14)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewatk14  $kewatk14
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewatk14 $kewatk14)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewatk14  $kewatk14
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewatk14 $kewatk14)
    {
        //
    }

    public function generatePdf(Request $request, $tahun) {
      # TO DO : add logic to group the data by quarter 

      $data = [];
      $rekod_selenggara = InfoKewatk13::whereYear('created_at',$tahun)->get();

      $kuantiti_hi = 0;
      $kuantiti_hbi = 0;
      $kos_hi = 0;
      $kos_hbi = 0;

      foreach($rekod_selenggara as $rekod) {

        if (strpos($rekod->no_siri_pendaftaran, 'HI') !== false) {
          $kuantiti_hi = $kuantiti_hi + 1;
          $kos_hi = $kos_hi + $rekod->kos;
        }   

        if (strpos($rekod->no_siri_pendaftaran, 'HBI') !== false) {
          $kuantiti_hbi = $kuantiti_hbi + 1;
          $kos_hbi = $kos_hbi + $rekod->kos;
        }  
      }

      $kuantiti_total = $kuantiti_hi + $kuantiti_hbi;
      $kos_total = $kos_hi + $kos_hbi;

      $data = [
        "kuantiti_hi" => $kuantiti_hi,
        "kos_hi" => $kos_hi,
        "kuantiti_hbi" => $kuantiti_hbi,
        "kos_hbi" => $kos_hbi,
        "kuantiti_total" => $kos_total,
        "kos_total" => $kos_total,
        "tahun" => $tahun,
        "agensi" => "Perbadanan Labuan"
      ];


      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk14', [$data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk14",
      ];

      return view('modul.borang_viewer_atk', $context);


    }

}
