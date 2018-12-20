@extends('template.base')

@section('title', 'SmartPet - Home')

@section('content')

  <!-- Bootstrap Carousel START -->

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/images/perro.jpeg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h2>En <strong>SmartPet</strong></h2>
            <h2>sabemos quiénes son tus mejores amigos</h2>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/images/gato.jpeg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
            <h2>Es por esto que los queremos</h2>
            <h2><strong>cuidar</strong> como si fueran nuestros hijos</h2>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/images/hamster.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
            <h2>Brindándoles la <strong>mejor</strong></h2>
            <h2>atención y productos del mercado</h2>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <!--<span class="sr-only">Previous</span>-->
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <!--<span class="sr-only">Next</span>-->
    </a>
  </div>

  <!-- Bootstrap Carousel END -->


  <!-- Bootstrap Product Container START -->

  <section class="container-fluid seccion_productos">
    <h2 class="titular">Ofertas del día</h2>
    <div class="container-fluid container_productos_grilla">
      @foreach ($ofertas as $oneProduct)
        <div class="producto_grilla" onclick="window.location='{{ route('listDetail.show', $oneProduct->id) }}'">
          @if (substr($oneProduct->image, 0, 4) == 'http')
            <img src="{{ $oneProduct->image }}" alt="" width="400">
          @else
            <img src="/storage/products/{{ $oneProduct->image }}" alt="" width="250">
          @endif
          <h4>{{ $oneProduct->name }}</h4>
          <h5>$ {{ $oneProduct->price }}</h5>
        </div>
      @endforeach
    </div>
  </section>

  <!-- Bootstrap Product Container END -->

  <!-- Bootstrap Product Container START -->

  <section class="container-fluid seccion_productos">
    <h2 class="titular">Más recientes</h2>
    <div class="container-fluid container_productos_grilla">
      @foreach ($recientes as $oneProduct)
        <div class="producto_grilla" onclick="window.location='{{ route('listDetail.show', $oneProduct->id) }}'">
          @if (substr($oneProduct->image, 0, 4) == 'http')
            <img src="{{ $oneProduct->image }}" alt="Imagen producto">
          @else
            <img src="/storage/products/{{ $oneProduct->image }}" alt="Imagen producto">
          @endif
          <h4>{{ $oneProduct->name }}</h4>
          <h5>$ {{ $oneProduct->price }}</h5>
        </div>
      @endforeach
    </div>
  </section>

  <!-- Bootstrap Product Container END -->

@endsection

@section('other-scripts')
  <script src={{ asset('/js/postRegistro.js') }}></script>
@endsection
