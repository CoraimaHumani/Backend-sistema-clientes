<?php

namespace App\Http\Controllers;
use App\Models\ServicioAsignado;

use Illuminate\Http\Request;

class ServicioAsignadoController extends Controller
{
    //mostrar la lista
    public function index(){
        $serviciosAsignados = ServicioAsignado::all();
        return response()->json($serviciosAsignados);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'dias_calendario' => 'required|integer',
            'estado' => 'required|string|max:100',
            'comentarios' => 'required|string',
            'id_cliente' => 'required|exists:clientes,id_cliente',
        'id_servicio' => 'required|exists:servicios,id_servicio',
        ]);

        $servicioAsignado = ServicioAsignado::create($validated);

        return response()->json($servicioAsignado, 201);
    }


    //mostrar detalles mediante id
    public function show($id)
    {
        $servicioAsignado = ServicioAsignado::findOrFail($id);
        return response()->json($servicioAsignado);
    }

    //ctualizar un servicio
    public function update(Request $request, $id)
    {
    $validated = $request->validate([
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
        'dias_calendario' => 'required|integer',
        'estado' => 'required|string|max:100',
        'comentarios' => 'required|string',
        'id_cliente' => 'required|exists:clientes,id_cliente',
        'id_servicio' => 'required|exists:servicios,id_servicio',
    ]);

    $servicioAsignado = ServicioAsignado::findOrFail($id);

    $servicioAsignado->update($validated);

    return response()->json($servicioAsignado);
}


    //eliminar un servicio
    public function destroy($id)
    {
        // Buscar el servicio por id
        $servicioAsignado = ServicioAsignado::findOrFail($id);

        // Eliminar
        $servicioAsignado->delete();

        return response()->json(['message' => 'Servicio asignado eliminado con exito.'], 200);
    }


}
