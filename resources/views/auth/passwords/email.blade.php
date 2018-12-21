@extends('template.base')

@section('title', 'SmartPet - Recuperar contraseña')

@section('content')

  <div class="registro-titulos">

    <h1>Recuperar contraseña</h1>
    <h5>Ingresa tu correo electrónico</h5>

  </div>

  <form class="registro-formulario" action="{{ route('password.email') }}" method="post">
    @csrf

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{-- {{ session('status') }} --}}
            Te enviamos un correo para que restablezcas tu contraseña!
        </div>
    @endif

    <div class="registro-container-campos">
      <div class="registro-nombre-y-campo">
        <label for="email" class="registro-nombre">Correo electrónico:</label>
          <div class="registro-campo">
            <input type="text" name="email" id="email" {{ $errors->has('email') ? 'class=registro-borde-error' : '' }} value="{{ old('email') }}">
            <br><span class="registro-error">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
          </div>
      </div>
    </div>

    <button class="registro-button" type="submit" name="button">Recuperar constraseña</button>

  </form>

@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
