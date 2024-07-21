@extends('cliente.plantilla.app')

@section('Titulo', 'Mis Órdenes')

@section('contenido')

<div class="container mt-4">
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <div class="card">
      <div class="card-header bg-secondary text-white">
          Mis Órdenes
      </div>
      <div class="card-body">
          <table class="table table-striped">
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
                  @forelse ($orders as $order)
                  <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->customer->name }} {{ $order->customer->last_name }}</td>
                      <td>
                          @foreach ($order->orderDetails as $detail)
                          <div>
                            {{ $detail->product->name }} <br>
                            - <strong>Cantidad:</strong> {{ $detail->quantity }} <br>
                            - <strong>Precio:</strong> ${{ number_format($detail->price, 2, '.', ',') }} MXN
                        </div>
                        
                          <br>
                          @endforeach
                      </td>
                      <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y') }}</td>
                      <td>${{ number_format($order->total, 2, '.', ',') }} MXN</td>
                      @if ($order->status === 'en_proceso')
                      <td>
                        Pago pendiente
                        <br>
                        <a href="{{ route('metodo_pago', ['orderId' => $order->id]) }}" class="btn btn-sm btn-success">Ir a método de pago</a>
                      </td>
                      @else
                      <td>{{ $order->status }}</td>
                      @endif        
                      <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Ver detalles</a>
                      </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="7" class="text-center">No tienes órdenes.</td>
                  </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
  </div>
</div>

@endsection
