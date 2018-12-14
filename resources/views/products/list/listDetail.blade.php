@extends('template.products.templateProducts')

@section('title', 'Detalle del Producto')

@section('content')
	<h2>{{ $product->name }}</h2>
	<table class="table">
		<tr>
			<td>Imagen</td>
			<td>Precio</td>
			<td>Categoria</td>
			<td>Descripción</td>
	  </tr>
	</table>
	<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
	{{-- <a href="/products/{{ $product->id }}/edit" class="btn btn-warning">Edit</a> --}}

	<form action="/products/{{ $product->id }}" method="post" style="display: inline-block;">
		@csrf
		{{ method_field('DELETE') }}
		<button id="delete" type="submit" class="btn btn-danger">Delete</button>
	</form>

  @endsection
