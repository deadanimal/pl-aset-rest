<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk1;
use App\Models\Kewatk1;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class Kewatk1Controller extends Controller
{
    public function index()
    {
        $kewatk1 = Kewatk1::all();
        $users = User::all();
        $context = [
            "kewatk1" => $kewatk1,
            "users" => $users,
        ];

        return view('modul.aset_tak_ketara.kewatk1.index', $context);
    }

    public function store(Request $request)
    {
        $kewatk1 = new Kewatk1;
        $kewatk1->nama_pembekal = $request->nama_pembekal;
        $kewatk1->alamat_pembekal = $request->alamat_pembekal;
        $kewatk1->jenis_penerimaan = $request->jenis_penerimaan;
        $kewatk1->no_pk = $request->no_pk;
        $kewatk1->tarikh_pk = $request->tarikh_pk;
        $kewatk1->no_do = $request->no_do;
        $kewatk1->tarikh_do = $request->tarikh_do;
        $kewatk1->maklumat_pengangkutan = $request->maklumat_pengangkutan;
        $kewatk1->pegawai_penerima = $request->user()->id;
        $kewatk1->pegawai_pakar = $request->pegawai_pakar;
        $kewatk1->status = "DERAF";

        $kewatk1->save();

        foreach (range(0, count($request->keterangan_aset) - 1) as $i) {

          $info_kewatk1 = new InfoKewatk1;
          $info_kewatk1->keterangan_aset=$request->keterangan_aset[$i];
          $info_kewatk1->medium=$request->medium[$i];
          $info_kewatk1->kuantiti_dipesan=$request->kuantiti_dipesan[$i];
          $info_kewatk1->kuantiti_do=$request->kuantiti_do[$i];
          $info_kewatk1->kuantiti_diterima=$request->kuantiti_diterima[$i];
          $info_kewatk1->catatan=$request->catatan[$i];
          $info_kewatk1->no_kod=$request->no_kod[$i];
          $info_kewatk1->no_rujukan=$kewatk1->id;      
          $info_kewatk1->save();

        }


        return redirect('/kewatk1');

    }

    public function show(Kewatk1 $kewatk1)
    {
        $info_kewatk1 = InfoKewatk1::where('no_rujukan', $kewatk1->id)->get();
        $context = [
            "users" => User::all(),
            "info_kewatk1" => $info_kewatk1,
            "rujukan_kewatk1" => $kewatk1->id,
            "kewatk1" => $kewatk1,
        ];
        return view('modul.aset_tak_ketara.kewatk1.info_kewatk1', $context);

    }

    public function update(Request $request, Kewatk1 $kewatk1)
    {
        $kewatk1->update($request->all());
        
        return redirect('/kewatk1/'.$kewatk1->id);

    }

    public function destroy(Kewatk1 $kewatk1)
    {
        $kewatk1->delete();
        return redirect('/kewatk1');
    }

    public function generatePdf(Request $request, Kewatk1 $kewatk1)
    {

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk1', [$kewatk1]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk1"
      ];

      return view('modul.borang_viewer_atk', $context);



    }
}
