<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $credentials = json_decode($request->getContent(), true);

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('API Token')->plainTextToken;

            return response()->json([
                'message' => 'SUCCESS',
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'message' => "BAD CREDENTIALS"
            ], 401);
        }
    }
}
