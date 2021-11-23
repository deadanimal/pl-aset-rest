<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3a;
use App\Models\Kewatk1;
use App\Models\Kewatk3aPenempatan;
use App\Models\KodLokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class Kewatk3aController extends Controller
{
    public function index()
    {
      $kewatk3a = Kewatk3a::all();
      $kewatk1 = Kewatk1::all();
      $lokasi = KodLokasi::all();

      $context = [
        "lokasi" => $lokasi,
        "kewatk1" => $kewatk1,
        "kewatk3a" => $kewatk3a,

      ];

      return view('modul.aset_tak_ketara.kewatk3.index', $context);

    }

    public function store(Request $request)
    {

      // No siri pendaftarann
      $no_sekarang = sprintf("%'.05d\n", count(Kewatk3a::all()));
      
      $tahun_ini = substr(date("Y"), -2);
      
      $no_siri_pendaftaran = array("PL", "KPE", "SSH", "HI", $tahun_ini, $no_sekarang);
      $no_siri_pendaftaran = implode(" /",$no_siri_pendaftaran);
      $no_siri_pendaftaran = trim(preg_replace('/\s\s+/', ' ', $no_siri_pendaftaran));

      // kewakt3a
      $kewatk3a = new Kewatk3a;
      $kewatk3a->agensi=$request->agensi;
      $kewatk3a->bahagian=$request->bahagian;
      $kewatk3a->kod_nasional=$request->kod_nasional;
      $kewatk3a->kategori=$request->kategori;
      $kewatk3a->sub_kategori=$request->sub_kategori;
      $kewatk3a->status_selenggara=$request->status_selenggara;
      $kewatk3a->tempoh_selenggara=$request->tempoh_selenggara;
      $kewatk3a->jenis=$request->jenis;
      $kewatk3a->rajuk=$request->rajuk;
      $kewatk3a->nombor_dalam_negara=$request->nombor_dalam_negara;
      $kewatk3a->nombor_luar_negara=$request->nombor_luar_negara;
      $kewatk3a->tarikh_lulus_luput_dalam=$request->tarikh_lulus_luput_dalam;
      $kewatk3a->tarikh_lulus_luput_luar=$request->tarikh_lulus_luput_luar;
      $kewatk3a->tarikh_permohonan_dalam=$request->tarikh_permohonan_dalam;
      $kewatk3a->tarikh_permohonan_luar=$request->tarikh_permohonan_luar;
      $kewatk3a->tarikh_cipta_dalam=$request->tarikh_cipta_dalam;
      $kewatk3a->usia_guna=$request->usia_guna;
      $kewatk3a->spesifikasi=$request->spesifikasi;
      $kewatk3a->harga_perolehan_asal=$request->harga_perolehan_asal;
      $kewatk3a->tarikh_dibeli=$request->tarikh_dibeli;
      $kewatk3a->no_pesanan=$request->no_pesanan;
      $kewatk3a->tempoh_jaminan=$request->tempoh_jaminan;
      $kewatk3a->cara_aset_diperolehi=$request->cara_aset_diperolehi;
      $kewatk3a->nama_pembekal=$request->nama_pembekal;
      $kewatk3a->alamat_pembekal=$request->alamat_pembekal;
      $kewatk3a->created_date=$request->created_date;
      $kewatk3a->modified_date=$request->modified_date;
      $kewatk3a->staff_id=$request->user()->name;
      $kewatk3a->status="DERAF";
      $kewatk3a->ketua_jabatan=$request->ketua_jabatan;      
      $kewatk3a->no_siri_pendaftaran=$no_siri_pendaftaran;      
      $kewatk3a -> save();

      // penempatan  
      //$penempatan = new kewatk3apenempatan; 
      //$penempatan->kewatk3a_id=$kewatk3a->id;
      //$penempatan->lokasi=$request->lokasi;
      //$penempatan->medium_storan=$request->medium_storan;
      //$penempatan->nama_pegawai=$request->user()->name;
      //$penempatan->save();
      
      return redirect('/kewatk3a');
      
    }

    public function show(Kewatk3a $kewatk3a)
    {
      return $kewatk3a;
    }

    public function update(Request $request, Kewatk3a $kewatk3a)
    {
      $kewatk3a->update($request->all());
      return redirect('/kewatk3a');

    }

    public function destroy(Kewatk3a $kewatk3a)
    {
      return $kewatk3a->delete();
    }

    public function generatePdf(Request $request, Kewatk3a $kewatk3) {

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk3a', [$kewatk3]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewatk3a"
      ];

      return view('modul.borang_viewer_atk', $context);



    }


}
