<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps20;
use App\Models\InfoKewps23;
use App\Models\Kewps3a;
use App\Models\Kewps23;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps23Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps23.index', [
            'kewps23' => Kewps23::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infokewps20 = InfoKewps20::where('cara', 'Tender')->get();

        return view('modul.stor.kewps23.create', [
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
        $kewps23 = Kewps23::create($request->all());

        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps23::create([
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kewps23_id' => $kewps23->id,
                'kuantiti' => $request->kuantiti[$i],
                'harga_simpanan' => $request->harga_simpanan[$i],
            ]);
        }

        return redirect('/kewps23');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps23  $kewps23
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps23 $kewps23)
    {
        return view('modul.stor.kewps23.edit', [
            'kewps23' => $kewps23,
            'kewps3a' => Kewps3a::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps23  $kewps23
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps23 $kewps23)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps23  $kewps23
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps23 $kewps23)
    {
        $kewps23->update($request->all());

        if ($kewps23->infokewps23) {
            foreach (range(0, count($request->info23_id) - 1) as $i) {
                InfoKewps23::where('id', $request->info23_id[$i])->update([
                    'kewps3a_id' => $request->kewps3a_id[$i],
                    'kuantiti' => $request->kuantiti[$i],
                    'harga_simpanan' => $request->harga_simpanan[$i],
                ]);
            }
        }
        return redirect('/kewps23');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps23  $kewps23
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps23 $kewps23)
    {
        InfoKewps23::where('kewps23_id', $kewps23->kewps23_id)->delete();
        $kewps23->delete();
        return redirect('/kewps23');
    }

    public function generatePdf(Kewps23 $kewps23)
    {

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps23', [$kewps23]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps23",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
