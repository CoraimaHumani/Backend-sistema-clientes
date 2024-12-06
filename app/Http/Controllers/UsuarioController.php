<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Usuario;


use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
        // Obtener todos los usuarios
        return response()->json(Usuario::all());
    }

    public function store(Request $request)
{
    // Realiza la validación
    $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'email' => 'required|string|email|max:100|unique:usuario,email',
        'constrasena' => 'required|string|min:8',
        'rol' => 'required|string|max:100',
        'estado' => 'required|boolean',
    ]);

    $usuario = Usuario::create($validated);

    return response()->json($usuario, 201);
}


    public function show(Usuario $usuario)
    {
        return response()->json($usuario);
    }

    public function update(Request $request, Usuario $usuario)
{
    $request->validate([
        'nombre' => 'sometimes|required|string|max:100',
        'email' => 'sometimes|required|string|email|max:100|unique:usuario,email,' . $usuario->id_usuario . ',id_usuario',
        'constrasena' => 'sometimes|required|string|min:8',
        'rol' => 'sometimes|required|string|max:100',
        'estado' => 'sometimes|required|boolean',
    ]);

    $usuario->update($request->all());

    return response()->json($usuario);
}

    public function destroy(Usuario $usuario)
    {
    // Elimina el usuario
    $usuario->delete();

    return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }

}