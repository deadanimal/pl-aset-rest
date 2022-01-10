<?php

namespace App\Http\Controllers;

use App\Models\SenaraiBinaanLuar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SenaraiBinaanLuarController extends Controller
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
        SenaraiBinaanLuar::create($request->all());
        return redirect('/jkrpataf612/' . $request->jkrpataf612_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenaraiBinaanLuar  $senaraiBinaanLuar
     * @return \Illuminate\Http\Response
     */
    public function show(SenaraiBinaanLuar $senaraiBinaanLuar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenaraiBinaanLuar  $senaraiBinaanLuar
     * @return \Illuminate\Http\Response
     */
    public function edit(SenaraiBinaanLuar $senaraiBinaanLuar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SenaraiBinaanLuar  $senaraiBinaanLuar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SenaraiBinaanLuar $binaanluar)
    {
        $binaanluar->update($request->all());
        return redirect('/jkrpataf612/' . $binaanluar->jkrpataf612_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenaraiBinaanLuar  $senaraiBinaanLuar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenaraiBinaanLuar $binaanluar)
    {
        $binaanluar->delete();
        return redirect('/jkrpataf612/' . $binaanluar->jkrpataf612_id);
    }
}
