<?php

namespace App\Http\Controllers;

use App\Models\ParasStok;
use Illuminate\Http\Request;

class ParasStokController extends Controller
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
        ParasStok::create($request->all());
        return redirect('/kewps3a/' . $request->kewps3a_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParasStok  $parasStok
     * @return \Illuminate\Http\Response
     */
    public function show(ParasStok $parasStok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParasStok  $parasStok
     * @return \Illuminate\Http\Response
     */
    public function edit(ParasStok $parasStok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParasStok  $parasStok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParasStok $parasstok)
    {
        $parasstok->update($request->all());
        return redirect('/kewps3a/' . $parasstok->kewps3a_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParasStok  $parasStok
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParasStok $parasstok)
    {
        $parasstok->delete();
        return redirect('/kewps3a/' . $parasstok->kewps3a_id);
    }
}
