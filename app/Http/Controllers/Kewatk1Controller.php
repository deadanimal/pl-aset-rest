<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk1;
use App\Models\Kewatk1;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class Kewatk1Controller extends Controller
{
    public function index()
    {
        $kewatk1 = Kewatk1::all();
        $context = [
            "kewatk1" => $kewatk1,
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
        $kewatk1->pegawai_penerima = $request->user()->name;
        $kewatk1->pegawai_pakar = $request->pegawai_pakar;
        $kewatk1->status = "DRAFT";

        $kewatk1->save();

        return redirect('/kewatk1');

    }

    public function show(Kewatk1 $kewatk1)
    {
        $info_kewatk1 = InfoKewatk1::where('no_rujukan', $kewatk1->id)->get();
        $context = [
            "info_kewatk1" => $info_kewatk1,
            "rujukan_kewatk1" => $kewatk1->id,
        ];
        return view('modul.aset_tak_ketara.kewatk1.info_kewatk1', $context);

    }

    public function update(Request $request, Kewatk1 $kewatk1)
    {
        $kewatk1->nama_pembekal = $request->nama_pembekal;
        $kewatk1->alamat_pembekal = $request->alamat_pembekal;
        $kewatk1->jenis_penerimaan = $request->jenis_penerimaan;
        $kewatk1->no_pk = $request->no_pk;
        $kewatk1->tarikh_pk = $request->tarikh_pk;
        $kewatk1->no_do = $request->no_do;
        $kewatk1->tarikh_do = $request->tarikh_do;
        $kewatk1->maklumat_pengangkutan = $request->maklumat_pengangkutan;
        $kewatk1->pegawai_pakar = $request->pegawai_pakar;
        $kewatk1->status = $request->status;

        $kewatk1->save();

        return redirect('/kewatk1');

    }

    public function destroy(Kewatk1 $kewatk1)
    {
        $kewatk1->delete();
        return redirect('/kewatk1');
    }

    public function generatePdf(Request $request, Kewatk1 $kewatk1)
    {

        $info_kewatk1 = InfoKewatk1::where('no_rujukan', $kewatk1->id)->get();
        $pegawai_penerima = User::where('name', $kewatk1->pegawai_penerima)->first();

        $pdf = PDF::loadView('modul.aset_tak_ketara.kewatk1.kewatk1_template', [
            'kewatk1' => $kewatk1,
            'info_kewatk1' => $info_kewatk1,
            'pegawai_penerima' => $pegawai_penerima,

        ])->setPaper('a4', 'landscape');

      $context = [
        "url" => "/kewatk1.pdf",
        "title" => "kewatk",
      ];

      return view('modul.borang_viewer_atk', $context);

    }
}
