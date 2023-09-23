@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css\login.css') }}">
@endsection
@section('content')
<section class="vh-100">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../img/logo_login.jpg" alt="login form" class="img-fluid" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form role="form" method="POST" action="{{ route('login') }}">

                  @csrf
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0">Sena Asistencia</span>
                  </div>

                  <div class="form-outline mb-2">
                    <label for="email" class="form-outline mb-4">Email </label>

                    <div class="form-outline mb-4">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-outline mb-2">
                    <label for="password" class="form-outline mb-4">{{ __('Password') }}</label>

                    <div class="form-outline mb-4">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="form-outline mb-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-0">
                    <div class="form-outline mb-4">
                      <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                      </button>

                      @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                      @endif
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
