@extends('template.products.templateProducts')

@section('title', 'SmartPet - Carrito de compras')

@section('content')

	<h4>Carrito de compras:</h4>
	<br>
	{{-- @dd($products) --}}

	<div class="table-responsive-sm">

		@if ($products)
			<table class="table tabla_carrito">
				<tr class="tr_indice">
					<td><b>Nombre</b></td>
					<td><b>Precio $</b></td>
					<td><b>Categoría</b></td>
					<td><b>Animal</b></td>
					{{-- <td>Descripción</td> --}}
			  </tr>
		@endif

	  @forelse ($products as $product)
	    <tr>
	      <td>{{$product->name }}</td>
				<td>{{$product->price}}</td>
				<td>{{$product->category->name}}</td>
				<td>{{$product->animal->name}}</td>
	    </tr>
			{{-- <td>{{$product->description}}</td> --}}
	  @empty
	    <h4>No tienes productos en tu carrito</h4>
	  @endforelse

		</table>
	</div>

	@if ($products)
		<button id="vaciarCarrito" type="button" class="btn btn-primary">Vaciar carrito</button>
	@endif

@endsection
