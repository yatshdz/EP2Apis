<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiante = Estudiante::all();
        return $estudiante;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellido' => 'required|string|max:255',
            'Email' => 'required|string|max:255',
            'Telefono' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Carrera' => 'required|string|max:255',
        ]);
        $estudiante = Estudiante::create([
            'Nombre' => $request->Nombre,
            'Apellido' => $request->Apellido,
            'Email' => $request->Email,
            'Telefono' => $request->Telefono,
            'Direccion' => $request->Direccion,
            'Carrera' => $request->Carrera,
        ]);
        return response()->json($estudiante, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        $request->validate([
            'Nombre' => 'sometimes|string|max:255',
            'Apellido' => 'sometimes|string|max:255',
            'Email' => 'sometimes|string|email|max:255',
            'Telefono' => 'sometimes|string|max:255',
            'Direccion' => 'sometimes|string|max:255',
            'Carrera' => 'sometimes|string|max:255',
        ]);

        $estudiante->update($request->only([
            'Nombre', 'Apellido', 'Email', 'Telefono', 'Direccion', 'Carrera'
        ]));

        return response()->json([
            'message' => 'Estudiante actualizado con éxito',
            'estudiante' => $estudiante
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id); // Verifica que $id sea el correcto

        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        $estudiante->delete(); // Elimina el registro

        return response()->json(['message' => 'Estudiante eliminado con éxito'], 200);
    }

}
