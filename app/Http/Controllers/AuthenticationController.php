<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(
                [
                    'message' => 'Sila masukkan emel dan kata laluan yang sah.',
                ],
                401,
            );
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user
        ]);
    }

    public function logout()
    {
        dd(Auth()->user());

        auth()
            ->user()
            ->tokens()
            ->delete();

        return [
            'message' => 'Tokens Revoked',
        ];
    }

    public function get_auth_user(Request $request)
    {
        $token_from_fe = $request->bearer_token;
        $token = PersonalAccessToken::findToken($token_from_fe);
        $user = $token->tokenable;

        return response()->json($user);
    }
}
