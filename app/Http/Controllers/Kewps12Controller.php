<?php

namespace App\Http\Controllers;

use App\Models\Kewps10;
use App\Models\Kewps12;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps12Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps12.index', [
            'kewps12' => Kewps12::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps12.create', [
            'kewps10' => Kewps10::all(),
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
        Kewps12::create($request->all());

        return redirect('/kewps12');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps12  $kewps12
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps12 $kewps12)
    {
        return view('modul.stor.kewps12.edit', [
            'kewps12' => $kewps12,
            'kewps10' => Kewps10::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps12  $kewps12
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps12 $kewps12)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps12  $kewps12
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps12 $kewps12)
    {
        $kewps12->update($request->all());

        return redirect('kewps12');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps12  $kewps12
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps12 $kewps12)
    {
        $kewps12->delete();
        return redirect('kewps12');
    }

    public function getDinamic(Request $request)
    {
        $kewps10 = Kewps10::where('id', $request->id)->first();
        return response()->json($kewps10);
    }

    public function generatePdf(Kewps12 $kewps12)
    {

        $kewps12->tahun = $kewps12->first()->kewps10->tahun;

        $kewps12['tarikh'] = $kewps12->created_at->format('d/m/Y');
        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps12', [$kewps12]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps12",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
