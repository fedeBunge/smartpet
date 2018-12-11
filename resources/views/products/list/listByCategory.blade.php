@extends('template.products.templateProducts')

{{-- @dd($productsCategory) --}}
@section('title')
{{-- {{$productsCategory[1]->category->name}}) --}}
{{$category->name}}
@endsection

@section('category')
{{-- {{$productsCategory[1]->category->name}}) --}}
{{$category->name}}
@endsection

@section('content')

{{-- @dd($productsCategory->first()->category_id) --}}
<div class="container_productos">
  @forelse ($productsCategory as $oneProduct)
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
  @for ($i=0; $i < $pages; $i++)

    <a href="/listByCategory/{{$productsCategory->first()->category_id}}/{{$i}}" class="btn btn-info {{ $i == $pageIndex ? 'pageIndex' : null}}"  >{{$i+1}}</a>
  
  @endfor
</div>


@endsection
