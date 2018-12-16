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
			<td>Descripción</td>
	  </tr>

		<tr>
			<td><img src="{{$product->image}}" alt="" class=""></td>
			<td>{{ $product->name }}</td>
			<td>{{$product->price}}</td>
			<td>{{$product->category->name}}</td>
			<td>{{$product->description}}</td>
		</tr>

	</table>
</div>
	<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" style="width: 78px;">Edit</a>
	{{-- <a href="/products/{{ $product->id }}/edit" class="btn btn-warning">Edit</a> --}}

	<form action="/products/{{ $product->id }}" method="post" style="display: inline-block;" style="width: 78px;"">
		@csrf
		{{ method_field('DELETE') }}
		<button id="delete" type="submit" class="btn btn-danger">Delete</button>
	</form>

	<a href="{{ URL::previous() }}" class="btn btn-primary" style="float:right;" style="width: 78px;">Volver</a>


  @endsection
