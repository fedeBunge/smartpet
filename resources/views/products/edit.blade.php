@extends('template.base')

@section('title', 'SmartPet - Editar producto')

@section('content')

  <div class="registro-titulos crear-editar-producto">
    <h1>Editar producto</h1>
    <h5>Realiza las modificaciones deseadas</h5>
  </div>

  <form class="registro-formulario crear-editar-producto" action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">

    @csrf
    {{ method_field('PUT') }}

    <div class="registro-container-campos">

      <div class="registro-nombre-y-campo container-imagen-editar-producto">
        <img class="imagen-editar-producto" src="{{ $product->image }}" alt="Imagen del producto">
      </div>

      <div class="registro-nombre-y-campo">
        <label for="name" class="registro-nombre">Título:</label>
        <div class="registro-campo">
          <input type="text" name="name" value="{{ old('name', $product->name) }}" class="{{ $errors->has('name') ? 'borde-rojo-error' : '' }}">
          <br>
          <span class="registro-error">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="price" class="registro-nombre">Precio:</label>
        <div class="registro-campo">
          <input type="text" name="price" value="{{ old('price', $product->price) }}" class="{{ $errors->has('price') ? 'borde-rojo-error' : '' }}">
          <br>
          <span class="registro-error">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="brand_id" class="registro-nombre">Marca:</label>
        <div class="registro-campo">
          <select name="brand_id" value="" class="{{ $errors->has('brand_id') ? 'borde-rojo-error' : '' }}">
            <option value="">-------- Elige una marca --------</option>
            @foreach ($brands as $oneBrand)
              <option value="{{ $oneBrand->id }}" {{ $product->brand_id == $oneBrand->id ? 'selected' : '' }}>{{ $oneBrand->name }}</option>
            @endforeach
          </select>
          <br>
          <span class="registro-error">{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="category_id" class="registro-nombre">Categoría:</label>
        <div class="registro-campo">
          <select name="category_id" value="" class="{{ $errors->has('category_id') ? 'borde-rojo-error' : '' }}">
            <option value="">------ Elige una categoría ------</option>
            @foreach ($categories as $oneCategory)
              <option value="{{ $oneCategory->id }}" {{ $product->category_id == $oneCategory->id ? 'selected' : '' }}>{{ $oneCategory->name }}</option>
            @endforeach
          </select>
          <br>
          <span class="registro-error">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="animal_id" class="registro-nombre">Animal:</label>
        <div class="registro-campo">
          <select name="animal_id" value="" class="{{ $errors->has('animal_id') ? 'borde-rojo-error' : '' }}">
            <option value="">--------- Elige un animal --------</option>
            @foreach ($animals as $oneAnimal)
              <option value="{{ $oneAnimal->id }}" {{ $product->animal_id == $oneAnimal->id ? 'selected' : '' }}>{{ $oneAnimal->name }}</option>
            @endforeach
          </select>
          <br>
          <span class="registro-error">{{ $errors->has('animal_id') ? $errors->first('animal_id') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="description" class="registro-nombre descripcion-producto">Descripción:</label>
        <div class="registro-campo">
          <textarea name="description" rows="5" class="text-area-crear-editar-productos {{ $errors->has('description') ? 'borde-rojo-error' : '' }}">{{ old('description', $product->description) }}</textarea>
          <br>
          <span class="registro-error">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="image" class="registro-nombre">Nueva imagen:</label>
        <div class="registro-campo">
          <input type="text" name="image" value="{{ old('image', $product->image) }}" class="{{ $errors->has('image') ? 'borde-rojo-error' : '' }}">
          <br>
          <span class="registro-error">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
        </div>
      </div>

    </div>

    <button class="registro-button" type="submit">Guardar cambios</button>

  </form>

@endsection
