<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Curso;
use App\Models\User;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Models\Score;

class ApprenticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users = User::all();
        $cursos = Curso::all();
        $apprentice = Apprentice::all();
       return view('apprentices.index',['users'=>$users,'cursos'=>$cursos,'apprentice' => $apprentice]);
    }

    public function redirigirAVista()
    {   
        $users = User::all();
        $cursos = Curso::all();
        return view('apprentices.register', ['users' => $users, 'cursos' => $cursos]);
    }

    public function consulta(){
        $users = User::all();
        $apprentices = Apprentice::all();
        $cursos = Curso::all();
        $subjects = Subjects::all();
        $notas = Score::all();
        return view('apprentices.consulta', ['users' => $users, 'subjects' => $subjects,'notas' => $notas,'apprentices' => $apprentices,'cursos'=>$cursos]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $usuarioId = $request->input('usuario');
        $courseId = $request->input('cursos'); 

        $instructor = new Apprentice;

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
    public function show(Apprentice $apprentice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apprentice $apprentice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apprentice $apprentice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apprentice $apprentice)
    {
        //
    }
}