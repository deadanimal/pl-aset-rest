<?php

namespace App\Http\Controllers;

use App\Models\Kewps20;
use App\Models\Kewps29;
use Illuminate\Http\Request;

class Kewps29Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps29.index', [
            'kewps29' => Kewps29::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps29.create', [
            'kewps20' => Kewps20::all(),
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
        Kewps29::create($request->all());

        return redirect('/kewps29');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps29  $kewps29
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps29 $kewps29)
    {
        return view('modul.stor.kewps29.edit', [
            'kewps29' => $kewps29,
            'kewps20' => Kewps20::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps29  $kewps29
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps29 $kewps29)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps29  $kewps29
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps29 $kewps29)
    {
        $kewps29->update($request->all());
        return redirect('/kewps29');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps29  $kewps29
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps29 $kewps29)
    {
        $kewps29->delete();
        return redirect('/kewps29');
    }

    public function generatePdf(Kewps29 $kewps29)
    {

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps29', [$kewps29]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps29",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
