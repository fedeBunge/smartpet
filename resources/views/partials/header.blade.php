<header>

  {{-- Si el usuario está logueado, agarramos su id desde JS a través de span invisible para cargar el tema que le corresponda --}}

  @auth
    <span style="display: none" id="idUser">{{Auth::user()->id}}</span>
  @endauth

  <!-- Barra superior DESKTOP // Barra única MOBILE -->

  <nav class="header-superior">

    <a class="link-logo" href="/"><img class="logo" src="/images/logo-blanco-navbar.png"></a>
    <a class="link-logo-mobile" href="/"><img class="logo-mobile" src="/images/logo-blanco.png"></a>

    <form class="form-busqueda" action="{{route('product.finder')}}" method="get">
      {{-- @csrf --}}
      <input class="input-busqueda" type="text" name="search" value="" placeholder="¿Qué necesitas?" autofocus>
      <button class="boton-lupa" type="submit" name="">
      <img class="lupa" src="/images/lupa.png" alt="">
      </button>

    </form>

    <p>¿Nuevo en SmartPet? Mira las <a href="/faq">preguntas frecuentes</a></p>

    <!-- Botones de la barra mobile -->

    <div class="area-menu-hamburger">
      <img class="menu-hamburger" src="/images/menu-green.png">
      <img class="menu-hamburger-close hidden" src="/images/menu-green-close.png">
    </div>

    <!-- Inicio menú mobile -->

    <ul class="menu-mobile" style="display:none">

      <div class="barra-usuario-mobile">
        @guest
          <li class="con-fondo"><a href="/login">Login</a></li>
          <li class="con-fondo"><a href="/register">Registro</a></li>
        @else
          <li class="usuario-logueado-mobile">
            <img class="avatar-usuario-mobile" src="/storage/avatars/{{ Auth::user()->avatar }}" alt="avatar">
            <span class="nombre-usuario">{{ Auth::user()->nickname }}</span>
            <img class="flecha-izquierda-usu-mobile" src="/images/flecha-izquierda-blanca.png" alt="">
            <img class="cruz-usu-mobile hidden" src="/images/cruz-blanca.png" alt="">
          </li>
          <ul class="menu-usuario-logueado-mobile" style="display:none">
            <li><a href="/profile">Mi perfil</a></li>
            @if (Auth::user()->admin)
              <li><a href="/products/create">Crear producto</a></li>
            @endif
            <li><a href="/logout"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Salir</a>
            </li>
            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                @csrf
            </form>
          </ul>
        @endguest
      </div>

      <div class="barra-categorias-mobile">
        <li class="todas-las-categorias-mobile">
          <img class="flecha-izquierda-mobile" src="/images/flecha-izquierda-blanca.png" alt="">
          <img class="cruz-mobile hidden" src="/images/cruz-blanca.png" alt="">
          <span>Todas las categorías</span>
        </li>
        <ul class="menu-categorias-mobile" style="display:none">
          <li><a href="/listByCategory/1">Alimentos</a></li>
          <li><a href="/listByCategory/2">Juguetes</a></li>
          <li><a href="/listByCategory/3">Vestimenta</a></li>
          <li><a href="/listByCategory/4">Otros ítems</a></li>
        </ul>

      </div>

      <div class="barra-nav-mobile">
        <li><a href="/listByAnimal/1">Perros</a></li>
        <li><a href="/listByAnimal/2">Gatos</a></li>
        <li><a href="/listByAnimal/3">Peces</a></li>
        <li><a href="/listByAnimal/4">Roedores</a></li>
        <li><a href="/listByAnimal/5">Otros</a></li>
      </div>

      <div class="barra-preguntas-frecuentes-mobile">
        <li><a href="/faq">Preguntas frecuentes</a></li>
      </div>

    </ul>

    <!-- Fin menú mobile -->

    <a class="link-carrito-mobile" href="/carritoDeCompras"><img id="imgCarritoMobile" class="carrito" src="/images/carrito-blanco.png" alt="carrito"></a>

  </nav>

  <!-- Barra inferior DESKTOP // Desaparece en el MOBILE -->

  <nav class="header-inferior">

    <ul class="barra-categorias">
      <li class="todas-las-categorias">
        Todas las categorías
        <img class="flecha-abajo-cat" src="/images/flecha-abajo-blanca.png" alt="">
        <img class="cruz-cat hidden" src="/images/cruz-blanca.png" alt="">
      </li>
      <ul class="menu-categorias" style="display:none">
        <li><a href="/listByCategory/1">Alimentos</a></li>
        <li><a href="/listByCategory/2">Juguetes</a></li>
        <li><a href="/listByCategory/3">Vestimenta</a></li>
        <li><a href="/listByCategory/4">Otros ítems</a></li>
      </ul>
    </ul>

    <ul class="barra-nav">
      <li><a href="/listByAnimal/1">Perros</a></li>
      <li><a href="/listByAnimal/2">Gatos</a></li>
      <li><a href="/listByAnimal/3">Peces</a></li>
      <li><a href="/listByAnimal/4">Roedores</a></li>
      <li><a href="/listByAnimal/5">Otros</a></li>
    </ul>

    <ul class="barra-usuario">
      @guest
        <li class="menu-login-registro"><a href="/login">Login</a></li>
        <li class="menu-login-registro"><a href="/register">Registro</a></li>
      @else
        <li class="usuario-logueado">
          <img class="avatar-usuario" src="/storage/avatars/{{ Auth::user()->avatar }}" alt="avatar">
          <span class="nombre-usuario">{{ Auth::user()->nickname }}</span>
          <img class="flecha-abajo-usu" src="/images/flecha-abajo-blanca.png" alt="">
          <img class="cruz-usu hidden" src="/images/cruz-blanca.png" alt="">
        </li>
        <ul class="menu-usuario-logueado" style="display:none">
          <li><a href="/profile">Mi perfil</a></li>
          @if (Auth::user()->admin)
            <li><a href="/products/create">Crear producto</a></li>
          @endif
          <li><a href="/logout"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Salir</a>
          </li>
          <form id="logout-form" action="/logout" method="POST" style="display: none;">
              @csrf
          </form>
        </ul>
      @endguest

      <a class="link-carrito"  href="/carritoDeCompras"><img id="imgCarrito" class="carrito" src="/images/carrito-blanco.png" alt="carrito"></a>

    </ul>

  </nav>
  @section('other-scripts')
    <script src={{ asset('/js/themes.js') }}></script>
  @endsection
</header>
