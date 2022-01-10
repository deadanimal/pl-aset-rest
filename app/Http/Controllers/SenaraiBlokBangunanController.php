<?php

namespace App\Http\Controllers;

use App\Models\SenaraiBlokBangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SenaraiBlokBangunanController extends Controller
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
        SenaraiBlokBangunan::create($request->all());
        return redirect('/jkrpataf612/' . $request->jkrpataf612_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenaraiBlokBangunan  $senaraiBlokBangunan
     * @return \Illuminate\Http\Response
     */
    public function show(SenaraiBlokBangunan $senaraiBlokBangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenaraiBlokBangunan  $senaraiBlokBangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(SenaraiBlokBangunan $senaraiBlokBangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SenaraiBlokBangunan  $senaraiBlokBangunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SenaraiBlokBangunan $blokbangunan)
    {
        $blokbangunan->update($request->all());
        return redirect('/jkrpataf612/' . $blokbangunan->jkrpataf612_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenaraiBlokBangunan  $senaraiBlokBangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenaraiBlokBangunan $blokbangunan)
    {
        $blokbangunan->delete();
        return redirect('/jkrpataf612/' . $blokbangunan->jkrpataf612_id);
    }
}
