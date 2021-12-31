<?php

namespace App\Http\Controllers;

use App\Models\UnitUkuranStor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UnitUkuranStorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.umum.unit_ukuran_stor.index', [
            'unit' => UnitUkuranStor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UnitUkuranStor::create($request->all());
        return redirect('/unit_ukuran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitUkuranStor  $unitUkuranStor
     * @return \Illuminate\Http\Response
     */
    public function show(UnitUkuranStor $unit_ukuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitUkuranStor  $unitUkuranStor
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitUkuranStor $unit_ukuran)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitUkuranStor  $unitUkuranStor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitUkuranStor $unit_ukuran)
    {
        $unit_ukuran->update($request->all());
        return redirect('/unit_ukuran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitUkuranStor  $unitUkuranStor
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitUkuranStor $unit_ukuran)
    {
        $unit_ukuran->delete();
        return redirect('/unit_ukuran');
    }
}
