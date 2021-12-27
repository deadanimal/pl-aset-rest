<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps7;
use App\Models\Kewps3a;
use App\Models\Kewps7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps7Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps7.index', [
            'kewps7' => Kewps7::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps7.create', [
            'kewps3a' => Kewps3a::all(),
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
        $kewps7 = Kewps7::create($request->all());

        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps7::create([
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kewps7_id' => $kewps7->id,
                'catatan_pemohon' => $request->catatan_pemohon[$i],
                'kuantiti_dimohon' => $request->kuantiti_dimohon[$i],
                // 'kuantiti_diluluskan' => $request->kuantiti_diluluskan[$i],
                // 'catatan_pelulus' => $request->catatan_pelulus[$i],
                // 'kuantiti_dikeluarkan' => $request->kuantiti_dikeluarkan[$i],
                // 'pembungkusan' => $request->pembungkusan[$i],
                // 'kuantiti_diterima' => $request->kuantiti_diterima[$i],
            ]);
        }

        return redirect('/kewps7');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps7  $kewps7
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps7 $kewps7)
    {
        return view('modul.stor.kewps7.edit', [
            'kewps7' => $kewps7,
            'kewps3a' => Kewps3a::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps7  $kewps7
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps7 $kewps7)
    {
        return view('modul.stor.kewps7.status', [
            'kewps7' => $kewps7,
            'kewps3a' => Kewps3a::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps7  $kewps7
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps7 $kewps7)
    {


        if ($kewps7->status == "DITERIMA") {
            foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
                InfoKewps7::where('id', $request->info7_id)->update([
                    'kewps3a_id' => $request->kewps3a_id[$i],
                    'catatan_pemohon' => $request->catatan_pemohon[$i],
                    'kuantiti_dimohon' => $request->kuantiti_dimohon[$i],
                    'kuantiti_diluluskan' => $request->kuantiti_diluluskan[$i],
                    'catatan_pelulus' => $request->catatan_pelulus[$i],
                    'kuantiti_dikeluarkan' => $request->kuantiti_dikeluarkan[$i],
                    'pembungkusan' => $request->pembungkusan[$i],
                    'kuantiti_diterima' => $request->kuantiti_diterima[$i],
                ]);
            }
        } elseif ($kewps7->status == "DIPOHON") {
            for ($i = 0; $i < count($request->kuantiti_diluluskan); $i++) {
                InfoKewps7::where('id', $request->infokewps7_id[$i])->update([
                    'kuantiti_diluluskan' => $request->kuantiti_diluluskan[$i],
                    'catatan_pelulus' => $request->catatan_pelulus[$i],
                ]);
            }
        } elseif ($kewps7->status == "DILULUS") {
            for ($i = 0; $i < count($request->kuantiti_dikeluarkan); $i++) {
                InfoKewps7::where('id', $request->infokewps7_id[$i])->update([
                    'kuantiti_dikeluarkan' => $request->kuantiti_dikeluarkan[$i],
                    'pembungkusan' => $request->pembungkusan[$i],
                    'kuantiti_diterima' => $request->kuantiti_diterima[$i],
                ]);
            }
        }

        $kewps7->update($request->all());

        return redirect('/kewps7');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps7  $kewps7
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps7 $kewps7)
    {
        InfoKewps7::where('kewps7_id', $kewps7->id)->delete();
        $kewps7->delete();
        return redirect('/kewps7');
    }
    public function generatePdf(Kewps7 $kewps7)
    {
        foreach ($kewps7->infokewps7 as $i7) {
            $jumlah_harga = 0;
            $i7->kuantiti_mohon = $i7->kewps3a->kewps1->kuantiti_dipesan;
            $i7->kuantiti_terima = $i7->kewps3a->kewps1->kuantiti_diterima;

            $i7->paras_stok = $i7->kewps3a->parasstok[0]->maksimum_stok;
            $i7->harga_seunit = $i7->kewps3a->kewps1->harga_seunit;
            $i7->jumlah_harga = $jumlah_harga;
        }

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps7', [$kewps7]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "Kewps7",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
