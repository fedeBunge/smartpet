@extends('template.products.templateProducts')

@section('title', 'carrito de compras')

@section('content')

<h4>Tu Carrito de Compras:</h4>
<br>
{{-- @dd($products) --}}

<div class="table-responsive-sm">

	@if ($products)
		<table class="table tabla_carrito">
			<tr class="tr_indice">
				<td><b>Nombre</b></td>
				<td><b>Precio $</b></td>
				<td><b>Categoria</b></td>
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
      <h4>No Tienes Productos en tu Carrito</h4>
    @endforelse

	</table>
</div>

@if ($products)
	<button id="vaciarCarrito" type="button" class="btn btn-primary">Vaciar Carrito</button>
@endif





@endsection
