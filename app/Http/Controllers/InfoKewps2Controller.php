<?php

namespace App\Http\Controllers;

use App\Models\InfoKewps1;
use App\Models\InfoKewps2;
use Illuminate\Http\Request;

class InfoKewps2Controller extends Controller
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
        $infokewps1 = InfoKewps1::firstWhere('id', $request->infokewps1_id);
        $request['kuantiti_kurang_lebih'] = $infokewps1->kuantiti_diterima - $request->kuantiti_ditolak;
        InfoKewps2::create($request->all());
        return redirect("/kewps2/" . $request->kewps2_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoKewps2  $infoKewps2
     * @return \Illuminate\Http\Response
     */
    public function show(InfoKewps2 $infoKewps2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoKewps2  $infoKewps2
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoKewps2 $infoKewps2)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoKewps2  $infoKewps2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoKewps2 $infokewps2)
    {
        $request['kuantiti_kurang_lebih'] = $infokewps2->infokewps1->kuantiti_diterima - $request->kuantiti_ditolak;

        $infokewps2->update($request->all());

        return redirect("/kewps2/" . $infokewps2->kewps2_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoKewps2  $infoKewps2
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoKewps2 $infokewps2)
    {

        $infokewps2->delete();

        return redirect("/kewps2/" . $infokewps2->kewps2_id);
    }
}
