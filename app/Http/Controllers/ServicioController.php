<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;


class ServicioController extends Controller
{

    public function index()
    {
        // Obtener los servicios
        return response()->json(Servicio::all());
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]);

        // Crear un nuevo servicio
        $servicio = Servicio::create($request->all());
        return response()->json($servicio, 201);
    }

    public function show(Servicio $servicio)
    {
        return response()->json($servicio);
    }

    public function update(Request $request, Servicio $servicio)
    {
        // Validar
        $request->validate([
            'nombre' => 'sometimes|required|string|max:100',
            'descripcion' => 'sometimes|required|string',
            'precio' => 'sometimes|required|numeric',
        ]);
    
        // Actualizar
        $servicio->update($request->all());
    
        // Retornar mediante json
        return response()->json($servicio);
    }
    
    public function destroy(Servicio $servicio)
    {
    // Eliminar el servicio
    $servicio->delete();

    return response()->json(['message' => 'Servicio eliminado con éxito'], 200);
    }

}