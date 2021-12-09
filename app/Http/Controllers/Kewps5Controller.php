<?php

namespace App\Http\Controllers;

use App\Models\Kewps3a;
use App\Models\Kewps5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Kewps5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.stor.kewps5.index', [
            'kewps5' => Kewps5::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.stor.kewps5.create', [
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
        Kewps5::create($request->all());
        $this->calculatePurata();
        return redirect('/kewps5');
    }

    public function calculatePurata()
    {
        $k5 = Kewps5::all();
        $total_pp = 0;
        foreach ($k5 as $k) {
            $total_pp = $total_pp + $k->purata_pembelian;
        }
        if ($total_pp != 0) {
            foreach ($k5 as $k) {
                $purata = ($k->purata_pembelian / $total_pp) * 100;
                Kewps5::where('id', $k->id)->update(['peratusan' => $purata]);
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps5  $kewps5
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps5 $kewps5)
    {
        return view('modul.stor.kewps5.edit', [
            'kewps3a' => Kewps3a::all(),
            'kewps5' => $kewps5,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewps5  $kewps5
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewps5 $kewps5)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewps5  $kewps5
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewps5 $kewps5)
    {
        $kewps5->update($request->all());
        $this->calculatePurata();
        return redirect('kewps5');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps5  $kewps5
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps5 $kewps5)
    {
        $kewps5->delete();
        $this->calculatePurata();
        return redirect('kewps5');
    }

    public function generatePdf(kewps5 $kewps5)
    {
        $kewps5->data = $kewps5->all();

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/kps5', [$kewps5]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        $context = [
            "url" => $url,
            "title" => "kewps5",
        ];

        return view('modul.borang_viewer_ps', $context);
    }
}
