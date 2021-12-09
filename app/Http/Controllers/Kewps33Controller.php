<?php

namespace App\Http\Controllers;

use App\Models\Kewps32;
use App\Models\Kewps33;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps33Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps33.index', [
            'kewps33' => Kewps33::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps33.create', [
            'kewps32' => Kewps32::all(),
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
        Kewps33::create($request->all());
        return redirect('/kewps33');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps33  $kewps33
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps33 $kewps33)
    {
        return view('modul.stor.kewps33.edit', [
            'kewps33' => $kewps33,
            'kewps32' => Kewps32::all(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps33  $kewps33
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps33 $kewps33)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps33  $kewps33
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps33 $kewps33)
    {
        $kewps33->update($request->all());
        return redirect('/kewps33');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps33  $kewps33
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps33 $kewps33)
    {
        $kewps33->delete();
        return redirect('/kewps33');
    }

    public function generatePdf(Kewps33 $kewps33)
    {

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps33', [$kewps33]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps33",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
