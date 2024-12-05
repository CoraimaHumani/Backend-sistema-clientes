<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        // Lista los clientes
        return Cliente::all();
    }

    public function store(Request $request)
    {
        // Crea un nuevo cliente
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        // Muestra un cliente mediante id
        return Cliente::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clientes,email,' . $id,  // $id es correcto si corresponde a id_cliente
        ]);
        // Busca por id
        $cliente = Cliente::findOrFail($id);

        // Actualiza en cliente
        $cliente->update($request->all());

        // Retorna la respuesta con el cliente actualizado
        return response()->json($cliente);
    }


    public function destroy($id)
    {
        // Elimina un cliente
        Cliente::destroy($id);
        return response()->json(null, 204); // 204 significa sin contenido (borrado exitoso)
    }
}