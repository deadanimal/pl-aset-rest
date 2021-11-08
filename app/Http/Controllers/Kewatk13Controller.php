<?php

namespace App\Http\Controllers;


use App\Models\Kewatk3a;
use App\Models\Kewatk13;
use App\Models\InfoKewatk13;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class Kewatk13Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kewatk3a = Kewatk3a::all();
      $kewatk13 = InfoKewatk13::all();
      $context = [
        "kewatk3a" => $kewatk3a,
        "kewatk13" => $kewatk13,
      ];

      return view('modul.aset_tak_ketara.kewatk13.index', $context);
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

      $info_kewatk13 = new InfoKewatk13; 
      $info_kewatk13->tarikh=$request->tarikh;
      $info_kewatk13->jenis_penyelenggaraan=$request->jenis_penyelenggaraan;
      $info_kewatk13->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk13->butir_kerja=$request->butir_kerja;
      $info_kewatk13->syarikat_penyelenggara=$request->syarikat_penyelenggara;
      $info_kewatk13->kos=$request->kos;
      $info_kewatk13->no_pesanan_kerajaan_dan_tarikh="lookup";
      $info_kewatk13->nama_dan_jawatan="lookup2";

      $info_kewatk13->save();
      return redirect('/kewatk13/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewatk13  $kewatk13
     * @return \Illuminate\Http\Response
     */
    public function show(Kewatk13 $kewatk13)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewatk13  $kewatk13
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewatk13 $kewatk13)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewatk13  $kewatk13
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ik13)
    {
      $info_kewatk13 = InfoKewatk13::where('id', $id_ik13)->first();
      $info_kewatk13->tarikh=$request->tarikh;
      $info_kewatk13->jenis_penyelenggaraan=$request->jenis_penyelenggaraan;
      $info_kewatk13->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $info_kewatk13->butir_kerja=$request->butir_kerja;
      $info_kewatk13->syarikat_penyelenggara=$request->syarikat_penyelenggara;
      $info_kewatk13->kos=$request->kos;
      $info_kewatk13->no_pesanan_kerajaan_dan_tarikh="lookup";
      $info_kewatk13->nama_dan_jawatan="lookup2";

      $info_kewatk13->save();
      return redirect('/kewatk13/');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewatk13  $kewatk13
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ik13)
    {
      $info_kewatk13 = InfoKewatk13::where('id', $id_ik13)->first();
      $info_kewatk13->delete();

      return redirect('/kewatk13/');
    }

    public function generatePdf(Request $request, $id_ik13) {

      $data = InfoKewatk13::
      join('kewatk3as','info_kewatk13s.no_siri_pendaftaran', '=', 'kewatk3as.no_siri_pendaftaran')
      ->where('info_kewatk13s.id', $id_ik13)
      ->select('kewatk3as.*', 'info_kewatk13s.*')
      ->first();


      $response = Http::post('http://127.0.0.1:8001/cetak/atk13', [$data]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url
      ];

      return view('modul.borang_viewer', $context);


    }

}
