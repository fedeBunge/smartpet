<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="/images/logo.png">
    <link rel="stylesheet" href={{ asset('/css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('/css/styles/paletaColores.css') }} id="theme">
    <link rel="stylesheet" href={{ asset('/css/styles.css') }}>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  </head>
  <body>

    @include('partials.header')

    <div class="container-principal">
      <div class="container-secundario">
        @yield('content')
      </div>
      @include('partials.footer')
    </div>

    <script src={{ asset('/js/jquery-3.3.1.min.js') }}></script>
    <script src={{ asset('/js/bootstrap.min.js') }}></script>
    <script src={{ asset('/js/header.js') }}></script>
    <script src={{ asset('/js/themes.js') }}></script>
    <script src={{ asset('/js/carrito.js') }}></script>
    @yield('other-scripts')

  </body>
</html>
