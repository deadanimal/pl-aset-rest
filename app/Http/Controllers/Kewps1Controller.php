<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\kewps1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps1.index', [
            'kewps1' => kewps1::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps1.create', [
            'infokewps1' => InfoKewps1::where('new', 1)->get(),
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
        $kewps1 = kewps1::create($request->all());

        $info = InfoKewps1::where('new', 1)->get();
        if ($info) {
            InfoKewps1::where('new', 1)->update([
                'kewps1_id' => $kewps1->id,
                'new' => 0,
            ]);
        }
        return redirect('/kewps1');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kewps1  $kewps1
     * @return \Illuminate\Http\Response
     */
    public function show(kewps1 $kewps1)
    {
        return view('modul.stor.kewps1.edit', [
            'kewps1' => $kewps1,
            'infokewps1' => InfoKewps1::where('kewps1_id', $kewps1->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kewps1  $kewps1
     * @return \Illuminate\Http\Response
     */
    public function edit(kewps1 $kewps1)
    {

        kewps1::where('id', $kewps1->id)->update([
            'status' => "HANTAR",
        ]);
        return redirect('/kewps1');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kewps1  $kewps1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kewps1 $kewps1)
    {

        kewps1::where('id', $kewps1->id)->update([
            'nama_pembekal' => $request->nama_pembekal,
            'alamat_pembekal' => $request->alamat_pembekal,
            'jenis_penerimaan' => $request->jenis_penerimaan,
            'nombor_rujukan_pk' => $request->no_rujukan_pk,
            'tarikh_pk' => $request->tarikh_pk,
            'nombor_do' => $request->no_rujukan_do,
            'tarikh_do' => $request->tarikh_do,
            'maklumat_pengangkutan' => $request->maklumat_pengangkutan,
        ]);

        return redirect('/kewps1');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kewps1  $kewps1
     * @return \Illuminate\Http\Response
     */
    public function destroy(kewps1 $kewps1)
    {

        InfoKewps1::where('kewps1_id', $kewps1->id)->delete();

        kewps1::destroy($kewps1->id);

        return redirect('/kewps1');

    }

    public function generatePdf(Request $request, kewps1 $kewps1)
    {
        $infoKewps1 = InfoKewps1::where('kewps1_id', $kewps1->id)->get();
        $kewps1->data = $infoKewps1;

        // dd($kewps1);

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps1', [$kewps1]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
        ];

        return view('modul.borang_viewer', $context);

    }

}
