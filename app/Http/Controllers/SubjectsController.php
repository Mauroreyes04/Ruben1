<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use App\Models\Curso;
use App\Models\User;
use App\Models\Instructor;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Subjects::all();
        $cursos = Curso::all();
        return view('instructores.materias',['materias' => $materias,'cursos' => $cursos]);
    }

    public function materiavista()
    {   
        $instructores = Instructor::all();
        $users = User::all();
        $cursos = Curso::all();
        return view('instructores.materias', ['users' => $users, 'cursos' => $cursos,'instructores'=>$instructores]);
    }

    public function create(Request $request)
    {
        $nombreMateria = $request->input('nombre');
        $courseId = $request->input('cursos'); 
        $usuarioId = $request->input('usuario_id');//usuario del instructor del curso

        $materia = new Subjects;

        $materia->nombre = $nombreMateria;
        $materia->instructor_id = $usuarioId;
        $materia->curso_id = $courseId;
        $materia->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subjects $subjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subjects $subjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subjects $subjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subjects $subjects)
    {
        //
    }
}
