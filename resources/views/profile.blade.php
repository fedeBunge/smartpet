@extends('template.base')

@section('title', 'SmartPet - Perfil')

@section('content')

  <div class="perfilmain">
    <div class="perfilusuario">
      <img class="perfilimg" src="/storage/avatars/{{ Auth::user()->avatar }}" alt="Imagen de perfil">
    </div>
    <div class="perfilusuario">
      <h2 class ="perfilh2">{{ Auth::user()->nickname }}</h2>
    </div>
    <div>
      <div>
        <label for=""><u>Nombre Completo</u>: </label>
        <span>{{ Auth::user()->name }}</span>
      </div>
      <br>
      <div>
        <label for=""><u>País de Nacimiento</u>: </label>
        <span>{{ Auth::user()->country }}</span>  <!-- País de nacimiento: Neverland -->
      </div>
      <br>
      @if (Auth::user()->state)
        <div>
          <label for=""><u>Provincia</u>: </label>
          <span>{{ Auth::user()->state }}</span>  <!-- Provincia: Neverland -->
        </div>
        <br>
      @endif
      <div>
        <label for=""><u>Email</u>: </label>
        <span>{{ Auth::user()->email }}</span><!-- Correo electronico: john@doe.com -->
      </div>
      <br>
      <div>
        <label for=""><u>Tema</u>: </label>
        <button type="button" name="buttonclassic" id="buttonclassic">Clásico</button>
        <button type="button" name="buttonnavidad" id="buttonnavidad">Navidad</button>
      </div>
    </div>
  </div>

@endsection

@section('other-scripts')
  <script src={{ asset('/js/themes-selector.js') }}></script>
@endsection
