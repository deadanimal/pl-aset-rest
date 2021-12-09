<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
      $penggunas = User::all();
      $context = [
        "penggunas" => $penggunas
      ];

      return view('modul.umum.pengguna.index', $context);

    }

    public function store(Request $request)
    {
      $request['password'] = Hash::make("PabloEscobar");
      $user = User::create($request->all());

      return redirect('/pengguna');

      
    }

    public function show(User $user)
    {
      return $user;
    }

    public function update(Request $request, $user)
    {
      $user = User::where('id', $user)->first();

      $user->update($request->all());
      return redirect('/pengguna');



    }

    public function destroy($user)
    {
      $user = User::find($user)->delete();
      return redirect('/pengguna');

    }
}
