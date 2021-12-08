<?php

namespace App\Http\Controllers;

use App\Models\InfoJkrpataf610;
use App\Models\Jkrpataf68;
use App\Models\Jkrpataf610;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Jkrpataf610Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jkrpataf610.index', [
            'jkrpataf610' => Jkrpataf610::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.jkrpataf610.create', [
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
        $jkrpataf610 = Jkrpataf610::create($request->all());
        foreach (range(0, count($request->jkrpataf68_id) - 1) as $i) {
            InfoJkrpataf610::create([
                'jkrpataf610_id' => $jkrpataf610->id,
                'jkrpataf68_id' => $request->jkrpataf68_id[$i],
                'bil' => $request->bil[$i],
                'no_ptp' => $request->no_ptp[$i],
                'no_lot' => $request->no_lot[$i],
                'status_pemilikan' => $request->status_pemilikan[$i],
                'status_kegunaan_tanah' => $request->status_kegunaan_tanah[$i],
                'saiz_blok' => $request->saiz_blok[$i],
                'bil_binaan' => $request->bil_binaan[$i],
                'saiz_binaan' => $request->saiz_binaan[$i],
                'bil_sistem_utama' => $request->bil_sistem_utama[$i],
                'kapasiti_sistem_utama' => $request->kapasiti_sistem_utama[$i],
                'populasi' => $request->populasi[$i],
                'harga_tanah' => $request->harga_tanah[$i],
                'harga_pembinaan' => $request->harga_pembinaan[$i],
                'catatan' => $request->catatan[$i],
                'staff_id' => Auth::user()->id,
            ]);
        }
        return redirect('/jkrpataf610');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jkrpataf610  $jkrpataf610
     * @return \Illuminate\Http\Response
     */
    public function show(Jkrpataf610 $jkrpataf610)
    {
        return view('modul.aset_tak_alih.jkrpataf610.edit', [
            'jkrpataf68' => Jkrpataf68::all(),
            'jkrpataf610' => $jkrpataf610,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jkrpataf610  $jkrpataf610
     * @return \Illuminate\Http\Response
     */
    public function edit(Jkrpataf610 $jkrpataf610)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jkrpataf610  $jkrpataf610
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jkrpataf610 $jkrpataf610)
    {
        $jkrpataf610->update($request->all());

        foreach (range(0, count($request->jkrpataf68_id) - 1) as $i) {
            InfoJkrpataf610::where('id', $request->infoata610_id[$i])->update([
                'jkrpataf68_id' => $request->jkrpataf68_id[$i],
                'bil' => $request->bil[$i],
                'no_ptp' => $request->no_ptp[$i],
                'no_lot' => $request->no_lot[$i],
                'status_pemilikan' => $request->status_pemilikan[$i],
                'status_kegunaan_tanah' => $request->status_kegunaan_tanah[$i],
                'saiz_blok' => $request->saiz_blok[$i],
                'bil_binaan' => $request->bil_binaan[$i],
                'saiz_binaan' => $request->saiz_binaan[$i],
                'bil_sistem_utama' => $request->bil_sistem_utama[$i],
                'kapasiti_sistem_utama' => $request->kapasiti_sistem_utama[$i],
                'populasi' => $request->populasi[$i],
                'harga_tanah' => $request->harga_tanah[$i],
                'harga_pembinaan' => $request->harga_pembinaan[$i],
                'catatan' => $request->catatan[$i],
                'staff_id' => Auth::user()->id,
            ]);
        }
        return redirect('/jkrpataf610');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jkrpataf610  $jkrpataf610
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jkrpataf610 $jkrpataf610)
    {
        InfoJkrpataf610::where('jkrpataf610_id', $jkrpataf610->id)->delete();
        $jkrpataf610->delete();

        return redirect('/jkrpataf610');
    }

    public function generatePdf(Jkrpataf610 $jkrpataf610)
    {
        foreach ($jkrpataf610->infojkrpataf610 as $jkr610) {
            $jkr610['tahun_siap_bina'] = date('Y', strtotime($jkr610->jkrpataf68->tarikh_siap_bina_asal));
        }

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/ata610', [$jkrpataf610]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "jkrpataf610",
        ];

        return view('modul.borang_viewer_ata', $context);

    }
}
