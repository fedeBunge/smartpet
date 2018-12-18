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
        @if (substr($product->image, 0, 4) == 'http')
          <img class="imagen-editar-producto" src="{{ $product->image }}" alt="Imagen del producto">
        @else
          <img class="imagen-editar-producto" src="/storage/products/{{ $product->image }}" alt="Imagen del producto">
        @endif
      </div>

      <div class="registro-nombre-y-campo">
        <label for="name" class="producto-nombre">Título:</label>
        <div class="producto-campo">
          <input type="text" name="name" value="{{ old('name', $product->name) }}" class="{{ $errors->has('name') ? 'borde-rojo-error' : '' }}">
          <br>
          <span class="registro-error">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="price" class="producto-nombre">Precio:</label>
        <div class="producto-campo">
          <input type="text" name="price" value="{{ old('price', $product->price) }}" class="{{ $errors->has('price') ? 'borde-rojo-error' : '' }}">
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
              <option value="{{ $oneBrand->id }}"
                @if (!$errors->has('brand_id'))
                  @if (old('brand_id'))
                    {{ old('brand_id') == $oneBrand->id ? 'selected' : '' }}
                  @else
                  {{ $product->brand_id == $oneBrand->id ? 'selected' : '' }}
                  @endif
                @endif
              >{{ $oneBrand->name }}</option>
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
              <option value="{{ $oneCategory->id }}"
                @if (!$errors->has('category_id'))
                  @if (old('category_id'))
                    {{ old('category_id') == $oneCategory->id ? 'selected' : '' }}
                  @else
                  {{ $product->category_id == $oneCategory->id ? 'selected' : '' }}
                  @endif
                @endif
              >{{ $oneCategory->name }}</option>
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
              <option value="{{ $oneAnimal->id }}"
                @if (!$errors->has('animal_id'))
                  @if (old('animal_id'))
                    {{ old('animal_id') == $oneAnimal->id ? 'selected' : '' }}
                  @else
                  {{ $product->animal_id == $oneAnimal->id ? 'selected' : '' }}
                  @endif
                @endif
              >{{ $oneAnimal->name }}</option>
            @endforeach
          </select>
          <br>
          <span class="registro-error">{{ $errors->has('animal_id') ? $errors->first('animal_id') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="description" class="producto-nombre descripcion-producto">Descripción:</label>
        <div class="producto-campo">
          <textarea name="description" rows="5" class="text-area-crear-editar-productos {{ $errors->has('description') ? 'borde-rojo-error' : '' }}">{{ old('description', $product->description) }}</textarea>
          <br>
          <span class="registro-error">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
        </div>
      </div>

      <div class="registro-nombre-y-campo">
        <label for="changeImage" class="producto-nombre">Nueva imagen:</label>
        <div class="producto-campo">
          <input type="file" name="changeImage" value="" class="{{ $errors->has('changeImage') ? 'borde-rojo-error' : '' }}" accept=".jpg, .jpeg, .png, .bmp, .gif, .svg">
          <br>
          <div class="registro-leyenda-archivo">
            <span class="registro-leyenda-archivo-formatos">Formatos: jpg, jpeg, png, bmp, gif, svg</span>
            <span class="registro-leyenda-archivo-tamaño">Tamaño máximo: 2MB</span>
          </div>
          <span class="registro-error">{{ $errors->has('changeImage') ? $errors->first('changeImage') : '' }}</span>
        </div>
      </div>

    </div>

    <div class="registro-buttons">
      <button class="registro-button confirm-button" type="submit">Guardar</button>
      <button class="registro-button cancel-button" type="">Cancelar</button>
    </div>

  </form>

@endsection

@section('other-scripts')
  <script src={{ asset('/js/cancelButton.js') }}></script>
@endsection
