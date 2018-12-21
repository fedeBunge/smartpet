@extends('template.base')

@section('title', 'SmartPet - Login')

@section('content')

  <div class="registro-titulos">
    <h1>Ingresa a tu cuenta</h1>
    <h5>No tienes una cuenta? Regístrate en SmartPet <a href="/register">aquí</a>!</h5>
  </div>

  <form class="registro-formulario" action="/login" method="post">

    @csrf

    <div class="registro-container-campos">

      <div class="registro-nombre-y-campo">
        <label for="email" class="registro-nombre">Correo electrónico:</label>
        <div class="registro-campo">
          <input id="email" type="text" name="email" {{ $errors->has('email') ? 'class=registro-borde-error' : '' }} value="{{ old('email') }}" autofocus>
          {{-- @if ($errors->has('email'))
            <br><span class="registro-error">{{ $errors->first('email') }}</span>
          @endif --}}
          <br><span class="registro-error">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="password" class="registro-nombre">Contraseña:</label>
        <div class="registro-campo">
          <input id="password" type="password" name="password" value="" {{ $errors->has('password') ? 'class=registro-borde-error' : '' }}>
          {{-- @if ($errors->has('password'))
            <br><span class="registro-error">{{ $errors->first('password') }}</span>
          @endif --}}
          <br><span class="registro-error">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
        </div>
      </div>

      <label class="registro-recordar" for="remember"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordar mi cuenta</label>

    </div>

    <button class="registro-button" type="submit">Ingresar</button>

    @if (Route::has('password.request'))
      <label class="registro-olvide">Olvidaste tu contraseña? Recupérala <a href="password/reset">aquí</a></label>
    @endif

  </form>

@endsection

@section('other-scripts')
  <script src={{ asset('/js/loginValidator.js') }}></script>
@endsection
