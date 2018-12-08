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
{{-- @dd($productsCategory) --}}



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



@endsection
