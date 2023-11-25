<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // Register
    public function register(Request $request)
    {

        // Validate
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'nullable|string|max:255',
                'surname' => 'nullable|string|max:255',
                'date_of_birth' => 'nullable|date',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:5',

            ],
            [
                'name.string' => 'Il nome non è valido',
                'name.max' => 'Il nome deve essere lungo massimo :max caratteri',

                'surname.string' => 'Il cognome non è valido',
                'surname.max' => 'Il cognome deve essere lungo massimo :max caratteri',

                'date_of_birth.date' => 'La data di nascita non è valida',

                'email.required' => 'La mail è obbligatoria',
                'email.email' => 'La mail inserita non è valida',
                'email.unique' => "Esiste già una mail chiamata $request->email",

                'password.required' => 'La password è obbligatoria',
                'password.confirmed' => 'Le password non coincidono',
            ]
        );

        // Validation Fail
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create user and crypt password
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'password' => bcrypt($request->password)
        ]);

        // Confirm creation
        return response($user, 201);
    }


    // Login
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


    // Logout
    public function logout()
    {

        Auth::logout();

        return response(null, 204);
    }
}
