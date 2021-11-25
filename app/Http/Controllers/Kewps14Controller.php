<?php

namespace App\Http\Controllers;

use App\Models\Kewps14;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps14Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps14.index', [
            'kewps14' => Kewps14::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps14.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['nilai_terima_tahunan'] = (int) $request->stok_terima_pertama + (int) $request->stok_terima_kedua + (int) $request->stok_terima_ketiga + (int) $request->stok_terima_keempat;
        $request['nilai_keluar_tahunan'] = (int) $request->stok_keluar_pertama + (int) $request->stok_keluar_kedua + (int) $request->stok_keluar_ketiga + (int) $request->stok_keluar_keempat;
        $request['stok_semasa_pertama'] = ((int) $request->stok_sediaada_pertama + (int) $request->stok_terima_pertama) - (int) $request->stok_keluar_pertama;
        $request['stok_semasa_kedua'] = ((int) $request->stok_sediaada_kedua + (int) $request->stok_terima_kedua) - (int) $request->stok_keluar_kedua;
        $request['stok_semasa_ketiga'] = ((int) $request->stok_sediaada_ketiga + (int) $request->stok_terima_ketiga) - (int) $request->stok_keluar_ketiga;
        $request['stok_semasa_keempat'] = ((int) $request->stok_sediaada_keempat + (int) $request->stok_terima_keempat) - (int) $request->stok_keluar_keempat;
        $request['pusingan_stok'] = (int) $request->nilai_keluar_tahunan / (((int) $request->baki_stok_akhir + (int) $request->stok_semasa_keempat) / 2);

        Kewps14::create($request->all());
        return redirect('/kewps14');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps14  $kewps14
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps14 $kewps14)
    {
        return view('modul.stor.kewps14.edit', [
            'kewps14' => $kewps14,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps14  $kewps14
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps14 $kewps14)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps14  $kewps14
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps14 $kewps14)
    {
        $request['nilai_terima_tahunan'] = (int) $request->stok_terima_pertama + (int) $request->stok_terima_kedua + (int) $request->stok_terima_ketiga + (int) $request->stok_terima_keempat;
        $request['nilai_keluar_tahunan'] = (int) $request->stok_keluar_pertama + (int) $request->stok_keluar_kedua + (int) $request->stok_keluar_ketiga + (int) $request->stok_keluar_keempat;
        $request['stok_semasa_pertama'] = ((int) $request->stok_sediaada_pertama + (int) $request->stok_terima_pertama) - (int) $request->stok_keluar_pertama;
        $request['stok_semasa_kedua'] = ((int) $request->stok_sediaada_kedua + (int) $request->stok_terima_kedua) - (int) $request->stok_keluar_kedua;
        $request['stok_semasa_ketiga'] = ((int) $request->stok_sediaada_ketiga + (int) $request->stok_terima_ketiga) - (int) $request->stok_keluar_ketiga;
        $request['stok_semasa_keempat'] = ((int) $request->stok_sediaada_keempat + (int) $request->stok_terima_keempat) - (int) $request->stok_keluar_keempat;
        $request['pusingan_stok'] = (int) $request->nilai_keluar_tahunan / (((int) $request->baki_stok_akhir + (int) $request->stok_semasa_keempat) / 2);

        $kewps14->update($request->all());
        return redirect('/kewps14');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps14  $kewps14
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps14 $kewps14)
    {
        $kewps14->delete();
        return redirect('/kewps14');
    }
    public function generatePdf(Kewps14 $kewps14)
    {
        $kewps14->pusingan_stok = round($kewps14->pusingan_stok, 2);

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps14', [$kewps14]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps14",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
