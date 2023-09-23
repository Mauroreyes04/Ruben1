<?php

namespace App\Http\Controllers;
use App\Models\Asistencia;
use App\Models\User;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $asistencias = Asistencia::all();  
    $idsUsuarios = $asistencias->pluck('id_usuario')->toArray();
    $aprendices = User::whereIn('id', $idsUsuarios)->get();
    
    return view('asistencia.consulta', ['asistencias' => $asistencias,'aprendices' => $aprendices]);
}
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $usuarioId = $request->input('usuarioId');
        $tipo_asistencia_id = $request->input('estado'); // El nombre del campo del formulario es "estado", no "{{$tipo->id}}"

        $asistencia = new Asistencia;

        $asistencia->date = date('Y-m-d');
        $asistencia->user_id = $usuarioId;
        $asistencia->tipo_asistencia_id = $tipo_asistencia_id; // Corregir asignación de tipo_asistencia_id
        $asistencia->save();

        
    }
    public function json(){
      
        $asistencia = Asistencia::all();
        return response()->json($asistencia);    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function filter(Request $request)
    {
        $fechaFiltro = $request->input('fecha');
        $asistencias = Asistencia::whereDate('fecha', $fechaFiltro)->get();

        return view('asistencias.consulta', compact('asistencias', 'fechaFiltro'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
