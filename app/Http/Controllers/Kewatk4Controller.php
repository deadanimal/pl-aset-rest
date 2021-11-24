<?php

namespace App\Http\Controllers;

use App\Models\Kewatk4;
use App\Models\User;
use App\Models\InfoKewatk4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class Kewatk4Controller extends Controller { public function index()
    {
      $kewatk4 = Kewatk4::all();
      $users = User::all();
      $context = [
        "kewatk4" => $kewatk4,
        "users" => $users,
      ];

      return view('modul.aset_tak_ketara.kewatk4.index', $context);
    }

    public function store(Request $request)
    {

      $kewatk4 = new Kewatk4;
      $kewatk4->agensi=$request->agensi;
      $kewatk4->bahagian=$request->bahagian;
      $kewatk4->kategori=$request->kategori;
      $kewatk4->sub_kategori=$request->sub_kategori;
      $kewatk4->staff_id=$request->user()->name;
      $kewatk4->status= "DERAF";
      $kewatk4 -> save();

      $info_kewatk4_jenis=$request->jenis;
      $info_kewatk4_tajuk=$request->tajuk;
      $info_kewatk4_no_pesanan=$request->no_pesanan;
      $info_kewatk4_tarikh_terima=$request->tarikh_terima;
      $info_kewatk4_kuantiti=$request->kuantiti;
      $info_kewatk4_harga=$request->harga;
      $info_kewatk4_tempoh_dari=$request->tempoh_dari;
      $info_kewatk4_tempoh_hingga=$request->tempoh_hingga;
      $info_kewatk4_catatan=$request->catatan;
      $info_kewatk4_pegawai_penempatan=$request->pegawai_penempatan;

      foreach(range(0, count($info_kewatk4_jenis)-1) as $i) {
        $info_kewatk4 = new InfoKewatk4;

        $info_kewatk4->jenis=$info_kewatk4_jenis[$i];
        $info_kewatk4->tajuk=$info_kewatk4_tajuk[$i];

        $info_kewatk4->no_pesanan=$info_kewatk4_no_pesanan[$i];    
        $info_kewatk4->tarikh_terima=$info_kewatk4_tarikh_terima[$i];
        $info_kewatk4->kuantiti=$info_kewatk4_kuantiti[$i];
        $info_kewatk4->harga=$info_kewatk4_harga[$i];
        $info_kewatk4->tempoh_dari=$info_kewatk4_tempoh_dari[$i];
        $info_kewatk4->tempoh_hingga=$info_kewatk4_tempoh_hingga[$i];
        $info_kewatk4->catatan=$info_kewatk4_catatan[$i];
        $info_kewatk4->pegawai_penempatan=$info_kewatk4_pegawai_penempatan[$i];
        $info_kewatk4->kewatk4_id=$kewatk4->id;
        $info_kewatk4 -> save();


      }




      return redirect('/kewatk4');

      
    }

    public function show(Kewatk4 $kewatk4)
    {
      $info_kewatk4 = InfoKewatk4::where('kewatk4_id', $kewatk4->id)->get();
      $context = [
        "info_kewatk4" => $info_kewatk4,
        "kewatk4_id" => $kewatk4->id,
        "kewatk4" => $kewatk4
      ];
      return view('modul.aset_tak_ketara.kewatk4.info_kewatk4', $context);


    }

    public function update(Request $request, Kewatk4 $kewatk4)
    {
      $kewatk4->update($request->all());

      return redirect('/kewatk4/'.$kewatk4->id);

    }

    public function destroy(Kewatk4 $kewatk4)
    {
      return $kewatk4->delete();
    }

    public function generatePdf(Request $request, Kewatk4 $kewatk4) 
    {
      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk4', [$kewatk4]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk4"
      ];

      return view('modul.borang_viewer_atk', $context);


    }


}
