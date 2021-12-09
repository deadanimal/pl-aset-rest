<?php

namespace App\Http\Controllers;

use App\Models\Kewps8;
use Illuminate\Http\Request;

class Kewps8APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Kewps8::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps8.create', [
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
        $kewps8 = new Kewps8;
        $kewps8->pemohon_id = "NA";
        $kewps8->status= "DERAF";
        $kewps8->kewps3a_id=0;
        $kewps8->kuantiti_dimohon = $request->kuantiti_dimohon;
        $kewps8->catatan_pemohon = $request->catatan_pemohon;
        $kewps8->save();
        return $kewps8;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps8  $kewps8
     * @return \Illuminate\Http\Response
     */
    public function show($kewps8)
    {
      return Kewps8::where('id', $kewps8)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps8  $kewps8
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps8 $kewps8)
    {
        return view('modul.stor.kewps8.status', ['kewps8' => $kewps8]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps8  $kewps8
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps8 $kewps8)
    {
        return $kewps8->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps8  $kewps8
     * @return \Illuminate\Http\Response
     */
    public function destroy($kewps8)
    {
      return Kewps8::where('id', $kewps8)->first()->delete();
    }

    public function generatePdf(Kewps8 $kewps8)
    {
        $kewps8->data = Kewps8::all();

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps8', [$kewps8]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps8",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
