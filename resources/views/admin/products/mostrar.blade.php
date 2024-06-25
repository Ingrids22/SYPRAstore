@extends('/admin/plantilla/app_admin')

@section('Titulo', 'products')

@section('contenido')
    <div class="container">
      <h1 class="text-2xl font-bold mb-4">Products</h1>
        <form class="row g-3 needs-validation" novalidate method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">ID categoria</label>
              <input type="text" class="form-control" id="validationCustomUsername" name="category_id" aria-describedby="inputGroupPrepend" value={{$product->category_id}} readonly>
              <div class="invalid-feedback">
                Ingresa el ID categoria
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">ID proveedor</label>
                <input type="text" class="form-control" id="validationCustomUsername" name="supplier_id" aria-describedby="inputGroupPrepend" value={{$product->supplier_id}} readonly>
                <div class="invalid-feedback">
                  Ingresa el ID proveedor
                </div>
              </div>
            <div class="col-md-5">
              <label for="validationCustom05" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="validationCustom05" name="name" value={{$product->name}} readonly>
              <div class="invalid-feedback">
              Por favor ingresa un nombre
              </div>
            </div>
            <div class="col-md-5">
              <label for="validationCustom01" class="form-label">Descripción</label>
              <input type="text" class="form-control" id="validationCustom01" name="description" value={{$product->description}} readonly>
              <div class="invalid-feedback">
                Por favor ingrese una descripción válida
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Existencias</label>
              <input type="text" class="form-control" id="validationCustom03" name="existence" value={{$product->existence}} readonly>
              <div class="invalid-feedback">
                Por favor ingresa existencias
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom03" class="form-label">Precio</label>
              <input type="text" class="form-control" id="validationCustom03" name="price" value={{$product->price}} readonly>
              <div class="invalid-feedback">
                Por favor ingrese un precio
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom03" class="form-label">Stock máximo</label>
              <input type="text" class="form-control" id="validationCustom03" name="stock_max" value={{$product->stock_max}} readonly>
              <div class="invalid-feedback">
                Por favor ingresa stock maximo 
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">Stock minimo</label>
              <input type="text" class="form-control" id="validationCustom01" name="stock_min" value={{$product->stock_min}} readonly>
              <div class="invalid-feedback">
                Por favor ingrese stock minimo
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">Estatus</label>
              <input type="text" class="form-control" id="validationCustom01" name="status" value={{$product->status}} readonly>
              <div class="invalid-feedback">
                Por favor ingrese un estatus válido
              </div>
            </div>    
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Enviar</button>
            &nbsp
            <a href="/products" class="btn btn-primary">Regresar</a>
      </div>
      </form>
      </div>

    <link rel="stylesheet" href="/css/form.css">
    <script src="/js/formulario.js"></script>


@endsection
