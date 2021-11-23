<?php

namespace App\Http\Controllers;

use App\Models\Kewatk21;
use App\Models\User;
use App\Models\Kewatk19;
use Illuminate\Http\Request;

class Kewatk21Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $context = [
        "kewatk21" => Kewatk21::all(),
        "users" => User::all(),
        "kewatk19" => Kewatk19::all(),
      ];
      return view('modul.aset_tak_ketara.kewatk21.index', $context);
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
      Kewatk21::create($request->all());
      return redirect('/kewatk21/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kewatk21  $kewatk21
     * @return \Illuminate\Http\Response
     */
    public function show(Kewatk21 $kewatk21)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kewatk21  $kewatk21
     * @return \Illuminate\Http\Response
     */
    public function edit(Kewatk21 $kewatk21)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kewatk21  $kewatk21
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kewatk21 $kewatk21)
    {
      $kewatk21->update($request->all());
      return redirect('/kewatk21/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kewatk21  $kewatk21
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kewatk21 $kewatk21)
    {
      $kewatk21->delete();
      return redirect('/kewatk21/');
    }
}
