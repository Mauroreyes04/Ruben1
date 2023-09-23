@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $usuario->name }}">
        </div>

        <div class="form-group">
            <label for="documento">Documento</label>
            <input type="number" name="documento" id="documento" class="form-control" value="{{ $usuario->document_number }}">
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="number" name="telefono" id="telefono" class="form-control" value="{{ $usuario->telephone }}">
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="text" name="correo" id="correo" class="form-control" value="{{ $usuario->email }}">
        </div>

        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="text" name="contraseña" id="contraseña" class="form-control" value="{{ $usuario->password }}">
        </div>

        <div class="form-group">
            <label for="Genero">Género</label>
            <input type="text" name="Genero" id="Genero" class="form-control" value="{{ $usuario->male }}">
        </div>

        <div class="form-group">
            <label for="Direccion">Dirección</label>
            <input type="text" name="Direccion" id="Direccion" class="form-control" value="{{ $usuario->address }}">
        </div>

        <div class="form-group">
            <label for="Nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="Nacimiento" id="Nacimiento" class="form-control" value="{{ $usuario->age }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

@endsection