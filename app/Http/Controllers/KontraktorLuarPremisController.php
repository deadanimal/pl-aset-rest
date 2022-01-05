<?php

namespace App\Http\Controllers;

use App\Models\KontraktorLuarPremis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class KontraktorLuarPremisController extends Controller
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
        KontraktorLuarPremis::create($request->all());
        return redirect('/dakbinaanluar/' . $request->data_aset_khusus_binaan_luar_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KontraktorLuarPremis  $kontraktorLuarPremis
     * @return \Illuminate\Http\Response
     */
    public function show(KontraktorLuarPremis $kontraktorLuarPremis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KontraktorLuarPremis  $kontraktorLuarPremis
     * @return \Illuminate\Http\Response
     */
    public function edit(KontraktorLuarPremis $kontraktorLuarPremis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KontraktorLuarPremis  $kontraktorLuarPremis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KontraktorLuarPremis $kontraktorbl)
    {
        $kontraktorbl->update($request->all());
        return redirect('/dakbinaanluar/' . $kontraktorbl->data_aset_khusus_binaan_luar_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KontraktorLuarPremis  $kontraktorLuarPremis
     * @return \Illuminate\Http\Response
     */
    public function destroy(KontraktorLuarPremis $kontraktorbl)
    {
        $kontraktorbl->delete();
        return redirect('/dakbinaanluar/' . $kontraktorbl->data_aset_khusus_binaan_luar_id);
    }
}
