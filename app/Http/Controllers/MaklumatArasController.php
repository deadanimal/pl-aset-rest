<?php

namespace App\Http\Controllers;

use App\Models\DataAsetKhusus;
use App\Models\MaklumatAras;
use Illuminate\Http\Request;

class MaklumatArasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.maklumatAras.index', [
            'maklumatAras' => MaklumatAras::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.maklumatAras.create', [
            'dakbb' => DataAsetKhusus::all(),
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
        MaklumatAras::create($request->all());
        return redirect('/maklumataras');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaklumatAras  $maklumatAras
     * @return \Illuminate\Http\Response
     */
    public function show(MaklumatAras $maklumatara)
    {
        return view('modul.aset_tak_alih.maklumatAras.edit', [
            'dakbb' => DataAsetKhusus::all(),
            'ma' => $maklumatara,
        ]);
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
        return redirect('/maklumataras');
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
        return redirect('/maklumataras');
    }
}
