<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;

class LoginController extends Controller
{
    
    public function login(StoreLoginRequest $request)
    {
        $credentials = $request->validated();

        if (! $token = auth()->attempt($credentials)) {
            return jsonResponse( status: 401, message:'Unauthorized');
        }

        return jsonResponse(
            data:[
                'access_token' => $token,
                'expires_in' => auth()->factory()->getTTL() * 60
            ],
        );
    }
}
