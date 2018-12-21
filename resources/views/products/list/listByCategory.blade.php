@extends('template.products.templateProducts')

{{-- @dd($productsCategory) --}}
@section('title')
{{-- {{$productsCategory[1]->category->name}}) --}}
SmartPet - {{$category->name}}
@endsection

@section('category')
{{-- {{$productsCategory[1]->category->name}}) --}}
{{$category->name}}
@endsection

@section('content')

  {{-- @dd($productsCategory->first()->category_id) --}}
  <div class="container_productos">
    @forelse ($productsCategory as $oneProduct)
      <ul class="producto" onclick="window.location='{{ route('listDetail.show', $oneProduct->id) }}'">
        @if (substr($oneProduct->image, 0, 4) == 'http')
          <li><a href="{{ route('listDetail.show', $oneProduct->id) }}"><img src="{{$oneProduct->image}}" alt="" class=""></a></li>
        @else
          <li><a href="{{ route('listDetail.show', $oneProduct->id) }}"><img src="/storage/products/{{$oneProduct->image}}" alt="" class=""></a></li>
        @endif
        <li><a href="{{ route('listDetail.show', $oneProduct->id) }}"><h4>{{$oneProduct->name}}</h4></a></li>
        <li><a href="{{ route('listDetail.show', $oneProduct->id) }}"><h4>$ {{$oneProduct->price}}</h4></a></li>
      </ul>
    @empty
      <h2>No hemos encontrado lo estas buscando</h2>
    @endforelse
  </div>
  <br>
    {{-- Paginado --}}
  <div class="container_buttons">
    {{$productsCategory->links()}}
  </div>

@endsection
