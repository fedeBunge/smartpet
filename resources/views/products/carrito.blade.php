@extends('template.products.templateProducts')

@section('title', 'carrito de compras')

@section('content')

<h4>Tu Carrito de Compras:</h4>
<br>
{{-- @dd($products) --}}

<div class="table-responsive-sm">
	<table class="table">
		<tr>
			<td>Nombre</td>
			<td>Precio $</td>
			<td>Categoria</td>
			<td>Animal</td>
			{{-- <td>Descripción</td> --}}
	  </tr>

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






@endsection
