<?php

namespace App\Http\Controllers;

use App\Models\Kewps3a;
use App\Models\Kewps6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps6Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps6.index', [
            'kewps6' => Kewps6::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps6.create', ['kewps3a' => Kewps3a::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kewps6::create($request->all());
        return redirect('/kewps6');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps6  $kewps6
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps6 $kewps6)
    {
        return view('modul.stor.kewps6.edit', [
            'kewps6' => $kewps6,
            'kewps3a' => Kewps3a::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps6  $kewps6
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps6 $kewps6)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps6  $kewps6
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps6 $kewps6)
    {
        $kewps6->update($request->all());
        return redirect('/kewps6');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps6  $kewps6
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps6 $kewps6)
    {
        $kewps6->delete();
        return redirect('/kewps6');
    }




    public function generatePdf(Kewps6 $kewps6)
    {
        $kewps6->data = $kewps6->all();

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps6', [$kewps6]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps6",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
