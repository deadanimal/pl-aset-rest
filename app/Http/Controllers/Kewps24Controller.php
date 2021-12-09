<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps23;
use App\Models\InfoKewps24;
use App\Models\Kewps23;
use App\Models\Kewps24;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps24Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps24.index', [
            'kewps24' => Kewps24::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps24.create', [
            'kewps23' => Kewps23::all(),
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
        $kewps24 = Kewps24::create($request->all());

        foreach (range(0, count($request->kewps23_id) - 1) as $i) {
            InfoKewps24::create([
                'kewps24_id' => $kewps24->id,
                'harga_tawaran' => $request->harga_tawaran[$i],
                'deposit_tender' => $request->deposit_tender[$i],
                'kewps23_id' => $request->kewps23_id[$i],
            ]);
        }

        return redirect('/kewps24');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps24  $kewps24
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps24 $kewps24)
    {
        return view('modul.stor.kewps24.edit', [
            'kewps24' => $kewps24,
            'kewps23' => Kewps23::all(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps24  $kewps24
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps24 $kewps24)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps24  $kewps24
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps24 $kewps24)
    {
        $kewps24->update($request->all());
        foreach (range(0, count($request->info24_id) - 1) as $i) {
            InfoKewps24::where('id', $request->info24_id[$i])->update([
                'kewps24_id' => $kewps24->id,
                'harga_tawaran' => $request->harga_tawaran[$i],
                'deposit_tender' => $request->deposit_tender[$i],
                'kewps23_id' => $request->kewps23_id[$i],
            ]);
        }

        return redirect('/kewps24');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps24  $kewps24
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps24 $kewps24)
    {
        InfoKewps24::where('kewps24_id', $kewps24->id)->delete();
        $kewps24->delete();

        return redirect('/kewps24');
    }

    public function generatePdf(Kewps24 $kewps24)
    {

        foreach ($kewps24->infokewps24 as $i24) {

            $j = 0;
            foreach ($i24->kewps23->infokewps23 as $i23) {
                $j = $j + (int) $i23->kuantiti;
            }
            $i24->jumlah = $j;
            $i24->perihal_stok = $i24->kewps23->infokewps23[0]->kewps3a->perihal_stok;

        }

        $kewps24->no_tender = $kewps24->infokewps24[0]->kewps23_id;
        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps24', [$kewps24]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps24",
        ];

        return view('modul.borang_viewer_ps', $context);

    }

}
