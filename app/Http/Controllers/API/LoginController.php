<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            
            $user = Auth::user();
            $user->token = $user->createToken('token')->accessToken;

            return response()->json([
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'error'=>'Unauthorised',
            ], 401);
        }
    }
}
