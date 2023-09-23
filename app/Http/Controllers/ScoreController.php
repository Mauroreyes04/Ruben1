<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Curso;
use App\Models\User;
use App\Models\Score;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;


class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function redirigirAVistaScore()
    {
        $users = User::all();
        $cursos = Curso::all();
        $subjects = Subjects::all();
        $apprentices = Apprentice::all();
        return view('instructores.notas', ['users' => $users, 'cursos' => $cursos, 'apprentices' => $apprentices, 'subjects' => $subjects]);
    }

    public function store(Request $request)
    {
        $usuarioId = $request->input('usuarioId');
        $nota1 = $request->input('nota1');
        $nota2 = $request->input('nota2');
        $nota3 = $request->input('nota3');
        $documento = $request->input('documento');
        $promedio = $request->input('promedio');
        $materia = $request->input('materia');

        $score = new Score();
        $score->note1 = $nota1;
        $score->note2 = $nota2;
        $score->note3 = $nota3;
        $score->average = $promedio;
        $score->document = $documento;
        $score->apprentice_id = $usuarioId;
        $score->subject_id = $materia;
        $score->save();

        return back();
    }


    public function search(Request $request)
    {
        $documento = $request->input('documento');
        $resultados = Score::where('document', $documento)->get();

        $apprentices = Apprentice::all();
        $users = User::all();
        $cursos = Curso::all();
        $subjects = Subjects::all();

        return view('apprentices.consulta',  compact('users','cursos', 'apprentices', 'subjects','resultados','documento'));
    }


    public function pdf(Request $request)
    {
         $documento = $request->input('documento');
        $resultados = Score::where('document', $documento)->get();
    
        $apprentices = Apprentice::all();
        $users = User::all();
        $cursos = Curso::all();
        $subjects = Subjects::all();
    
        $html = view('apprentices.consulta', compact('resultados', 'apprentices', 'users', 'cursos', 'subjects'))->render();
    
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
    
        $dompdf->render();
    
        $filename = $documento . '.pdf';
    
        $output = $dompdf->output();

            return $dompdf->stream($filename);
        } 


    /**
     * Display the specified resource.
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Score $score)
    {
        //
    }
}
