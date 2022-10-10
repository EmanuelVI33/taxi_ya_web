<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'max:10'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;  

        $reponse = [
            'user' => $user,
            'token' => $token,
        ];

        return response($reponse, 201);
    }

    public function index() {
        return "Holiiiiiiiii";
    }
}
