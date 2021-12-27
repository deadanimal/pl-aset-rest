<?php

namespace App\Http\Controllers;

use App\Models\Kewatk20;
use App\Models\Kewatk19;
use App\Models\Kewatk3a;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Kewatk20Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $context = [
        "kewatk3a" => Kewatk3a::all(),
        "kewatk19" => Kewatk19::all(),
        "kewatk20" => Kewatk20::all(),
      ];
      return view('modul.aset_tak_ketara.kewatk20.index', $context);
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
      Kewatk20::create($request->all());
      return redirect('/kewatk20/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewatk20  $kewatk20
     * @return \Illuminate\Http\Response
     */
    public function show(Kewatk20 $kewatk20)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewatk20  $kewatk20
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewatk20 $kewatk20)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewatk20  $kewatk20
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewatk20 $kewatk20)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewatk20  $kewatk20
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewatk20 $kewatk20)
    {
        //
    }

    public function generatePdf(Kewatk20 $kewatk20) {

      $response = Http::post('https://libreoffice.prototype.com.my/cetak/atk20', [$kewatk20]);

      $res = $response->getBody()->getContents();
      $url = "data:application/pdf;base64,".$res;

      $context = [
        "url" => $url,
        "title" => "Kewpa20",
      ];

      return view('modul.borang_viewer_atk', $context);



    }

}
