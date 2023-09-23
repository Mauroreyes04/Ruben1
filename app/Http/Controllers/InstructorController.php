<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Subjects;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function consulta()
    {
        $instructores = Instructor::all();
        return view('instructores.consulta',['instructores'=>$instructores]);
    }

    public function index()
    {
        $instructores = Instructor::all();
        $cursos = Curso::all();
        $subjects = Subjects::all();
        $idcurso = $cursos->pluck('course_id')->toArray();
        $courses = $cursos->pluck('course_id');
        $idsUsuarios = $instructores->pluck('user_id')->toArray();
        $aprendices = User::whereIn('id', $idsUsuarios)->get();
        return view('instructores.index',['instructores'=>$instructores,'aprendices' => $aprendices,'cursos'=>$cursos, 'curso_id' => $idcurso,'courses'=>$courses,'subjects'=>$subjects]);
    }

    public function redirigirAVista()
    {   
        $users = User::all();
        $cursos = Curso::all();
        return view('instructores.register', ['users' => $users, 'cursos' => $cursos]);
    }

    public function horariovista()
    {   
        $users = User::all();
        $cursos = Curso::all();
        return view('instructores.horario', ['users' => $users, 'cursos' => $cursos]);
    }
    
    public function create(Request $request)
    {
        $usuarioId = $request->input('usuario');
        $courseId = $request->input('cursos'); 
        $jornada = $request->input('jornadas');
        $horaI = $request->input('hora_inicio');
        $horaF = $request->input('hora_fin');

        $instructor = new Instructor;

        $instructor->user_id = $usuarioId;
        $instructor->curso_id = $courseId;
        $instructor->save();
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
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
