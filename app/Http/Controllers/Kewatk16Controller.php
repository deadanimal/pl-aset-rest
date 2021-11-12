<?php

namespace App\Http\Controllers;


use App\Models\Kewatk16;
use App\Models\Kewatk3a;
use App\Models\Kewatk3b;
use App\Models\InfoKewatk15;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class Kewatk16Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('modul.aset_tak_ketara.kewatk16.index');
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
     * @param  \App\Models\Kewatk16  $kewatk16
     * @return \Illuminate\Http\Response
     */
    public function show(Kewatk16 $kewatk16)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewatk16  $kewatk16
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewatk16 $kewatk16)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewatk16  $kewatk16
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewatk16 $kewatk16)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewatk16  $kewatk16
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewatk16 $kewatk16)
    {
        //
    }

    //CUSTOM METHOD STARTS HERE

    public function generatePdf(Request $request, $tahun) {
      
      $aset_dipindah_terimaan = InfoKewatk15::whereYear('created_at',$tahun)->where('jenis_pindahan', 'Terimaan')->get();
      $aset_dipindah_pengeluaran = InfoKewatk15::whereYear('created_at',$tahun)->where('jenis_pindahan', 'Pengeluaran')->get();

      # declare to avoid error when no data
      $jumlah_nilai_perolehan_asal_penerimaan = 0;
      $jumlah_nilai_perolehan_semasa_penerimaan = 0;
      $jumlah_nilai_perolehan_asal_pengeluaran = 0;       
      $jumlah_nilai_perolehan_semasa_pengeluaran = 0;

      try {

        $jumlah_nilai_perolehan_asal_penerimaan = $this->KiraJumlahPerolehanAsalTerimaan($aset_dipindah_terimaan);
        $jumlah_nilai_perolehan_semasa_penerimaan = $this->KiraJumlahPerolehanSemasaTerimaan($aset_dipindah_terimaan);
        $jumlah_nilai_perolehan_asal_pengeluaran = $this->KiraJumlahPerolehanAsalKeluaran($aset_dipindah_pengeluaran);
        $jumlah_nilai_perolehan_semasa_pengeluaran = $this->KiraJumlahPerolehanSemasaKeluaran($aset_dipindah_pengeluaran);
      }

      catch (Exception $e) {

      } 

      $kewatk16 = [

        "tahun" => $tahun,
        "kementerian" => "Perbadanan Labuan",
        "jumlah_kuantiti_pindahan_terimaan" => count($aset_dipindah_terimaan),
        "jumlan_nilai_perolehan_asal_penerimaan" => $jumlah_nilai_perolehan_asal_penerimaan,
        "jumlan_nilai_perolehan_semasa_penerimaan" => $jumlah_nilai_perolehan_semasa_penerimaan,

        "jumlah_kuantiti_pindahan_pengeluaran" => count($aset_dipindah_pengeluaran),
        "jumlan_nilai_perolehan_asal_pengeluaran" => $jumlah_nilai_perolehan_asal_pengeluaran,
        "jumlan_nilai_perolehan_semasa_pengeluaran" => $jumlah_nilai_perolehan_semasa_pengeluaran,
      ];


      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk16', [$kewatk16]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "kewatk16"
      ];

      return view('modul.borang_viewer_atk', $context);


    }

    //UTIL METHOD STARTS HERE
    //TODO
    //Clean this .. use array sum 

    public function KiraJumlahPerolehanAsalTerimaan($aset_dipindah_terimaan) {
      $jumlah_nilai_perolehan = 0;
      foreach($aset_dipindah_terimaan as $each) {
        $val = Kewatk3a::where('no_siri_pendaftaran', $each->no_siri_pendaftaran)->first()->harga_perolehan_asal;  
        $jumlah_nilai_perolehan = $jumlah_nilai_perolehan + $val;
      }
      return $jumlah_nilai_perolehan;
    }

    public function KiraJumlahPerolehanSemasaTerimaan($aset_dipindah_terimaan) {
      $jumlah_nilai_perolehan = 0;
      foreach($aset_dipindah_terimaan as $each) {
        $val = Kewatk3b::where('no_siri_pendaftaran', $each->no_siri_pendaftaran)->first()->harga_perolehan_asal;  
        $jumlah_nilai_perolehan = $jumlah_nilai_perolehan + $val;
      }
      return $jumlah_nilai_perolehan;
    }

    public function KiraJumlahPerolehanAsalPengeluaran($aset_dipindah_pengeluaran) {
      $jumlah_nilai_perolehan = 0;
      foreach($aset_dipindah_terimaan as $each) {
        $val = Kewatk3a::where('no_siri_pendaftaran', $each->no_siri_pendaftaran)->first()->harga_perolehan_asal;  
        $jumlah_nilai_perolehan = $jumlah_nilai_perolehan + $val;
      }
      return $jumlah_nilai_perolehan;
    }

    public function KiraJumlahPerolehanSemasaPengeluaran($aset_dipindah_pengeluaran) {
      $jumlah_nilai_perolehan = 0;
      foreach($aset_dipindah_terimaan as $each) {
        $val = Kewatk3b::where('no_siri_pendaftaran', $each->no_siri_pendaftaran)->first()->harga_perolehan_asal;  
        $jumlah_nilai_perolehan = $jumlah_nilai_perolehan + $val;
      }
      return $jumlah_nilai_perolehan;
    }

}
