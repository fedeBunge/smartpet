@extends('template.base')

@section('title', 'SmartPet - Crear producto')

@section('content')

  <div class="registro-titulos crear-editar-producto">
    <h1>Crear un producto nuevo</h1>
    <h5>Completa todos los datos</h5>
  </div>

  <form class="registro-formulario crear-editar-producto" action="/products" method="post" enctype="multipart/form-data">

    @csrf

    <div class="registro-container-campos">

      <div class="registro-nombre-y-campo">
        <label for="name" class="producto-nombre">Título:</label>
        <div class="producto-campo">
          <input type="text" name="name" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'borde-rojo-error' : '' }}">
          <br>
          <span class="registro-error">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="price" class="producto-nombre">Precio:</label>
        <div class="producto-campo">
          <input type="text" name="price" value="{{ old('price') }}" class="{{ $errors->has('price') ? 'borde-rojo-error' : '' }}">
          <br>
          <span class="registro-error">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="brand_id" class="producto-nombre">Marca:</label>
        <div class="producto-campo">
          <select name="brand_id" value="" class="{{ $errors->has('brand_id') ? 'borde-rojo-error' : '' }}">
            <option value="">-------- Elige una marca --------</option>
            @foreach ($brands as $oneBrand)
              <option value="{{ $oneBrand->id }}" {{ old('brand_id') == $oneBrand->id ? 'selected' : '' }}>{{ $oneBrand->name }}</option>
            @endforeach
          </select>
          <br>
          <span class="registro-error">{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="category_id" class="producto-nombre">Categoría:</label>
        <div class="producto-campo">
          <select name="category_id" value="" class="{{ $errors->has('category_id') ? 'borde-rojo-error' : '' }}">
            <option value="">------ Elige una categoría ------</option>
            @foreach ($categories as $oneCategory)
              <option value="{{ $oneCategory->id }}" {{ old('category_id') == $oneCategory->id ? 'selected' : '' }}>{{ $oneCategory->name }}</option>
            @endforeach
          </select>
          <br>
          <span class="registro-error">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="animal_id" class="producto-nombre">Animal:</label>
        <div class="producto-campo">
          <select name="animal_id" value="" class="{{ $errors->has('animal_id') ? 'borde-rojo-error' : '' }}">
            <option value="">--------- Elige un animal --------</option>
            @foreach ($animals as $oneAnimal)
              <option value="{{ $oneAnimal->id }}" {{ old('animal_id') == $oneAnimal->id ? 'selected' : '' }}>{{ $oneAnimal->name }}</option>
            @endforeach
          </select>
          <br>
          <span class="registro-error">{{ $errors->has('animal_id') ? $errors->first('animal_id') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="description" class="producto-nombre descripcion-producto">Descripción:</label>
        <div class="producto-campo">
          <textarea name="description" rows="5" class="text-area-crear-editar-productos {{ $errors->has('description') ? 'borde-rojo-error' : '' }}">{{ old('description') }}</textarea>
          <br>
          <span class="registro-error">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="image" class="producto-nombre">Imagen:</label>
        <div class="producto-campo">
          <input type="file" name="image" value="" class="{{ $errors->has('image') ? 'borde-rojo-error' : '' }}" accept=".jpg, .jpeg, .png, .bmp, .gif, .svg">
          <br>
          <div class="registro-leyenda-archivo">
            <span class="registro-leyenda-archivo-formatos">Formatos: jpg, jpeg, png, bmp, gif, svg</span>
            <span class="registro-leyenda-archivo-tamaño">Tamaño máximo: 2MB</span>
          </div>
          <span class="registro-error">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
        </div>
      </div>

    </div>

    <div class="registro-buttons">
      <button class="registro-button confirm-button" type="submit">Crear</button>
      <button class="registro-button cancel-button" type="">Cancelar</button>
    </div>

  </form>

@endsection

@section('other-scripts')
  <script src={{ asset('/js/cancelButton.js') }}></script>
@endsection
