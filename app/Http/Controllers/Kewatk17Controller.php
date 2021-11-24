<?php
namespace App\Http\Controllers;

use App\Models\Kewatk17;
use App\Models\Kewatk3a;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Kewatk17Controller extends Controller
{
    public function index()
    {
      $kewatk17 = Kewatk17::all();
      $kewatk3a = Kewatk3a::all();

      $context = [
        "kewatk17" => $kewatk17,
        "kewatk3a" => $kewatk3a,
      ];

      return view('modul.aset_tak_ketara.kewatk17.index', $context);
    }


    public function store(Request $request)
    {
      $kewatk17 = new Kewatk17;
      $kewatk17->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $kewatk17->kos_bersangkutan=$request->kos_bersangkutan;
      $kewatk17->tarikh_tamat_perlindungan=$request->tarikh_tamat_perlindungan;
      $kewatk17->butir=$request->butir;
      $kewatk17->laporan=$request->laporan;
      $kewatk17->status="DERAF";
      $kewatk17->pengaku=$request->user()->name;
      $kewatk17->save();

      return redirect('/kewatk17');
    }

    public function show(Kewatk17 $kewatk17)
    {

      return $kewatk17;
    }


    public function update(Request $request, Kewatk17 $kewatk17)
    {
      $kewatk17->no_siri_pendaftaran=$request->no_siri_pendaftaran;
      $kewatk17->kos_bersangkutan=$request->kos_bersangkutan;
      $kewatk17->tarikh_tamat_perlindungan=$request->tarikh_tamat_perlindungan;
      $kewatk17->butir=$request->butir;
      $kewatk17->laporan=$request->laporan;

      $kewatk17->status="DERAF";
      $kewatk17->pengaku=$request->user()->name;

      $kewatk17->save();


      return redirect('/kewatk17');

    }

    public function destroy(Kewatk17 $kewatk17)
    {

      return $kewatk17->delete();
    }

    public function generatePdf(Request $request, Kewatk17 $kewatk17) {
      //lookup & tampal few data based on borang
      $kewatk3a = Kewatk3a::where('no_siri_pendaftaran', $kewatk17->no_siri_pendaftaran)->first();
      $kewatk17->tajuk = $kewatk3a->rajuk;

      //hardcode first nanti baru tambah lookup
      $kewatk17->nilai_perolehan_asal = 1000;
      $kewatk17->tarikh_perolehan = "24 April 2021";
      $kewatk17->harga_perolehan_asal = 1000;
      $kewatk17->tarikh_pendaftaran = "25 April 2021";
      $kewatk17->jumlah_kos_selenggara_dahulu = 1000;
      $kewatk17->anggaran_kos_selenggara = 1000;
      $kewatk17->anggaran_nilai_semasa = 1000;
      $kewatk17->jawatan_pengaku = "Operator";

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk17', [$kewatk17]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title"=> "Kewatk17"
      ];

      return view('modul.borang_viewer_atk', $context);


    }


}
