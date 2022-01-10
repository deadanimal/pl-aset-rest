<?php

namespace App\Http\Controllers;

use App\Models\PerundingLuarPremis;
use Illuminate\Http\Request;

class PerundingLuarPremisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        PerundingLuarPremis::create($request->all());
        return redirect('/dakbinaanluar/' . $request->data_aset_khusus_binaan_luar_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerundingLuarPremis  $perundingLuarPremis
     * @return \Illuminate\Http\Response
     */
    public function show(PerundingLuarPremis $perundingLuarPremis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerundingLuarPremis  $perundingLuarPremis
     * @return \Illuminate\Http\Response
     */
    public function edit(PerundingLuarPremis $perundingLuarPremis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerundingLuarPremis  $perundingLuarPremis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerundingLuarPremis $perundingbl)
    {
        $perundingbl->update($request->all());
        return redirect('/dakbinaanluar/' . $perundingbl->data_aset_khusus_binaan_luar_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerundingLuarPremis  $perundingLuarPremis
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerundingLuarPremis $perundingbl)
    {
        $perundingbl->delete();
        return redirect('/dakbinaanluar/' . $perundingbl->data_aset_khusus_binaan_luar_id);
    }
}
