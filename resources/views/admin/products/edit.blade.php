@extends('/admin/plantilla/app_admin')

@section('Titulo', 'Editar Producto')

@section('contenido')
    <div class="container">
      <h1 class="text-2xl font-bold mb-4">Products</h1>
        <form class="row g-3 needs-validation" novalidate method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">ID categoria</label>
              <input type="text" class="form-control @error('category_id') is-invalid @enderror" id="validationCustomUsername" name="category_id" aria-describedby="inputGroupPrepend" value="{{ old('category_id', $product->category_id) }}" required>
              @error('category_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @else
                <div class="invalid-feedback">
                  Ingresa el ID categoria
                </div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">ID proveedor</label>
                <input type="text" class="form-control @error('supplier_id') is-invalid @enderror" id="validationCustomUsername" name="supplier_id" aria-describedby="inputGroupPrepend" value="{{ old('supplier_id', $product->supplier_id) }}" required>
                @error('supplier_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @else
                  <div class="invalid-feedback">
                    Ingresa el ID proveedor
                  </div>
                @enderror
              </div>
            <div class="col-md-5">
              <label for="validationCustom05" class="form-label">Nombre</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="validationCustom05" name="name" value="{{ old('name', $product->name) }}" required>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @else
                <div class="invalid-feedback">
                  Por favor ingresa un nombre
                </div>
              @enderror
            </div>
            <div class="col-md-5">
              <label for="validationCustom01" class="form-label">Descripción</label>
              <input type="text" class="form-control @error('description') is-invalid @enderror" id="validationCustom01" name="description" value="{{ old('description', $product->description) }}" required>
              @error('description')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @else
                <div class="invalid-feedback">
                  Por favor ingrese una descripción válida
                </div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Existencias</label>
              <input type="text" class="form-control @error('existence') is-invalid @enderror" id="validationCustom03" name="existence" value="{{ old('existence', $product->existence) }}" required>
              @error('existence')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @else
                <div class="invalid-feedback">
                  Por favor ingresa existencias
                </div>
              @enderror
            </div>
            <div class="col-md-3">
              <label for="validationCustom03" class="form-label">Precio</label>
              <input type="text" class="form-control @error('price') is-invalid @enderror" id="validationCustom03" name="price" value="{{ old('price', $product->price) }}" required>
              @error('price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @else
                <div class="invalid-feedback">
                  Por favor ingrese un precio
                </div>
              @enderror
            </div>
            <div class="col-md-3">
              <label for="validationCustom03" class="form-label">Stock máximo</label>
              <input type="text" class="form-control @error('stock_max') is-invalid @enderror" id="validationCustom03" name="stock_max" value="{{ old('stock_max', $product->stock_max) }}" required>
              @error('stock_max')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @else
                <div class="invalid-feedback">
                  Por favor ingresa stock máximo
                </div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">Stock mínimo</label>
              <input type="text" class="form-control @error('stock_min') is-invalid @enderror" id="validationCustom01" name="stock_min" value="{{ old('stock_min', $product->stock_min) }}" required>
              @error('stock_min')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @else
                <div class="invalid-feedback">
                  Por favor ingrese stock mínimo
                </div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="status" class="form-label">Estatus</label>
              <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                  <option value="" disabled {{ old('status', $product->status) ? '' : 'selected' }}>Selecciona un estatus</option>
                  <option value="activo" {{ old('status', $product->status) == 'activo' ? 'selected' : '' }}>Activo</option>
                  <option value="inactivo" {{ old('status', $product->status) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
              </select>
              @error('status')
                  <div class="invalid-feedback">{{ $message }}</div>
              @else
                  <div class="invalid-feedback">Por favor seleccione un estatus válido.</div>
              @enderror
          </div>
            <div class="col-md-5">
              <label for="validationCustom05" class="form-label">Imágenes</label>
              <div class="flex items-center">
                @foreach ($product->images as $image)
                  <div style="display: inline-block; margin-right: 10px;">
                    <img src="{{ asset($image->route) }}" alt="{{ $product->name }}" width="100">
                  </div>
                @endforeach
              </div>
              <input type="file" accept="image/*" class="form-control @error('images') is-invalid @enderror" id="validationCustom05" name="images[]" multiple>
              @error('images')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @else
                <div class="invalid-feedback">
                  Por favor sube una imagen
                </div>
              @enderror
            </div> 
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Enviar</button>
              &nbsp;
              <a href="/products" class="btn btn-primary">Regresar</a>
            </div>
        </form>
    </div>

    <link rel="stylesheet" href="/css/form.css">
    <script src="/js/formulario.js"></script>
@endsection
