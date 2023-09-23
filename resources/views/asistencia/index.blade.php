@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #e5f7f2; /* Cambia este valor al color verde claro que prefieras */
    }
</style>


<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
        </svg>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Aprendiz</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/editar.php" method="post">
                        <input type="hidden" name="id" id="update_id">

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Documento</label>
                            <input type="number" name="documento" id="documento" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="number" name="telefono" id="telefono" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="text" name="correo" id="correo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="text" name="contraseña" id="contraseña" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Genero</label>
                            <input type="text" name="Genero" id="Genero" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Direccion</label>
                            <input type="text" name="Direccion" id="Direccion" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento</label>
                            <input type="date" name="Nacimiento" id="Nacimiento" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-sm table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Asistencias</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{ $usuario->id }}</th>
                        <td>{{ $usuario->name }}</td>
                        <td>
                            <form action="{{ route('registrar_asistencia', ['usuarioId' => $usuario->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="usuarioId" value="{{$usuario->id}}">
                                <select name="estado" class="form-select">
                                @foreach($tipoasistencia as $tipo)
                                    <option value="{{$tipo->id}}">{{ $tipo->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
