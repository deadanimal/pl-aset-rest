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

        $infokewps10 = InfoKewps10::where('selected', 'selected')->get();
        return view('modul.stor.kewps13.create', [
            'infokewps10' => $infokewps10,
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
        for ($i = 0; $i < count($request->tahun); $i++) {
            $kewps13 = Kewps13::create([
                "tahun" => $request->tahun[$i],
                "stok_tidak_diverifikasi" => $request->stok_tidak_diverifikasi[$i],
                "peratusan_diverifikasi" => $request->peratusan_diverifikasi[$i],
                "jumlah_stok_A" => $request->jumlah_stok_A[$i],
                "jumlah_stok_B" => $request->jumlah_stok_B[$i],
                "jumlah_stok_C" => $request->jumlah_stok_C[$i],
                "jumlah_stok_D" => $request->jumlah_stok_D[$i],
                "jumlah_stok_E" => $request->jumlah_stok_E[$i],
                "jumlah_stok_F" => $request->jumlah_stok_F[$i],
                "jumlah_kesuluruhan" => $request->jumlah_keseluruhan[$i],
                "user_id" => $request->user_id,
                "infokewps10_id" => $request->infokewps10_id[$i],
                "kewps3a_id" => $request->kewps3a_id[$i],
            ]);

            foreach ($request->selected as $select) {
                if ($select == $i) {
                    $kewps13->update([
                        'selected' => "selected",
                    ]);
                }
            }
        }

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

        if ($request->selected == null) {
            $kewps13->update(['selected' => null]);
        }

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

    public function generatePdf(Kewps13 $kewps13)
    {

        $kewps13->data = Kewps13::where('selected', 'selected')->get();

        $kewps13['tahun'] = $kewps13->data->first()->infokewps10->kewps10->tahun;

        $kewps13['j_keseluruhan'] = 0;
        $kewps13['j_diverifikasi'] = 0;
        $kewps13['j_tidak_diverifikasi'] = 0;
        $kewps13['j_peratusan_diverifikasi'] = 0;
        $kewps13['A'] = 0;
        $kewps13['B'] = 0;
        $kewps13['C'] = 0;
        $kewps13['D'] = 0;
        $kewps13['E'] = 0;
        $kewps13['F'] = 0;

        foreach ($kewps13->data as $kewps) {
            $kewps['kementerian'] = $kewps->infokewps10->kewps10->kementerian;
            $kewps['kategori_stor'] = $kewps->infokewps10->kewps10->kategori_stor;
            $kewps['diverifikasi'] = $kewps->infokewps10->kuantiti_fizikal_stok;

            $kewps13['j_keseluruhan'] += (int) $kewps->jumlah_kesuluruhan;
            $kewps13['j_diverifikasi'] += (int) $kewps->diverifikasi;
            $kewps13['j_tidak_diverifikasi'] += (int) $kewps->stok_tidak_diverifikasi;
            $kewps13['j_peratusan_diverifikasi'] += (int) $kewps->peratusan_diverifikasi;

            $kewps13['A'] += (int) $kewps->jumlah_stok_A;
            $kewps13['B'] += (int) $kewps->jumlah_stok_B;
            $kewps13['C'] += (int) $kewps->jumlah_stok_C;
            $kewps13['D'] += (int) $kewps->jumlah_stok_D;
            $kewps13['E'] += (int) $kewps->jumlah_stok_E;
            $kewps13['F'] += (int) $kewps->jumlah_stok_F;
        }

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
