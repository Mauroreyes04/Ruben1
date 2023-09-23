@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Jornada</th>
                    <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instructores as $instructor)
                    <tr>
                    <th scope="row">{{ $instructor->user_id}}</th>
                    <th scope="row">{{ $instructor->course_id}}</th>
                    <th scope="row">{{ $instructor->school_day}}</th>
                    <th scope="row"><input type="date" name="fecha"></th>
                    <td>@mdo</td>
                    </tr>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
