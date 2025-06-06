<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokenUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function register(StoreUserRequest $request)
    {
        return User::create($request->all());
    }

    /**
     * Store a newly created token in storage.
     */
    public function createToken(TokenUserRequest $request) {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'errors' => ['Wrong Email or Password']
            ], 401);
        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
