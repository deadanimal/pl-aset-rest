<?php

namespace App\Http\Controllers;

use App\Models\MaklumatAras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MaklumatArasController extends Controller
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
        MaklumatAras::create($request->all());
        return redirect('/dataasetkhusus/' . $request->data_aset_khusus_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaklumatAras  $maklumatAras
     * @return \Illuminate\Http\Response
     */
    public function show(MaklumatAras $maklumatAras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaklumatAras  $maklumatAras
     * @return \Illuminate\Http\Response
     */
    public function edit(MaklumatAras $maklumatAras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaklumatAras  $maklumatAras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaklumatAras $maklumatara)
    {
        $maklumatara->update($request->all());
        return redirect('/dataasetkhusus/' . $maklumatara->data_aset_khusus_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaklumatAras  $maklumatAras
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaklumatAras $maklumatara)
    {
        $maklumatara->delete();
        return redirect('/dataasetkhusus/' . $maklumatara->data_aset_khusus_id);
    }
}
