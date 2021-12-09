<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps10;
use App\Models\Kewps3a;
use App\Models\Kewps13;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps13Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps13.index', [
            'kewps13' => Kewps13::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('modul.stor.kewps13.create', [
            'infokewps10' => InfoKewps10::all(),
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
        $infokewps10 = InfoKewps10::where('id', $request->infokewps10_id)->first();

        $request['tahun'] = $infokewps10->kewps10->tahun;

        Kewps13::create($request->all());

        return redirect('/kewps13');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps13  $kewps13
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps13 $kewps13)
    {
        return view('modul.stor.kewps13.edit', [
            'infokewps10' => InfoKewps10::all(),
            'kewps3a' => Kewps3a::all(),
            'kewps13' => $kewps13,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps13  $kewps13
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps13 $kewps13)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps13  $kewps13
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps13 $kewps13)
    {
        $kewps13->update($request->all());

        return redirect('/kewps13');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps13  $kewps13
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps13 $kewps13)
    {
        $kewps13->delete();
        return redirect('/kewps13');
    }

    public function getDinamic(Request $request)
    {
        $infokewps10 = InfoKewps10::where('id', $request->id)->first();

        foreach ($infokewps10->kewps3a->parasstok as $paras) {
            if ($paras->tahun_paras_stok == $infokewps10->kewps10->tahun) {
                $infokewps10['stok_semasa'] = $paras->maksimum_stok;
            }
        }

        return response()->json($infokewps10);
    }

    public function generatePdf(Kewps13 $kewps13)
    {

        $kewps13->data = $kewps13->all();

        $kewps13->tahun = $kewps13->first()->infokewps10->kewps10->tahun;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps13', [$kewps13]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps13",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
