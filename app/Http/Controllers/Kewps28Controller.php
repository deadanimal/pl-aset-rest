<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps28;
use App\Models\Kewps26;
use App\Models\Kewps28;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps28Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps28.index', [
            'kewps28' => Kewps28::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps28.create', [
            'kewps26' => Kewps26::all(),
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
        $kewps28 = Kewps28::create($request->all());

        foreach (range(0, count($request->kewps26_id) - 1) as $i) {
            InfoKewps28::create([
                'kewps28_id' => $kewps28->id,
                'kewps26_id' => $request->kewps26_id[$i],
                'kod_penyebut_harga' => $request->kod_penyebut_harga[$i],
                'harga' => $request->harga[$i],
            ]);
        }
        return redirect('/kewps28');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps28  $kewps28
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps28 $kewps28)
    {
        return view('modul.stor.kewps28.edit', [
            'kewps26' => Kewps26::all(),
            'kewps28' => $kewps28,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps28  $kewps28
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps28 $kewps28)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps28  $kewps28
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps28 $kewps28)
    {
        $kewps28->update($request->all());
        foreach (range(0, count($request->kewps26_id) - 1) as $i) {
            InfoKewps28::where('id', $request->info28_id[$i])->update([
                'kewps26_id' => $request->kewps26_id[$i],
                'kod_penyebut_harga' => $request->kod_penyebut_harga[$i],
                'harga' => $request->harga[$i],
            ]);
        }

        return redirect('/kewps28');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps28  $kewps28
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps28 $kewps28)
    {
        InfoKewps28::where('kewps28_id', $kewps28->id)->delete();
        $kewps28->delete();

        return redirect('/kewps28');
    }

    public function generatePdf(Kewps28 $kewps28)
    {

        $kewps28->tarikh = $kewps28->created_at->format('d/m/Y');

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps28', [$kewps28]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps28",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
