<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Models\Plpkpa0102;
use Illuminate\Http\Request;

class JalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.jalan.index', [
            'jalan' => Jalan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.jalan.create', [
            'plpk0102' => Plpkpa0102::all()
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
        Jalan::create($request->all());
        return redirect('/jalan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function show(Jalan $jalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jalan $jalan)
    {
        return view('modul.aset_tak_alih.jalan.edit', [
            'jalan' => $jalan,
            'plpk0102' => Plpkpa0102::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jalan $jalan)
    {
        $jalan->update($request->all());
        return redirect('/jalan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jalan $jalan)
    {
        $jalan->delete();
        return redirect('/jalan');
    }

    public function dashboardIndex() {
        $plpkpa0102 = Plpkpa0102::all();
        return view('modul.aset_tak_alih.plpkpa0102.dashboard', [
            'plpkpa0102' => $plpkpa0102,
            'total_count' => count($plpkpa0102)
        ]);
    }
}
