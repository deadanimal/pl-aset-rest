<?php

namespace App\Http\Controllers;

use App\Models\Kewps3a;
use App\Models\Kewps5;
use Illuminate\Http\Request;

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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewps5  $kewps5
     * @return \Illuminate\Http\Response
     */
    public function show(Kewps5 $kewps5)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewps5  $kewps5
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewps5 $kewps5)
    {
        //
    }
}
