<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps35;
use App\Models\Kewps3a;
use App\Models\Kewps35;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps35Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps35.index', [
            'kewps35' => Kewps35::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps35.create', [
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
        $kewps35 = Kewps35::create($request->all());
        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps35::create([
                'kewps35_id' => $kewps35->id,
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti' => $request->kuantiti[$i],
            ]);
        }
        return redirect('/kewps35');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps35  $kewps35
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps35 $kewps35)
    {
        return view('modul.stor.kewps35.edit', [
            'kewps3a' => Kewps3a::all(),
            'kewps35' => $kewps35,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps35  $kewps35
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps35 $kewps35)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps35  $kewps35
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps35 $kewps35)
    {
        $kewps35->update($request->all());
        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps35::where('id', $request->info35_id[$i])->update([
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti' => $request->kuantiti[$i],
            ]);
        }
        return redirect('/kewps35');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps35  $kewps35
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps35 $kewps35)
    {
        InfoKewps35::where('kewps35_id', $kewps35->id)->delete();
        $kewps35->delete();

        return redirect('/kewps35');
    }
    public function generatePdf(kewps35 $kewps35)
    {

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps35', [$kewps35]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps35",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
