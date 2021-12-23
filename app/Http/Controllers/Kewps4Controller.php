<?php

namespace App\Http\Controllers;

use App\Models\Kewps3a;
use App\Models\Kewps4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps4.index', [
            'kewps4' => Kewps4::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps4.create', [
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
        Kewps4::create($request->all());

        return redirect('/kewps4');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps4  $kewps4
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps4 $kewps4)
    {
        return view('modul.stor.kewps4.edit', [
            'kewps4' => $kewps4,
            'kewps3a' => Kewps3a::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps4  $kewps4
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps4 $kewps4)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps4  $kewps4
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps4 $kewps4)
    {
        $kewps4->update($request->all());

        return redirect('/kewps4');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps4  $kewps4
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps4 $kewps4)
    {
        Kewps4::where('id', $kewps4->id)->delete();
        return redirect('/kewps4');
    }

    public function generatePdf(Kewps4 $kewps4)
    {
        $kewps4->data = $kewps4->all();
        $kewps4->total = count(Kewps4::all());

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps4', [$kewps4]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps4",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
