@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #ffd3e6; /* Cambia este valor al color rosa pastel que prefieras */
    }
</style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="{{ route('instructores_store')}}" method="POST">
                    @csrf
                    <h2>Registro de Instructores</h2>
                    <div class="form-group">
                        <label for="usuario">Seleccionar usuario:</label>
                        <select name="usuario" id="usuario" class="form-select" required>
                            <option value=""disabled selected>Elija un usuario</option>
                            @foreach($users as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>   
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cursos">Seleccionar curso:</label>
                        <select name="cursos" id="cursos" class="form-select" required>
                            <option value="" disabled selected>Elija un Curso</option>
                            @foreach($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
