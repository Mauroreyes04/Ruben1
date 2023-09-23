<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Asistencia;
use App\Models\User;
use Illuminate\Http\Request;

class TipoAsisteniciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tiposAsistenicia = Tipo_Asistencia::all();

        return view('asistencia.index', ['tiposAsistenicia' => $tiposAsistenicia]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo_Asistencia $tipo_Asistenicia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo_Asistencia $tipo_Asistenicia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo_Asistencia $tipo_Asistenicia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo_Asistencia $tipo_Asistenicia)
    {
        //
    }
}
