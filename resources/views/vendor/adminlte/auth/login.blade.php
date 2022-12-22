@extends('adminlte::auth.auth-page2', ['auth_type' => 'login'])

@section('adminlte_css_pre')

    <link rel="stylesheet" href="{{ asset('vendor/elian/style.css')}}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

{{--@section('auth_header', __('adminlte::adminlte.login_message'))--}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Veterinaria VETERCAMPOS</title>
  </head>

<body>
<div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="{{ $login_url }}" method="post" class="sign-in-form" id="form">
          @csrf
            <h2 class="title">Iniciar Seccion</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" name="email"  @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>



            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password"  @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">


            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <input type="submit" value="ingresar" class="btn solid" />
            <a href="{{ $register_url }}"class="btn btn-sm btn-success" style="background-color: green !important;" >
               registrar
           </a>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Veterinaria VETERCAMPOS</h3>
          <p>
            Ellos no podrian hablar, pero si podran acompañar tu silencio
          </p>
        </div>
        <img src="{{asset('vendor/elian/img/logo2.svg')}}" class="image" alt=""  />
      </div>
    </div>
  </div>

  {{--<script src="{{asset('vendor/elian/app.js')}}"></script>--}}

</body>
</html>
