<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps11;
use App\Models\Kewps11;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps11Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps11.index', [
            'kewps11' => Kewps11::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps11.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kewps11 = Kewps11::create($request->all());

        if ($request->skala_prestasi) {
            foreach (range(0, count($request->skala_prestasi) - 1) as $i) {
                InfoKewps11::create([
                    'kewps11_id' => $kewps11->id,
                    'skala_prestasi' => $request->skala_prestasi[$i],
                    'penemuan_ulasan' => $request->penemuan_ulasan[$i],
                ]);
            }
        }

        return redirect('/kewps11');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps11  $kewps11
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps11 $kewps11)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps11  $kewps11
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps11 $kewps11)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps11  $kewps11
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps11 $kewps11)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps11  $kewps11
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps11 $kewps11)
    {
        $kewps11->delete();
        InfoKewps11::where('kewps11_id', $kewps11->id)->delete();
        return redirect('/kewps11');
    }

    public function generatePdf(Kewps11 $kewps11)
    {

        $kewps11->d = InfoKewps11::where('kewps11_id', $kewps11->id)->get();

        $k0 = count(InfoKewps11::where('kewps11_id', $kewps11->id)->where('skala_prestasi', 'TB')->get());
        $k1 = count(InfoKewps11::where('kewps11_id', $kewps11->id)->where('skala_prestasi', '1')->get());
        $k2 = count(InfoKewps11::where('kewps11_id', $kewps11->id)->where('skala_prestasi', '2')->get());
        $k3 = count(InfoKewps11::where('kewps11_id', $kewps11->id)->where('skala_prestasi', '3')->get());
        $k4 = count(InfoKewps11::where('kewps11_id', $kewps11->id)->where('skala_prestasi', '4')->get());
        $k5 = count(InfoKewps11::where('kewps11_id', $kewps11->id)->where('skala_prestasi', '5')->get());
        $t = count(InfoKewps11::where('kewps11_id', $kewps11->id)->where('skala_prestasi', '!=', 'TB')->get());

        $kewps11->jumlah_tb = $k0;
        $kewps11->jumlah_1 = $k1;
        $kewps11->jumlah_2 = $k2;
        $kewps11->jumlah_3 = $k3;
        $kewps11->jumlah_4 = $k4;
        $kewps11->jumlah_5 = $k5;

        $total = $k1 + ($k2 * 2) + $k3 * 3 + $k4 * 4 + $k5 * 5;

        $t = $t * 5;

        $result = ($total / $t) * 100;

        $kewps11->result = $result;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps11', [$kewps11]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "Kewps11",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
