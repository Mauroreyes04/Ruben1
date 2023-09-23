<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tipo_Asistencia;
class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
    return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'documento' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
            'Genero' => 'required',
            'Direccion' => 'required',
            'Nacimiento' => 'required',
        ]);

        $usuario = new User;
        $usuario->name = $request->input('nombre');
        $usuario->document_number = $request->input('documento');
        $usuario->telephone = $request->input('telefono');
        $usuario->email = $request->input('correo');
        $usuario->password = bcrypt($request->input('contraseña'));
        $usuario->male = $request->input('Genero');
        $usuario->address = $request->input('Direccion');
        $usuario->age = $request->input('Nacimiento');
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
{
    $usuario = User::find($id);
    return view('usuarios.edit', ['usuario' => $usuario]);
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'documento' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
            'Genero' => 'required',
            'Direccion' => 'required',
            'Nacimiento' => 'required',
        ]);

        $usuario = User::find($id);
        $usuario->name = $request->input('nombre');
        $usuario->document_number = $request->input('documento');
        $usuario->telephone = $request->input('telefono');
        $usuario->email = $request->input('correo');
        $usuario->password = bcrypt($request->input('contraseña'));
        $usuario->male = $request->input('Genero');
        $usuario->address = $request->input('Direccion');
        $usuario->age = $request->input('Nacimiento');
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}