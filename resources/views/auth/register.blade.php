@extends('template.base')

@section('title', 'SmartPet - Registro')

@section('content')

  <div class="registro-titulos">

  <h1>Regístrate en SmartPet!</h1>
  <h2>Completa tus datos</h2>

  </div>

  <form class="registro-formulario" action="/register" method="post" enctype="multipart/form-data">

    @csrf

    <div class="registro-container-campos">

      <div class="registro-nombre-y-campo">
        <label for="name" class="registro-nombre">Nombre completo:</label>
        <div class="registro-campo">
          <input {{ $errors->has('name') ? 'class=registro-borde-error' : '' }} type="text" name="name" id="name" value="{{ old('name') }}" autofocus>
          {{-- <div class="registro-error-js"></div>
          @if ($errors->has('name'))
            <span class="registro-error">{{ $errors->first('name') }}</span>
          @endif --}}
          <span class="registro-error">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="nickname" class="registro-nombre">Nombre de usuario:</label>
        <div class="registro-campo">
          <input {{ $errors->has('nickname') ? "class=registro-borde-error" : '' }} type="text" name="nickname" id="nickname" value="{{ old('nickname') }}">
          {{-- <div class="registro-error-js"></div>
          @if ($errors->has('nickname'))
              <span class="registro-error">{{ $errors->first('nickname') }}</span>
          @endif --}}
          <span class="registro-error">{{ $errors->has('nickname') ? $errors->first('nickname') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="country" class="registro-nombre">País de nacimiento:</label>
        <div class="registro-campo">
          <select class="registro-dropdown {{ $errors->has('country') || $errors->has('state') ? 'registro-borde-error' : '' }}" name="country" id="country">
            <option value="">--------- Elige un país ---------</option>
            {{-- Acá JavaScript carga los "options" a través de la API de países --}}
          </select>
        {{-- <div class="registro-error-js"></div>
        @if ($errors->has('country'))
          <span class="registro-error">{{ $errors->first('country') }}</span>
        @elseif ($errors->has('state'))
          <span class="registro-error">{{ $errors->first('state') }}</span>
        @endif --}}
        <span class="registro-error">
          @if ($errors->has('country'))
            {{ $errors->first('country') }}
          @elseif ($errors->has('state'))
            {{ $errors->first('state') }}
          @endif
        </span>
        </div>
      </div>

      <div class="registro-nombre-y-campo" id="state">
        <!-- Acá va el campo "Provincia" en el caso de que se elija "Argentina" como país de nacimiento -->
      </div>

      <div class="registro-nombre-y-campo">
        <label for="email" class="registro-nombre">Correo electrónico:</label>
        <div class="registro-campo">
          <input {{ $errors->has('email') ? 'class=registro-borde-error' : '' }} type="text" name="email" id="email" value="{{ old('email') }}">
          {{-- <div class="registro-error-js"></div> --}}
          {{-- @if ($errors->has('email'))
            <span class="registro-error">{{ $errors->first('email') }}</span>
          @endif --}}
          <span class="registro-error">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="password" class="registro-nombre">Contraseña:</label>
        <div class="registro-campo">
          <input {{ $errors->has('password') ? 'class=registro-borde-error' : '' }} type="password" name="password" id="password" value="">
          {{-- <div class="registro-error-js"></div>
          @if ($errors->has('password'))
            <span class="registro-error">{{ $errors->first('password') }}</span>
          @endif --}}
          <span class="registro-error">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="password-confirm" class="registro-nombre">Repetir contraseña:</label>
        <div class="registro-campo">
          <input type="password" name="password_confirmation" id="password-confirm" value="">
          <span class="registro-error"></span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="avatar" class="registro-nombre">Imagen de perfil:</label>
        <div class="registro-campo">
          <input class="seleccionar-archivo {{ $errors->has('avatar') ? 'registro-borde-error' : '' }}" type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png, .bmp, .gif, .svg">
          <div class="registro-leyenda-archivo">
            <span class="registro-leyenda-archivo-formatos">Formatos: jpg, jpeg, png, bmp, gif, svg</span>
            <span class="registro-leyenda-archivo-tamaño">Tamaño máximo: 2MB</span>
          </div>
          {{-- <div class="registro-error-js"></div>
          @if ($errors->has('avatar'))
            <span class="registro-error">{{ $errors->first('avatar') }}</span>
          @endif --}}
          <span class="registro-error">{{ $errors->has('avatar') ? $errors->first('avatar') : '' }}</span>
        </div>
      </div>

    </div>

    <button class="registro-button" type="submit">Crear cuenta</button>

  </form>

@endsection

@section('other-scripts')
  <script src={{ asset('/js/validator.js') }}></script>
@endsection
