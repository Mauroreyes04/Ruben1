@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #e5f7f2; /* Cambia este valor al color verde claro que prefieras */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form action="{{ route('materias_store') }}" method="POST">
    @csrf
    <br>
    <div class="form-group">
        <label for="nombre">Nombre de la materia:</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
    </div>

    <div class="form-group">
        <label for="curso">Curso:</label>
        <select name="cursos" id="cursos" class="form-select">
            <option value="" disabled selected>Elija un Curso</option>
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="usuario_id">Instructor</label>
        <select name="usuario_id" id="usuario_id" class="form-select">
            <option value=""  disabled selected>Elija un Usuario</option>
            @foreach ( $instructores as $instructor )
                @foreach ($users as $user)
                @if ($instructor->user_id == $user->id)
                <option value="{{ $instructor->id }}">{{ $user->name }}</option>
                            @break
                            @endif
                @endforeach
            @endforeach
            
        </select>
    </div><br>
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>
    </div>
</div>
@endsection
