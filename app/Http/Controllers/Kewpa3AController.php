<?php

namespace App\Http\Controllers;

use App\Models\Kewpa3A;
use Illuminate\Http\Request;

class Kewpa3AController extends Controller
{
    public function index()
    {
      return Kewpa3A::all();
    }

    public function store(Request $request)
    {
      $kewpa3a = new Kewpa3A; 
      $kewpa3a -> no_siri_pendaftaran = $request -> no_siri_pendaftaran;
      $kewpa3a -> jenis_aset = $request -> jenis_aset;
      $kewpa3a -> agensi = $request -> agensi;
      $kewpa3a -> bahagian = $request -> bahagian;
      $kewpa3a -> kod_nasional = $request -> kod_nasional;
      $kewpa3a -> keterangan_aset = $request -> keterangan_aset;
      $kewpa3a -> kategori = $request -> kategori;
      $kewpa3a -> sub_kategori = $request -> sub_kategori;

      $kewpa3a -> jenis = $request -> jenis;
      $kewpa3a -> buatan = $request -> buatan;
      $kewpa3a -> jenis_enjin = $request -> jenis_enjin;
      $kewpa3a -> no_enjin = $request -> no_enjin;
      $kewpa3a -> no_casis = $request -> no_casis;
      $kewpa3a -> no_pendaftaraan_kenderaan = $request -> no_pendaftaraan_kenderaan;
      $kewpa3a -> catatan_spesifikasi = $request -> catatan_spesifikasi;
      $kewpa3a -> harga_perolehan_asal = $request -> harga_perolehan_asal;
      $kewpa3a -> tarikh_perolehan = $request -> tarikh_perolehan;
      $kewpa3a -> tarikh_diterima = $request -> tarikh_diterima;
      $kewpa3a -> no_pesanan_rasmi = $request -> no_pesanan_rasmi;
      $kewpa3a -> tempoh_jaminan = $request -> tempoh_jaminan;
      $kewpa3a -> nama_pembekal = $request -> nama_pembekal;
      $kewpa3a -> alamat_pembekal = $request -> alamat_pembekal;
      $kewpa3a -> lokasi_penempatan = $request -> lokasi_penempatan;
      $kewpa3a -> tarikh_penempatan = $request -> tarikh_penempatan;
      $kewpa3a -> tarikh_pemeriksaan = $request -> tarikh_pemeriksaan;

      $kewpa3a -> status_aset = $request -> status_aset;
      $kewpa3a -> tarikh_usia_guna = $request -> tarikh_usia_guna;
      $kewpa3a -> usia_guna = $request -> usia_guna;
      $kewpa3a -> nilai_semasa = $request -> nilai_semasa;
      $kewpa3a -> perkara = $request -> perkara;
      $kewpa3a -> rujukan_kelulusan = $request -> rujukan_kelulusan;
      $kewpa3a -> tarikh_kelulusan = $request -> tarikh_kelulusan;
      $kewpa3a -> ketua_jabatan = $request -> ketua_jabatan;
      $kewpa3a -> pegawai_pemeriksa = $request -> pegawai_pemeriksa;
      $kewpa3a -> pegawai_penempatan = $request -> pegawai_penempatan;
      $kewpa3a -> pegawai_usia_guna = $request -> pegawai_usia_guna;
      $kewpa3a -> pegawai_pindahan = $request -> pegawai_pindahan;
      $kewpa3a -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;

      $kewpa3a -> save();

      return $kewpa3a;

    }

    public function show(Kewpa3A $kewpa3a)
    {

      $kewpa3a -> no_siri_pendaftaran = $request -> no_siri_pendaftaran;
      $kewpa3a -> jenis_aset = $request -> jenis_aset;
      $kewpa3a -> agensi = $request -> agensi;
      $kewpa3a -> bahagian = $request -> bahagian;
      $kewpa3a -> kod_nasional = $request -> kod_nasional;
      $kewpa3a -> keterangan_aset = $request -> keterangan_aset;
      $kewpa3a -> kategori = $request -> kategori;
      $kewpa3a -> sub_kategori = $request -> sub_kategori;

      $kewpa3a -> jenis = $request -> jenis;
      $kewpa3a -> buatan = $request -> buatan;
      $kewpa3a -> jenis_enjin = $request -> jenis_enjin;
      $kewpa3a -> no_enjin = $request -> no_enjin;
      $kewpa3a -> no_casis = $request -> no_casis;
      $kewpa3a -> no_pendaftaraan_kenderaan = $request -> no_pendaftaraan_kenderaan;
      $kewpa3a -> catatan_spesifikasi = $request -> catatan_spesifikasi;
      $kewpa3a -> harga_perolehan_asal = $request -> harga_perolehan_asal;
      $kewpa3a -> tarikh_perolehan = $request -> tarikh_perolehan;
      $kewpa3a -> tarikh_diterima = $request -> tarikh_diterima;
      $kewpa3a -> no_pesanan_rasmi = $request -> no_pesanan_rasmi;
      $kewpa3a -> tempoh_jaminan = $request -> tempoh_jaminan;
      $kewpa3a -> nama_pembekal = $request -> nama_pembekal;
      $kewpa3a -> alamat_pembekal = $request -> alamat_pembekal;
      $kewpa3a -> lokasi_penempatan = $request -> lokasi_penempatan;
      $kewpa3a -> tarikh_penempatan = $request -> tarikh_penempatan;
      $kewpa3a -> tarikh_pemeriksaan = $request -> tarikh_pemeriksaan;

      $kewpa3a -> status_aset = $request -> status_aset;
      $kewpa3a -> tarikh_usia_guna = $request -> tarikh_usia_guna;
      $kewpa3a -> usia_guna = $request -> usia_guna;
      $kewpa3a -> nilai_semasa = $request -> nilai_semasa;
      $kewpa3a -> perkara = $request -> perkara;
      $kewpa3a -> rujukan_kelulusan = $request -> rujukan_kelulusan;
      $kewpa3a -> tarikh_kelulusan = $request -> tarikh_kelulusan;
      $kewpa3a -> ketua_jabatan = $request -> ketua_jabatan;
      $kewpa3a -> pegawai_pemeriksa = $request -> pegawai_pemeriksa;
      $kewpa3a -> pegawai_penempatan = $request -> pegawai_penempatan;
      $kewpa3a -> pegawai_usia_guna = $request -> pegawai_usia_guna;
      $kewpa3a -> pegawai_pindahan = $request -> pegawai_pindahan;
      $kewpa3a -> rujukan_kewpa1_id = $request -> rujukan_kewpa1_id;

      $kewpa3a -> save();


      return $kewpa3a;
    }


    public function update(Request $request, Kewpa3A $kewpa3a)
    {

      return $kewpa3a;

    }

    public function destroy(Kewpa3A $kewpa3a)
    {
      return $kewpa3a->delete();
    }


}
