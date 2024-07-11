@extends('cliente.plantilla.app')

@section('Titulo', 'Ordenes')

@section('contenido')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10">
          <div class="card">
              <div class="card-header">Mis Órdenes</div>

              <div class="card-body">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Cliente</th>
                              <th>Productos</th>
                              <th>Fecha de Orden</th>
                              <th>Total</th>
                              <th>Estado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($orders as $order)
                          <tr>
                              <td>{{ $order->id }}</td>
                              <td>{{ $order->customer->name }} {{ $order->customer->last_name }}</td>
                              <td>
                                  @foreach ($order->orderDetails as $detail)
                                  <br>
                                      {{ $detail->product->name }} 
                                      <br>
                                      - Cantidad: {{ $detail->quantity }} 
                                      <br>
                                      - Precio: {{ $detail->price }}
                                      <br>
                                  @endforeach
                              </td>
                              <td>{{ $order->fecha_orden }}</td>
                              <td>{{ $order->total }}</td>
                              <td>{{ $order->status }}</td>
                              <td>
                                <a href="{{ url('/payment') }}" class="btn btn-sm btn-primary">Ver Detalles</a>
                                  <!-- Puedes agregar más acciones como editar o eliminar si es necesario -->
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
