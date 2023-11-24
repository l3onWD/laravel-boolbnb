<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {

        $credencials = $request->all();

        if (Auth::attempt($credencials)) {
            return response(Auth::user(), 200);
        }

        return response('login failed', 401);
    }


    public function logout()
    {

        Auth::logout();

        return response(null, 204);
    }
}
