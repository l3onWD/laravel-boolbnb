<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        // Get credentials
        $credentials = $request->all();

        // Validate
        $validator = Validator::make(
            $credentials,
            [
                'email' => 'required|email',
                'password' => 'required|min:5'
            ],
            [
                'email.required' => 'La mail è obbligatoria',
                'email.email' => 'La mail inserita non è valida',
                'password.required' => 'La password è obbligatoria',
            ]
        );

        // Validation Fail
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Attempt Login
        if (Auth::attempt($credentials)) {
            return response(Auth::user(), 200);
        }

        // Unauthorized
        return response('login-failed', 401);
    }


    public function logout()
    {

        Auth::logout();

        return response(null, 204);
    }
}
