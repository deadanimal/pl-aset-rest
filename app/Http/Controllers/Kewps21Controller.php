<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps20;
use App\Models\Kewps21;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps21Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps21.index', [
            'kewps21' => Kewps21::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps21.create', [
            'kewps20' => InfoKewps20::all(),
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
        Kewps21::create($request->all());
        return redirect('/kewps21');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps21  $kewps21
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps21 $kewps21)
    {
        return view('modul.stor.kewps21.edit', [
            'kewps21' => $kewps21,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps21  $kewps21
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps21 $kewps21)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps21  $kewps21
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps21 $kewps21)
    {
        $kewps21->update($request->all());
        return redirect('/kewps21');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps21  $kewps21
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps21 $kewps21)
    {
        $kewps21->delete();
        return redirect('/kewps21');
    }
    public function generatePdf(Kewps21 $kewps21)
    {
        $kewps21->kementerian = $kewps21->infokewps20->kewps20->kementerian;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps21', [$kewps21]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps21",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
