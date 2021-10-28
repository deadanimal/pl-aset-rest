<?php

namespace App\Http\Controllers;

use App\Models\Kewatk3aPenempatan;
use Illuminate\Http\Request;

class Kewatk3aPenempatanController extends Controller
{
    public function index()
    {
      return Kewatk3aPenempatan::all();
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
     * @param  \App\Models\Kewatk3aPenempatan  $kewatk3aPenempatan
     * @return \Illuminate\Http\Response
     */
    public function show($id_kewatk3a)
    {
      return kewatk3aPenempatan::where('kewatk3a_id', $id_kewatk3a)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewatk3aPenempatan  $kewatk3aPenempatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewatk3aPenempatan $kewatk3aPenempatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewatk3aPenempatan  $kewatk3aPenempatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewatk3aPenempatan $kewatk3aPenempatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewatk3aPenempatan  $kewatk3aPenempatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewatk3aPenempatan $kewatk3aPenempatan)
    {
        //
    }
}
