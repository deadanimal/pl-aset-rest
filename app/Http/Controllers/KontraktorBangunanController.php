<?php

namespace App\Http\Controllers;

use App\Models\KontraktorBangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class KontraktorBangunanController extends Controller
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
        KontraktorBangunan::create($request->all());
        return redirect('/dataasetkhusus/' . $request->data_aset_khusus_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KontraktorBangunan  $kontraktorBangunan
     * @return \Illuminate\Http\Response
     */
    public function show(KontraktorBangunan $kontraktorBangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KontraktorBangunan  $kontraktorBangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(KontraktorBangunan $kontraktorBangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KontraktorBangunan  $kontraktorBangunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KontraktorBangunan $kontraktorbangunan)
    {
        $kontraktorbangunan->update($request->all());
        return redirect('/dataasetkhusus/' . $kontraktorbangunan->data_aset_khusus_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KontraktorBangunan  $kontraktorBangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KontraktorBangunan $kontraktorbangunan)
    {
        $kontraktorbangunan->delete();
        return redirect('/dataasetkhusus/' . $kontraktorbangunan->data_aset_khusus_id);
    }
}
