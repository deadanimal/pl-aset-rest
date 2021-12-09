<?php

namespace App\Http\Controllers;

use App\Models\Jkrpataf68;
use App\Models\Jkrpataf69;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Jkrpataf69Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpataf69.index', [
            'jkrpataf69' => Jkrpataf69::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.jkrpataf69.create', [
            'jkrpataf68' => Jkrpataf68::all(),
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
        Jkrpataf69::create($request->all());
        return redirect('/jkrpataf69');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpataf69  $jkrpataf69
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpataf69 $jkrpataf69)
    {
        return view('modul.aset_tak_alih.jkrpataf69.edit', [
            'jkrpataf68' => Jkrpataf68::all(),
            'jkrpataf69' => $jkrpataf69,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpataf69  $jkrpataf69
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpataf69 $jkrpataf69)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpataf69  $jkrpataf69
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpataf69 $jkrpataf69)
    {
        $jkrpataf69->update($request->all());
        return redirect('/jkrpataf69');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpataf69  $jkrpataf69
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpataf69 $jkrpataf69)
    {
        $jkrpataf69->delete();
        return redirect('/jkrpataf68');
    }

    public function generatePdf(Jkrpataf69 $jkrpataf69)
    {

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/ata69', [$jkrpataf69]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "jkrpataf69",
        ];

        return view('modul.borang_viewer_ata', $context);

    }
}
