@extends('template.products.templateProducts')

{{-- @dd($productsAnimal) --}}
@section('title')
{{-- {{$productsAnimal[1]->animal->name}}) --}}
{{$animal->name}}
@endsection

@section('category')
{{-- {{$productsAnimal[1]->category->name}}) --}}
{{$animal->name}}
@endsection

@section('content')

{{-- @dd($productsAnimal->first()->animal_id) --}}
<div class="container_productos">
  @forelse ($productsAnimal as $oneProduct)
  <div class="producto">
    <a href="lalogomez"><img src="{{$oneProduct->image}}" alt="" class="">  </a>
    <a href="#"><h4>{{$oneProduct->name}}</h4></a>
    <a href="#"><h4>${{$oneProduct->price}}</h4></a>
  </div>
  {{-- <td>Category</td>
  <td>Brand</td> --}}
  @empty
    <h2>No hemos encontrado lo estas buscando</h2>
  @endforelse

</div>
<br>
  {{-- Paginado --}}
<div class="container_buttons">
  {{-- @dd($productsAnimal) --}}
  @for ($i=1; $i <= $pages; $i++)

    <a href="/listByAnimal/{{$productsAnimal->first()->animal_id ? $productsAnimal->first()->animal_id : '2' }}/{{$i}}" class="btn btn-info {{ $i == $pageIndex ? 'pageIndex' : null}}"  >{{$i}}</a>

  @endfor
</div>


@endsection
