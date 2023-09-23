@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('filter') }}" method="GET" >
                <div class="form-group">
                    <label for="fecha">Filtrar por Fecha:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $fechaFiltro ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
            
            <table class="table table-sm table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Id Usuario</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
    @foreach ($asistencias as $asistencia)
    <tr>
        <td>{{ $asistencia->id }}</td>
        <td>{{ $asistencia->estado }}</td>
        <td>{{ $asistencia->fecha }}</td>
        <td>{{ $asistencia->id_usuario }}</td>
        
        @foreach ($aprendices as $aprendiz)
            @if ($asistencia->id_usuario == $aprendiz->id)
                <td>{{ $aprendiz->nombre }}</td>
                @break
            @endif
        @endforeach
        
    </tr>
    @endforeach
</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
