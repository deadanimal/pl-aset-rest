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
      $user = new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->jawatan=$request->jawatan;
      $user->prima_facie=$request->prima_facie;
      $user->ditahan_kerja=$request->ditahan_kerja;

      // HARDCODED PASSWORD
      //
      $user->password=Hash::make("PabloEscobar");
      $user -> save();

      return redirect('/pengguna');

      
    }

    public function show(User $user)
    {
      return $user;
    }

    public function update(Request $request, User $user)
    {

      $user->name=$request->name;
      $user->email=$request->email;
      $user->jawatan=$request->jawatan;
      $user->prima_facie=$request->prima_facie;
      $user->ditahan_kerja=$request->ditahan_kerja;
      $user -> save();

      return redirect('/pengguna');



    }

    public function destroy($user)
    {
      $user = User::find($user)->delete();
      return redirect('/pengguna');

    }
}
