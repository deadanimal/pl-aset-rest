<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps20;
use App\Models\Kewps3a;
use App\Models\Kewps29;
use App\Models\Kewps30;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Kewps30Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = "sadsad\\n\\nTamat\}";

        dd(Str::contains($a, 'Tamat'));

        return view('modul.stor.kewps30.index', [
            'kewps30' => Kewps30::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infokewps20 = InfoKewps20::where('cara', 'Lelong')->get();
        return view('modul.stor.kewps30.create', [
            'kewps29' => Kewps29::all(),
            'kewps3a' => Kewps3a::all(),
            'infokewps20' => $infokewps20,
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

        for ($i = 0; $i < count($request->kewps3a_id); $i++) {
            Kewps30::create([
                'kewps29_id' => $request->kewps29_id[$i],
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti' => $request->kuantiti[$i],
                'harga_simpanan' => $request->harga_simpanan[$i],
                'deposit' => $request->deposit[$i],
            ]);
        }
        return redirect('/kewps30');
    }

    public function getDinamic(Request $request)
    {
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps30  $kewps30
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps30 $kewps30)
    {
        return view('modul.stor.kewps30.edit', [
            'kewps30' => $kewps30,
            'kewps3a' => Kewps3a::all(),
            'kewps29' => Kewps29::all(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps30  $kewps30
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps30 $kewps30)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps30  $kewps30
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps30 $kewps30)
    {
        $kewps30->update($request->all());
        return redirect('/kewps30');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps30  $kewps30
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps30 $kewps30)
    {
        $kewps30->delete();
        return redirect('/kewps30');
    }

    public function generatePdf(Kewps30 $kewps30)
    {
        $kewps30->data = $kewps30->all();

        $kewps30->jabatan = $kewps30->first()->kewps29->agensi;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps30', [$kewps30]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps30",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
