<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('instructores.index',['cursos'=>$cursos]);
    }

    public function materias()
    {
        $cursos = Curso::all();
        return view('instructores.materias',['cursos'=>$cursos]);
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
        // Validar los datos enviados en el formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        // Crear un nuevo curso con los datos enviados
        Curso::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);

        // Redireccionar a la página de cursos o mostrar un mensaje de éxito
        return redirect()->route('curso.index')->with('success', 'Curso creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        // Validar los datos enviados en el formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        // Actualizar los datos del curso existente
        $curso->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);

        // Redireccionar a la página de cursos o mostrar un mensaje de éxito
        return redirect()->route('curso.index')->with('success', 'Curso actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }
}