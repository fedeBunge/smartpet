@extends('template.products.templateProducts')

@section('title', 'Detalle del Producto')

@section('content')

<h2>{{ $product->name }}</h2>
<div class="container-fluid">
	<table class="table">
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Precio $</td>
			<td>Categoria</td>
			<td>Animal</td>
			<td>Descripción</td>
	  </tr>

		<tr>
			@if (substr($product->image, 0, 4) == 'http')
				<td><img src="{{$product->image}}" width="320" alt="" class=""></td>
			@else
				<td><img src="/storage/products/{{$product->image}}" width="320" alt="" class=""></td>
			@endif
			<td>{{ $product->name }}</td>
			<td>{{$product->price}}</td>
			<td>{{$product->category->name}}</td>
			<td>{{$product->animal->name}}</td>
			<td>{{$product->description}}</td>
		</tr>
	</table>
</div>

@guest

<a href="{{ URL::previous() }}" class="btn btn-primary" style="width: 78px;">Volver</a>

	@else

		@if (Auth::user()->admin)

			<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" style="width: 78px;">Edit</a>

			<form action="/products/{{ $product->id }}" method="post" style="display: inline-block;" style="width: 78px;">
				@csrf
				{{ method_field('DELETE') }}
				<button id="delete" type="submit" class="btn btn-danger">Delete</button>
			</form>

			@endif

			<a href="{{ URL::previous() }}" class="btn btn-primary" style="width: 78px;">Volver</a>

@endguest



@endsection
