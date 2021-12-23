<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps20;
use App\Models\Kewps3a;
use App\Models\Kewps20;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Kewps20Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps20.index', [
            'kewps20' => Kewps20::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps20.create', [
            'kewps3a' => Kewps3a::all(),
            'kaedah' => DB::table('kaedah_pelupusans')->get(),
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
        $kewps20 = Kewps20::create($request->all());

        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps20::create([
                'kewps20_id' => $kewps20->id,
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti' => $request->kuantiti[$i],
                'keadaan_stok' => $request->keadaan_stok[$i],
                'kaedah_pelupusan' => $request->kaedah_pelupusan[$i],
                'justifikasi' => $request->justifikasi[$i],
                'keputusan' => $request->keputusan[$i],
            ]);
        }

        return redirect('/kewps20');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps20  $kewps20
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps20 $kewps20)
    {
        return view('modul.stor.kewps20.edit', [
            'kewps20' => $kewps20,
            'kewps3a' => Kewps3a::all(),
            'kaedah' => DB::table('kaedah_pelupusans')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps20  $kewps20
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps20 $kewps20)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps20  $kewps20
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps20 $kewps20)
    {
        $kewps20->update($request->all());

        // if ($request->kewps20->infokewps20) {
        //     foreach (range(0, count($request->info20_id) - 1) as $i) {
        //         InfoKewps20::where('id', $request->info20_id[$i])->update([
        //             'kewps3a_id' => $request->kewps3a_id[$i],
        //             'kuantiti' => $request->kuantiti[$i],
        //             'keadaan_stok' => $request->keadaan_stok[$i],
        //             'kaedah_pelupusan' => $request->kaedah_pelupusan[$i],
        //             'justifikasi' => $request->justifikasi[$i],
        //             'keputusan' => $request->keputusan[$i],
        //         ]);
        //     }
        // }
        return redirect('/kewps20');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps20  $kewps20
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps20 $kewps20)
    {
        InfoKewps20::where('kewps20_id', $kewps20->id)->delete();
        $kewps20->delete();

        return redirect('/kewps20');
    }

    public function generatePdf(Kewps20 $kewps20)
    {
        $jumlah_kuantiti = 0;
        $jumlah_seunit = 0;
        $jumlah_jumlah = 0;
        foreach ($kewps20->infokewps20 as $k20) {
            $now = time(); // or your date as well
            $k20->infokewps1->tarikh_terima = $k20->infokewps1->created_at->toDateString();
            $your_date = strtotime($k20->infokewps1->tarikh_terima);
            $datediff = $now - $your_date;
            $k20->infokewps1->tempoh_simpanan = round($datediff / (60 * 60 * 24));

            $harga = $k20->infokewps1->harga_seunit;
            $k20->infokewps1->jumlah_nilai = (int) $k20->kuantiti * (int) $harga;

            $jumlah_kuantiti = $jumlah_kuantiti + (int) $k20->kuantiti;
            $jumlah_seunit = $jumlah_seunit + (int) $k20->infokewps1->harga_seunit;
            $jumlah_jumlah = $jumlah_jumlah + (int) $k20->infokewps1->jumlah_nilai;
        }

        $kewps20->jumlah_kuantiti = $jumlah_kuantiti;
        $kewps20->jumlah_seunit = $jumlah_seunit;
        $kewps20->jumlah_jumlah = $jumlah_jumlah;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps20', [$kewps20]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps20",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
