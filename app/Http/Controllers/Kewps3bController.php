<?php

namespace App\Http\Controllers;

use App\Models\kewps3b;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps3bController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps3b.index', [
            'kewps3b' => kewps3b::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps3b.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        kewps3b::create($request->all());

        return redirect('/kewps3b');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kewps3b  $kewps3b
     * @return \Illuminate\Http\Response
     */
    public function show(kewps3b $kewps3b)
    {
        return view('modul.stor.kewps3b.edit', [
            'kewps3b' => $kewps3b,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kewps3b  $kewps3b
     * @return \Illuminate\Http\Response
     */
    public function edit(kewps3b $kewps3b)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kewps3b  $kewps3b
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kewps3b $kewps3b)
    {
        $kewps3b->update($request->all());

        return redirect('/kewps3b');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kewps3b  $kewps3b
     * @return \Illuminate\Http\Response
     */
    public function destroy(kewps3b $kewps3b)
    {
        kewps3b::where('id', $kewps3b->id)->delete();

        return redirect('/kewps3b');
    }

    public function generatePdf(kewps3b $kewps3b)
    {
        $kewps3b->data = $kewps3b->all();

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps3b', [$kewps3b]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
        ];

        return view('modul.borang_viewer', $context);

    }
}
