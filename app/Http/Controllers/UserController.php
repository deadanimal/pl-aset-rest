<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $penggunas = User::all();
        $context = [
            "penggunas" => $penggunas,
        ];

        return view('modul.umum.pengguna.index', $context);

    }

    public function create()
    {
        return view('modul.umum.pengguna.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'email',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($request->kunci == null) {
            $request['kunci'] = 0;
        }
        if ($request->nyahaktif == null) {
            $request['nyahaktif'] = 0;
        }

        if ($request->jawatan = 0) {
            $request['jawatan'] = "Staff";
        }
        $request['prima_facie'] = "Management";
        $request['ditahan_kerja'] = "Tidak";
        $request['status'] = "Aktif";

        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        return redirect('/pengguna');

    }

    public function show(User $pengguna)
    {
        return view('modul.umum.pengguna.edit', [
            'pengguna' => $pengguna,
        ]);
    }

    public function update(Request $request, $user)
    {
        $user = User::where('id', $user)->first();

        $user->update($request->all());
        return redirect('/pengguna');

    }

    public function edit(User $pengguna)
    {
        $password = Hash::make("abc123");

        $pengguna->update(['password' => $password]);

        return redirect('/pengguna');
    }

    public function destroy($user)
    {
        $user = User::find($user)->delete();
        return redirect('/pengguna');

    }
}
