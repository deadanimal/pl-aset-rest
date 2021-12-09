<?php

namespace App\Http\Controllers;

use App\Models\InfoKewatk19;
use Illuminate\Http\Request;

class InfoKewatk19Controller extends Controller
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
      InfoKewatk19::create($request->all());
      return redirect('/kewatk19/'.$request->kewatk19_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoKewatk19  $infoKewatk19
     * @return \Illuminate\Http\Response
     */
    public function show(InfoKewatk19 $infoKewatk19)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoKewatk19  $infoKewatk19
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoKewatk19 $infoKewatk19)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoKewatk19  $infoKewatk19
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoKewatk19 $infoKewatk19)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoKewatk19  $infoKewatk19
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoKewatk19 $infoKewatk19)
    {
      echo "SS";
      return $infoKewatk19->delete();
    }
}
