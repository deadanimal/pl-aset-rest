<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3a;
use Illuminate\Http\Request;

class Kewatk3aController extends Controller
{
    public function index()
    {
      return Kewatk3a::all();
    }

    public function store(Request $request)
    {
      $kewatk3a = new Kewatk3a;
      $kewatk3a->agensi=$request->agensi;
      $kewatk3a->bahagian=$request->bahagian;
      $kewatk3a->kod_nasional=$request->kod_nasional;
      $kewatk3a->kategori=$request->kategori;
      $kewatk3a->sub_kategori=$request->sub_kategori;
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
      $kewatk3a->nama_pembekal=$request->nama_pembekal;
      $kewatk3a->alamat_pembekal=$request->alamat_pembekal;
      $kewatk3a->created_date=$request->created_date;
      $kewatk3a->modified_date=$request->modified_date;
      $kewatk3a->staff_id=$request->staff_id;
      $kewatk3a->ketua_jabatan=$request->ketua_jabatan;      
      $kewatk3a -> save();


      return $kewatk3a;

      
    }

    public function show(Kewatk3a $kewatk3a)
    {
      return $kewatk3a;
    }

    public function update(Request $request, Kewatk3a $kewatk3a)
    {
      $kewatk3a->agensi=$request->agensi;
      $kewatk3a->bahagian=$request->bahagian;
      $kewatk3a->kod_nasional=$request->kod_nasional;
      $kewatk3a->kategori=$request->kategori;
      $kewatk3a->sub_kategori=$request->sub_kategori;
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
      $kewatk3a->nama_pembekal=$request->nama_pembekal;
      $kewatk3a->alamat_pembekal=$request->alamat_pembekal;
      $kewatk3a->created_date=$request->created_date;
      $kewatk3a->modified_date=$request->modified_date;
      $kewatk3a->staff_id=$request->staff_id;
      $kewatk3a->ketua_jabatan=$request->ketua_jabatan;      

      $kewatk3a -> save();


      return $kewatk3a;

    }

    public function destroy(Kewatk3a $kewatk3a)
    {
      return $kewatk3a->delete();
    }

}
