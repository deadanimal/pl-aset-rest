<?php

namespace App\Http\Controllers;

use App\Models\Plpkpa0102;
use Illuminate\Http\Request;

class Plpkpa0102Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modul.aset_tak_alih.plpkpa0102.index', [
            'plpkpa0102' => Plpkpa0102::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul.aset_tak_alih.plpkpa0102.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Plpkpa0102::create($request->all());
        return redirect('/plpkpa0102');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plpkpa0102  $plpkpa0102
     * @return \Illuminate\Http\Response
     */
    public function show(Plpkpa0102 $plpkpa0102)
    {
        return view('modul.aset_tak_alih.plpkpa0102.edit', [
            'plpkpa0102' => $plpkpa0102,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plpkpa0102  $plpkpa0102
     * @return \Illuminate\Http\Response
     */
    public function edit(Plpkpa0102 $plpkpa0102)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plpkpa0102  $plpkpa0102
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plpkpa0102 $plpkpa0102)
    {
        $plpkpa0102->update($request->all());
        return redirect('\plpkpa0102');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plpkpa0102  $plpkpa0102
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plpkpa0102 $plpkpa0102)
    {
        $plpkpa0102->delete();
        return redirect('\plpkpa0102');
    }
}
