<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps26;
use App\Models\Kewps3a;
use App\Models\Kewps26;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewps26Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps26.index', [
            'kewps26' => Kewps26::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps26.create', [
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
        $kewps26 = Kewps26::create($request->all());
        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps26::create([
                'kewps26_id' => $kewps26->id,
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti' => $request->kuantiti[$i],
                'harga_simpanan' => $request->harga_simpanan[$i],
            ]);
        }

        return redirect('/kewps26');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps26  $kewps26
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps26 $kewps26)
    {
        return view('modul.stor.kewps26.edit', [
            'kewps3a' => Kewps3a::all(),
            'kewps26' => $kewps26,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps26  $kewps26
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps26 $kewps26)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps26  $kewps26
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps26 $kewps26)
    {
        $kewps26->update($request->all());

        foreach (range(0, count($request->kewps3a_id) - 1) as $i) {
            InfoKewps26::where('id', $request->info26_id[$i])->update([
                'kewps3a_id' => $request->kewps3a_id[$i],
                'kuantiti' => $request->kuantiti[$i],
                'harga_simpanan' => $request->harga_simpanan[$i],
            ]);
        }
        return redirect('/kewps26');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps26  $kewps26
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps26 $kewps26)
    {
        InfoKewps26::where('kewps26_id', $kewps26->id)->delete();
        $kewps26->delete();

        return redirect('/kewps26');
    }

    public function generatePdf(Kewps26 $kewps26)
    {

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps26', [$kewps26]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps26",
        ];

        return view('modul.borang_viewer_ps', $context);

    }
}
