<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    // Método de login
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'constrasena' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Verificar las credenciales
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->constrasena, $usuario->constrasena)) {
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }

        // Autenticar al usuario y crear un token
        $token = $usuario->createToken('LoginToken')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'token' => $token,
        ]);
    }

    // Método de logout
    public function logout(Request $request)
    {
    $request->user()->tokens->each(function ($token) {
        $token->delete();
    });

    return response()->json(['message' => 'Logout exitoso']);
    }

}
