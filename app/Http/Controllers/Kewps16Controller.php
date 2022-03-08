<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps16;
use App\Models\Kewps3a;
use App\Models\Kewps16;
use App\Models\KodJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps16Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps16.index', [
            'kewps16' => Kewps16::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kewps3a = Kewps3a::where('pergerakan', 'aktif')->get();

        return view('modul.stor.kewps16.create', [
            'kewps3a' => $kewps3a,
            'bahagian' => KodJabatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kewps16 = Kewps16::create($request->all());

        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            $kewps3a = Kewps3a::where('id', $request->kewps3a_id[$i])->first();

            $kuantiti_kad_daftar = $kewps3a->stor->baki_stok_semasa;
            $perbezaan_diserahkan = (int) $request->kuantiti_fizikal_diserahkan[$i] - (int) $kuantiti_kad_daftar;
            $perbezaan_diambil = (int) $request->kuantiti_fizikal_diambil[$i] - (int) $kuantiti_kad_daftar;

            InfoKewps16::create([
                'kewps16_id' => $kewps16->id,
                'kewps3a_id' => $kewps3a->id,
                'kuantiti_fizikal_diserahkan' => $request->kuantiti_fizikal_diserahkan[$i],
                'perbezaan_diserahkan' => $perbezaan_diserahkan,
                'kuantiti_fizikal_diambil' => $request->kuantiti_fizikal_diambil[$i],
                'perbezaan_diambil' => $perbezaan_diambil,
                'catatan' => $request->catatan[$i],
            ]);
        }

        return redirect('/kewps16');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps16  $kewps16
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps16 $kewps16)
    {
        return view('modul.stor.kewps16.edit', [
            'kewps16' => $kewps16,
            'kewps3a' => Kewps3a::all(),
            'ckewps3a' => Kewps3a::where('id', $kewps16->infokewps16[0]->kewps3a_id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps16  $kewps16
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps16 $kewps16)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps16  $kewps16
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps16 $kewps16)
    {
        $kewps16->update($request->all());

        foreach (range(0, count($request->info16_id) - 1) as $i) {
            $kewps3a = Kewps3a::where('id', $request->kewps3a_id[$i])->first();
            $kuantiti_kad_daftar = $kewps3a->parasstok[0]->maksimum_stok;
            $perbezaan_diserahkan = (int) $request->kuantiti_fizikal_diserahkan[$i] - (int) $kuantiti_kad_daftar;
            $perbezaan_diambil = (int) $request->kuantiti_fizikal_diambil[$i] - (int) $kuantiti_kad_daftar;
            InfoKewps16::where('id', $request->info16_id[$i])->update([
                'kewps3a_id' => $kewps3a->id,
                'kuantiti_fizikal_diserahkan' => $request->kuantiti_fizikal_diserahkan[$i],
                'perbezaan_diserahkan' => $perbezaan_diserahkan,
                'kuantiti_fizikal_diambil' => $request->kuantiti_fizikal_diambil[$i],
                'perbezaan_diambil' => $perbezaan_diambil,
                'catatan' => $request->catatan[$i],
            ]);
        }

        return redirect('/kewps16');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps16  $kewps16
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps16 $kewps16)
    {
        InfoKewps16::where('kewps16_id', $kewps16->id)->delete();
        $kewps16->delete();

        return redirect('/kewps16');
    }

    public function generatePdf(Kewps16 $kewps16)
    {
        $infokewps16 = InfoKewps16::where('kewps16_id', $kewps16->id)->get();

        $kewps16->data = $infokewps16;
        $kewps16->nama_stor = $infokewps16[0]->kewps3a->nama_stor;
        $kewps16->baki_kad = $infokewps16[0]->kewps3a->parasstok[0]->maksimum_stok;

        $kewps16->jumlah_baki_kad = (int) $kewps16->baki_kad * count($infokewps16);
        $kewps16->serah_jumlah_fizikal = 0;
        $kewps16->serah_jumlah_perbezaan = 0;
        $kewps16->ambil_jumlah_fizikal = 0;
        $kewps16->ambil_jumlah_perbezaan = 0;
        foreach ($infokewps16 as $ik16) {
            $kewps16->serah_jumlah_fizikal = (int) $kewps16->serah_jumlah_fizikal + (int) $ik16->kuantiti_fizikal_diserahkan;
            $kewps16->serah_jumlah_perbezaan = (int) $kewps16->serah_jumlah_perbezaan + (int) $ik16->perbezaan_diserahkan;
            $kewps16->ambil_jumlah_fizikal = (int) $kewps16->ambil_jumlah_fizikal + (int) $ik16->kuantiti_fizikal_diambil;
            $kewps16->ambil_jumlah_perbezaan = (int) $kewps16->ambil_jumlah_perbezaan + (int) $ik16->perbezaan_diambil;
        }

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps16', [$kewps16]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps16",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
