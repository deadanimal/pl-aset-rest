<?php

namespace App\Http\Controllers;

use App\Models\Jkrpataf68;
use App\Models\Jkrpataf102;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Jkrpataf102Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpataf102.index', [
            'jkrpataf102' => Jkrpataf102::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jkrpataf68_id[] = [];

        $jkrpataf102 = Jkrpataf102::all();
        foreach ($jkrpataf102 as $i) {
            $jkrpataf68_id[] = $i->jkrpataf68_id;
        }

        return view('modul.aset_tak_alih.jkrpataf102.create', [
            'jkrpataf68' => Jkrpataf68::all(),
            'check' => $jkrpataf68_id,
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
        $jkpataf68 = Jkrpataf68::where('id', $request->jkrpataf68_id)->firstorfail();

        $request['no_rujukan_laporan'] = $jkpataf68->no_rujukan;
        $request['tahun_rujukan_laporan'] = date('Y', strtotime($jkpataf68->tarikh));
        $request['gambar_aset'] = $jkpataf68->gambar_premis;
        $request['pelan_tapak'] = $jkpataf68->no_lukisan_pelan_tapak;
        $request['nama_aset'] = $jkpataf68->nama_premis;
        $request['lokasi_aset'] = $jkpataf68->alamat_premis;
        $request['kegunaan_aset'] = $jkpataf68->fungsi_aset;
        $request['tarikh_pembinaan'] = $jkpataf68->tarikh_siap_bina_asal;

        Jkrpataf102::create($request->all());
        return redirect('/jkrpataf102');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpataf102  $jkrpataf102
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpataf102 $jkrpataf102)
    {

        return view('modul.aset_tak_alih.jkrpataf102.edit', [
            'jkrpataf68' => Jkrpataf68::all(),
            'jkrpataf102' => $jkrpataf102,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpataf102  $jkrpataf102
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpataf102 $jkrpataf102)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpataf102  $jkrpataf102
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpataf102 $jkrpataf102)
    {
        $jkrpataf102->update($request->all());
        return redirect('/jkrpataf102');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpataf102  $jkrpataf102
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpataf102 $jkrpataf102)
    {
        $jkrpataf102->delete();
        return redirect('/jkrpataf102');
    }

    public function generatePdf(Jkrpataf102 $jkrpataf102)
    {
        $jkrpataf102['create_at'] = $jkrpataf102->created_at->format('d/m/Y');

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/ata102', [$jkrpataf102]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "jkrpataf102",
        ];

        return view('modul.borang_viewer_ata', $context);

    }
}
