<?php

namespace App\Http\Controllers;

use App\Models\Kewps32;
use App\Models\Kewps34;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps34Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps34.index', [
            'kewps34' => Kewps34::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps34.create', [
            'kewps32' => Kewps32::all(),
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
        Kewps34::create($request->all());

        return redirect('/kewps34');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps34  $kewps34
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps34 $kewps34)
    {
        return view('modul.stor.kewps34.edit', [
            'kewps32' => Kewps32::all(),
            'kewps34' => $kewps34,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps34  $kewps34
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps34 $kewps34)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps34  $kewps34
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps34 $kewps34)
    {
        $kewps34->update($request->all());

        return redirect('/kewps34');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps34  $kewps34
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps34 $kewps34)
    {
        $kewps34->delete();
        return redirect('/kewps34');
    }
    public function generatePdf(Kewps34 $kewps34)
    {

        $kewps34->kuantiti = 1;

        $kewps34->tarikh_peroleh = $kewps34->kewps32->kewps3a->created_at->format('d/m/Y');

        $kewps34->harga_peroleh_asal = (int) $kewps34->kuantiti * (int) $kewps34->kewps32->infokewps1->harga_seunit;

        $kewps34->tarikh_diketahui = $kewps34->kewps32->created_at->format('d/m/Y');

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps34', [$kewps34]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps34",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
