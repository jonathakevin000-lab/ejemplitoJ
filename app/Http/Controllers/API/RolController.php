<?php

namespace App\Http\Controllers\API;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    // LISTAR TODOS
    public function index()
    {
        return response()->json(Rol::all(), 200);
    }

    // CREAR
    public function store(Request $request)
    {
        $rol = Rol::create($request->all());

        return response()->json([
            'message' => 'Rol creado',
            'data' => $rol
        ], 201);
    }

    // MOSTRAR UNO
    public function show($id)
    {
        return response()->json(
            Rol::findOrFail($id)
        );
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->all());

        return response()->json([
            'message' => 'Rol actualizado'
        ]);
    }

    // ELIMINAR
    public function destroy($id)
    {
        Rol::destroy($id);

        return response()->json([
            'message' => 'Rol eliminado'
        ]);
    }
}