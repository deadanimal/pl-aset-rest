<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps20;
use App\Models\Kewps22;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps22Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps22.index', [
            'kewps22' => Kewps22::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps22.create', [
            'kewps20' => InfoKewps20::all()
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
        Kewps22::create($request->all());
        return redirect('/kewps22');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps22  $kewps22
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps22 $kewps22)
    {
        return view('modul.stor.kewps22.edit', [
            'kewps22' => $kewps22,
            'kewps20' => InfoKewps20::all()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps22  $kewps22
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps22 $kewps22)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps22  $kewps22
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps22 $kewps22)
    {
        $kewps22->update($request->all());
        return redirect('/kewps22');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps22  $kewps22
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps22 $kewps22)
    {
        $kewps22->delete();
        return redirect('/kewps22');
    }

    public function generatePdf(Kewps22 $kewps22)
    {
        $kewps22['tarikh'] = $kewps22->updated_at->format("d/m/Y");

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps22', [$kewps22]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps22",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
