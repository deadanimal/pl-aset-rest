<?php

namespace App\Http\Controllers;

use App\Models\Kewps3a;
use App\Models\Kewps32;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps32Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps32.index', [
            'kewps32' => Kewps32::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps32.create', [
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
        Kewps32::create($request->all());

        return redirect('/kewps32');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps32  $kewps32
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps32 $kewps32)
    {
        return view('modul.stor.kewps32.edit', [
            'kewps32' => $kewps32,
            'kewps3a' => Kewps3a::all(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps32  $kewps32
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps32 $kewps32)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps32  $kewps32
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps32 $kewps32)
    {
        $kewps32->update($request->all());
        return redirect('/kewps32');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps32  $kewps32
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps32 $kewps32)
    {
        $kewps32->delete();
        return redirect('/kewps32');
    }

    public function generatePdf(Kewps32 $kewps32)
    {

        $kewps32->max = 1;

        $kewps32->tarikh_peroleh = $kewps32->kewps3a->created_at->format('d/m/Y');
        $kewps32->harga_peroleh = $kewps32->infokewps1->harga_seunit;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps32', [$kewps32]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps32",
        ];

        return view('modul.borang_viewer_ps', $context);

    }

}
