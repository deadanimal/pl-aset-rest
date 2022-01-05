<?php

namespace App\Http\Controllers;

use App\Models\BahuJalan;
use App\Models\Jalan;
use Illuminate\Http\Request;

class BahuJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.bahujalan.index', [
            'bahujalan' => BahuJalan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.bahujalan.create', [
            'jalan' => Jalan::all()
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
        BahuJalan::create($request->all());
        return redirect('/bahujalan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahuJalan  $bahuJalan
     * @return \Illuminate\Http\Response
     */
    public function show(BahuJalan $bahuJalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BahuJalan  $bahuJalan
     * @return \Illuminate\Http\Response
     */
    public function edit(BahuJalan $bahujalan)
    {
        return view('modul.aset_tak_alih.bahujalan.edit', [
            'jalan' => Jalan::all(),
            'bahujalan' => $bahujalan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BahuJalan  $bahuJalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BahuJalan $bahujalan)
    {
        $bahujalan->update($request->all());
        return redirect('/bahujalan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BahuJalan  $bahuJalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(BahuJalan $bahujalan)
    {
        $bahujalan->delete();
        return redirect('/bahujalan');
    }
}
