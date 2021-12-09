<?php

namespace App\Http\Controllers;

use App\Models\Kewps19;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps19Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps19.index', [
            'kewps19' => Kewps19::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps19.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mula = strtotime($request->tempoh_mula);
        $tamat = strtotime($request->tempoh_tamat);

        $datediff = $tamat - $mula;

        $request['tempoh'] = round($datediff / (60 * 60 * 24));

        Kewps19::create($request->all());
        return redirect('/kewps19');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps19  $kewps19
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps19 $kewps19)
    {
        return view('modul.stor.kewps19.edit', [
            'kewps19' => $kewps19,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps19  $kewps19
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps19 $kewps19)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps19  $kewps19
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps19 $kewps19)
    {
        $mula = strtotime($request->tempoh_mula);
        $tamat = strtotime($request->tempoh_tamat);

        $datediff = $tamat - $mula;

        $request['tempoh'] = round($datediff / (60 * 60 * 24));

        $kewps19->update($request->all());
        return redirect('/kewps19');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps19  $kewps19
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps19 $kewps19)
    {
        $kewps19->delete();
        return redirect('/kewps19');
    }

    public function generatePdf(Kewps19 $kewps19)
    {
        $tempoh_tahun = ((int) $kewps19->tempoh / 365);

        $tempoh_tahun = number_format((float) $tempoh_tahun, 2, '.', '');

        $kewps19->tempoh_tahun = $tempoh_tahun;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps19', [$kewps19]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps19",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
