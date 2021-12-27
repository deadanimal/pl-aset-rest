<?php

namespace App\Http\Controllers;

use App\Models\Kewatk22;
use App\Models\Kewatk19;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Kewatk22Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('modul.aset_tak_ketara.kewatk22.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewatk22  $kewatk22
     * @return \Illuminate\Http\Response
     */
    public function show(Kewatk22 $kewatk22)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewatk22  $kewatk22
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewatk22 $kewatk22)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewatk22  $kewatk22
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewatk22 $kewatk22)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewatk22  $kewatk22
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewatk22 $kewatk22)
    {
        //
    }

    public function generatePdf($tahun) {
      $context = (object)[];
      $context->tahun = $tahun;
      $context->kewatk19 = Kewatk19::whereYear('created_at',$tahun)->get();
      $context->jumlah_kuantiti = count(Kewatk19::whereYear('created_at',$tahun)->get());

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk22', [$context]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa20",
      ];

      return view('modul.borang_viewer_atk', $context);



    }

}
