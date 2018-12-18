@extends('template.products.templateProducts')

{{-- @dd($productsCategory) --}}
@section('title')
{{'Buscar Producto'}}
{{-- <h1></h1> --}}
@endsection

@section('category')
  <h3>Estás buscando: "{{$find}}"</h3>
@endsection

@section('content')

  {{-- @dd($prodructsFind) --}}
  <div class="container_productos">
    @forelse ($prodructsFind as $oneProduct)
      <ul class="producto" onclick="window.location='/listDetail/{{$oneProduct->id}}'">
        @if (substr($oneProduct->image, 0, 4) == 'http')
          <li><a href="#"><img src="{{$oneProduct->image}}" alt="" class="img_product"></a></li>
        @else
          <li><a href="#"><img src="/storage/products/{{$oneProduct->image}}" alt="" class=""></a></li>
        @endif
        <li><a href="#"><h4>{{$oneProduct->name}}</h4></a></li>
        <li><a href="#"><h4>${{$oneProduct->price}}</h4></a></li>
      </ul>
    @empty
      <h2>No hemos encontrado lo que estás buscando</h2>
    @endforelse
  </div>
  <br>
    {{-- Paginado --}}
  <div class="container_buttons">
    {{$prodructsFind->links()}}
  </div>

@endsection
