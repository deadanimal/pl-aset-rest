<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps27;
use App\Models\Kewps26;
use App\Models\Kewps27;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps27Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps27.index', [
            'kewps27' => Kewps27::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps27.create', [
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
        $kewps27 = Kewps27::create($request->all());

        foreach (range(0, count($request->kewps26_id) - 1) as $i) {
            InfoKewps27::create([
                'kewps27_id' => $kewps27->id,
                'kewps26_id' => $request->kewps26_id[$i],
                'kuantiti' => $request->kuantiti[$i],
                'harga_tawaran' => $request->harga_tawaran[$i],
                'deposit' => $request->deposit2[$i],
            ]);
        }
        return redirect('/kewps27');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps27  $kewps27
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps27 $kewps27)
    {
        return view('modul.stor.kewps27.edit', [
            'kewps27' => $kewps27,
            'kewps26' => Kewps26::all(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps27  $kewps27
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps27 $kewps27)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps27  $kewps27
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps27 $kewps27)
    {
        $kewps27->update($request->all());

        foreach (range(0, count($request->kewps26_id) - 1) as $i) {
            InfoKewps27::where('id', $request->info27_id[$i])->update([
                'kewps27_id' => $kewps27->id,
                'kewps26_id' => $request->kewps26_id[$i],
                'kuantiti' => $request->kuantiti[$i],
                'harga_tawaran' => $request->harga_tawaran[$i],
                'deposit' => $request->deposit2[$i],
            ]);
        }

        return redirect('/kewps27');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps27  $kewps27
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps27 $kewps27)
    {
        InfoKewps27::where('kewps27_id', $kewps27->id)->delete();
        $kewps27->delete();

        return redirect('/kewps27');
    }

    public function generatePdf(Kewps27 $kewps27)
    {

        foreach ($kewps27->infokewps27 as $i27) {
            foreach ($i27->kewps26->infokewps26 as $i26) {
                $i27->perihal_stok = $i26->kewps3a->perihal_stok;
            }
        }

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps27', [$kewps27]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps27",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
