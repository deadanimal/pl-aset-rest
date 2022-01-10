<?php

namespace App\Http\Controllers;

use App\Models\PerundingBangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PerundingBangunanController extends Controller
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
        PerundingBangunan::create($request->all());
        return redirect('/dataasetkhusus/' . $request->data_aset_khusus_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerundingBangunan  $perundingBangunan
     * @return \Illuminate\Http\Response
     */
    public function show(PerundingBangunan $perundingBangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerundingBangunan  $perundingBangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(PerundingBangunan $perundingBangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerundingBangunan  $perundingBangunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerundingBangunan $perundingbangunan)
    {
        $perundingbangunan->update($request->all());
        return redirect('/dataasetkhusus/' . $perundingbangunan->data_aset_khusus_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerundingBangunan  $perundingBangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerundingBangunan $perundingbangunan)
    {
        $perundingbangunan->delete();
        return redirect('/dataasetkhusus/' . $perundingbangunan->data_aset_khusus_id);
    }
}
