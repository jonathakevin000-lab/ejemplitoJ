<?php

namespace App\Http\Controllers\API;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MateriaController extends Controller
{
    public function index()
    {
        return response()->json(Materia::with('carrera')->get());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'creditos' => 'required|integer|min:1',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        $materia = Materia::create($validatedData);
        return response()->json($materia, 201);
    }

    public function show($id)
    {
        $materia = Materia::with('carrera')->findOrFail($id);
        return response()->json($materia);
    }

    public function update(Request $request, $id)
    {
        $materia = Materia::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'creditos' => 'sometimes|required|integer|min:1',
            'carrera_id' => 'sometimes|required|exists:carreras,id',
        ]);

        $materia->update($validatedData);
        return response()->json($materia);
    }

    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();
        
        return response()->json(['message' => 'Materia eliminada']);
    }
}