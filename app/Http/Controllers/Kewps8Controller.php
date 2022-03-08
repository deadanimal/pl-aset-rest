<?php

namespace App\Http\Controllers;

use App\Models\Kewps3a;
use App\Models\Kewps8;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps8.index', [
            'kewps8' => Kewps8::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps8.create', [
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
        foreach ($request->sebelum as $key => $s) {
            if ($request->kuantiti_dimohon[$key] > $s) {
                notify()->error('Kuantiti Sebelum melebihi kuantiti dimohon', 'Gagal');
                return redirect()->back();
            }
        }

        for ($i = 0; $i < count($request->kuantiti_dimohon); $i++) {

            Kewps8::create([
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti_dimohon' => $request->kuantiti_dimohon[$i],
                'catatan_pemohon' => $request->catatan_pemohon[$i],
                'pemohon_id' => $request->pemohon_id,
                'status' => "DIPOHON",
            ]);
        }

        return redirect('/kewps8');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps8  $kewps8
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps8 $kewps8)
    {
        return view('modul.stor.kewps8.edit', [
            'kewps8' => $kewps8,
            'kewps3a' => Kewps3a::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps8  $kewps8
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps8 $kewps8)
    {

        return view('modul.stor.kewps8.status', ['kewps8' => $kewps8]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps8  $kewps8
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps8 $kewps8)
    {

        if ($request->kuantiti_diluluskan > $kewps8->kuantiti_dimohon) {
            notify()->error('Kuantiti Diluluskan Melebihi Kuantiti Dimohon', 'Gagal');
            return redirect()->back();
        }

        if ($kewps8->kuantiti_diluluskan != null) {
            if ($request->kuantiti_diterima > $kewps8->kuantiti_diluluskan) {
                notify()->error('Kuantiti Diluluskan Melebihi Kuantiti Dimohon', 'Gagal');
                return redirect()->back();
            }
        }

        $kewps8->update($request->all());
        return redirect('/kewps8');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps8  $kewps8
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps8 $kewps8)
    {
        $kewps8->delete();
        return redirect('/kewps8');
    }

    public function generatePdf(Kewps8 $kewps8)
    {
        $kewps8->data = Kewps8::where('status', "DITERIMA")->get();

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps8', [$kewps8]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps8",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
