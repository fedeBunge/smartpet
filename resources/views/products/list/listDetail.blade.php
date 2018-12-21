@extends('template.products.templateProducts')

@section('title', 'SmartPet - Detalle del Producto')

@section('content')

<div class="container">

	<div class="row">
		<h2>{{ $product->name }}</h2>
	</div>
	<br>

	@if (substr($product->image, 0, 4) == 'http')
		<img src="{{$product->image}}" width="250" alt="" class="">
	@else
		<img src="/storage/products/{{$product->image}}" width="250" alt="" class="">
	@endif
	<br><br>
	<h4>Precio </h4>
	<p>${{$product->price}}</p>
	<br>
	<table class="table">
		<tr class="">
			<td><b>Categoria</b></td>
			<td><b>Animal</b></td>
			{{-- <td>Descripción</td> --}}
	  </tr>
		<tr>
			<td>{{$product->category->name}}</td>
			<td>{{$product->animal->name}}</td>
		</tr>
	</table>
	<h3>Descripción</h3>
	<p>{{$product->description}}</p>

	<br>

	<div class="row">
			<h3>Agregar al carrito: </h3>
			<a class="buttonCarrito carrito-agregar-producto" data-id="{{ $product->id}}" data-name="{{ $product->name}}" href="#" ><img class="img-Carrito" src="/images/carrito.png" alt="carrito"></a>
	</div>
{{-- </div> --}}
	<br>

@guest

<a href="{{ URL::previous() }}" class="btn btn-primary" style="width: 78px;">Volver</a>

	@else

		@if (Auth::user()->admin)

			<form class="boton-borrar-producto" action="/products/{{ $product->id }}" method="post" style="display: inline-block;" style="width: 78px;">
				@csrf
				{{ method_field('DELETE') }}
				<button id="delete" type="submit" class="btn btn-danger">Delete</button>
			</form>

			<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" style="width: 78px; margin-right: 20px; margin-left: 20px">Edit</a>

			@endif

			<a href="{{ URL::previous() }}" class="btn btn-primary" style="width: 78px;">Volver</a>


@endguest

</div>

<br>

@endsection

@section('other-scripts')
	<script src={{ asset('/js/confirmarDelete.js') }}></script>
@endsection
