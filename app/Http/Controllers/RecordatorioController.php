<?php

namespace App\Http\Controllers;
use App\Models\Recordatorio;

use Illuminate\Http\Request;

class RecordatorioController extends Controller
{
    // Mostrar todos los recordatorios
    public function index()
    {
        $recordatorios = Recordatorio::all();
        return response()->json($recordatorios);
    }

    // Mostrar un recordatorio específico
    public function show($id)
    {
        $recordatorio = Recordatorio::findOrFail($id);
        return response()->json($recordatorio);
    }

    // Crear un nuevo recordatorio
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validated = $request->validate([
            'mensaje' => 'required|string',
            'fecha_envio' => 'nullable|date',  // Si quieres que sea opcional
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_servicio' => 'required|exists:servicios,id_servicio',
            'id_usuario' => 'required|exists:usuario,id_usuario', // Revisa que 'usuarios' y 'id_usuario' estén bien definidos
        ]);
    
        // Crear el recordatorio
        $recordatorio = Recordatorio::create($validated);
        return response()->json($recordatorio, 201);
    }
    


    // Actualizar un recordatorio existente
    public function update(Request $request, $id)
    {
        // Validación
        $validated = $request->validate([
            'mensaje' => 'required|string',
            'fecha_envio' => 'nullable|date', 
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_servicio' => 'required|exists:servicios,id_servicio',
            'id_usuario' => 'required|exists:usuario,id_usuario',
        ]);

        // buscar mediante id
        $recordatorio = Recordatorio::findOrFail($id);

        // Actualiza los datos validados
        $recordatorio->update($validated);

        // Devolver una respuesta
        return response()->json([
            'message' => 'Recordatorio actualizado con éxito.',
            'recordatorio' => $recordatorio
        ], 200);
    }

    // Eliminar un recordatorio
    public function destroy($id)
    {
        $recordatorio = Recordatorio::findOrFail($id);
        $recordatorio->delete();

        return response()->json(['message' => 'Recordatorio eliminado con éxito.'], 200);
    }
}
