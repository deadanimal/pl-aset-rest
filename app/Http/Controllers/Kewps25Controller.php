<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps25;
use App\Models\Kewps23;
use App\Models\Kewps25;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps25Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps25.index', [
            'kewps25' => Kewps25::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps25.create', [
            'kewps23' => Kewps23::all(),
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
        $kewps25 = Kewps25::create($request->all());
        foreach (range(0, count($request->kewps23_id) - 1) as $i) {
            InfoKewps25::create([
                'kewps25_id' => $kewps25->id,
                'kewps23_id' => $request->kewps23_id[$i],
                'kod_petender' => $request->kod_petender[$i],
                'harga' => $request->harga[$i],
            ]);
        }

        return redirect('/kewps25');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps25  $kewps25
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps25 $kewps25)
    {
        return view('modul.stor.kewps25.edit', [
            'kewps23' => Kewps23::all(),
            'kewps25' => $kewps25,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps25  $kewps25
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps25 $kewps25)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps25  $kewps25
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps25 $kewps25)
    {
        $kewps25->update($request->all());
        foreach (range(0, count($request->info25_id) - 1) as $i) {
            InfoKewps25::where('id', $request->info25_id[$i])->update([
                'kewps23_id' => $request->kewps23_id[$i],
                'kod_petender' => $request->kod_petender[$i],
                'harga' => $request->harga[$i],
            ]);
        }
        return redirect('/kewps25');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps25  $kewps25
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps25 $kewps25)
    {
        InfoKewps25::where('kewps25_id', $kewps25->id)->delete();
        $kewps25->delete();

        return redirect('/kewps25');
    }

    public function generatePdf(Kewps25 $kewps25)
    {

        $kewps25->tarikh = $kewps25->created_at->format('d/m/Y');

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps25', [$kewps25]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps25",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
