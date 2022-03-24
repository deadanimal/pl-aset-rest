<?php

namespace App\Http\Controllers;

use App\Models\KaedahPelupusan;
use App\Models\SubKaedahPelupusan;
use Illuminate\Http\Request;

class FixingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fixing', [
            'kaedahPelupusan' => KaedahPelupusan::all(),
            'subKaedah' => SubKaedahPelupusan::all(),
        ]);
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
        SubKaedahPelupusan::create($request->all());
        return redirect('/fixing');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kaedah = KaedahPelupusan::find($id);

        $kaedah->update($request->all());
        return redirect('/fixing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kaedah = KaedahPelupusan::find($id);
        $kaedah->delete();
        return redirect('/fixing');

    }
}
