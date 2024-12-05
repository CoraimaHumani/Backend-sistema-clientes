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

    // Si la validación pasa, se crea el usuario
    $usuario = Usuario::create($validated);

    // Devuelve la respuesta con el usuario creado
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

    // Actualiza los datos del usuario
    $usuario->update($request->all());

    // Retorna la respuesta con el usuario actualizado
    return response()->json($usuario);
}

    public function destroy(Usuario $usuario)
    {
    // Elimina el usuario
    $usuario->delete();

    // Retorna un mensaje de éxito con un código 200
    return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }

}