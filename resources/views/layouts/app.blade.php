<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sena Academico') }}</title>

    @yield('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css\app.css') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Dentro del head de tu vista -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.js"></script>
</head>

<body>
    <div id="app" style="border-bottom: 2rem;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navBarWrapper">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <h1>I.E. Eugenio Perro Palla</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" id="navLink">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @else

                        @can('profe.asistencia','profe.asistencia')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('asistencia')}}">Asistencia</a>
                        </li>
                        @endcan

                        @can('admin.instructor')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('instructor')}}">Instructores</a>
                        </li>
                        @endcan

                        @can('admin.apprentice')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('apprentice')}}">Aprendices</a>
                        </li>
                        @endcan

                        @can('admin.scores_store','profe.vista_register_score')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('vista_register_score')}}">Notas</a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('vista_consulta_usuario')}}">Consultar Notas</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @can('admin.usuarios')
                                <a class="nav-link" href="{{ url('usuarios') }}">Usuarios</a>
                               
                                @endcan
                                @can('admin.vista_register_materia')
                                <a class="nav-link" href="{{ url('vista_register_materia') }}">Materias</a>
                                @endcan
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <script src="{{ asset('js/horario.js') }}" defer></script>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>