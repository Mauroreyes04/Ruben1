@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #e5f7f2; /* Cambia este valor al color verde claro que prefieras */
    }
</style>

<div class="container">
        <a href="{{ action('App\Http\Controllers\InstructorController@redirigirAVista') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </a>
        <a href="{{ action('App\Http\Controllers\SubjectsController@materiavista') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </a>
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Curso</th>
                    </tr>
                </thead>
                @foreach ($instructores as $instructor)
                <tbody>  
                    <td scope="row">{{ $instructor->id}}</td>
                    @foreach ($aprendices as $aprendiz)
                        @if ($instructor->user_id == $aprendiz->id)
                            <td>{{ $aprendiz->name }}</td>
                        @break
                        @endif
                    @endforeach
                    @foreach ($cursos as $curso)
                        @if ($instructor->curso_id == $curso->id)
                            <td>{{ $curso->name }}</td>
                            @break
                        @endif
                    @endforeach
                    
                </tbody>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
