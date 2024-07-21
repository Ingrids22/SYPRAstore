@extends('cliente.plantilla.app')

@section('Titulo', 'Detalles de la Orden')

@section('contenido')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h2>Detalles del Pago</h2>
            </div>
            <div class="card-body">
                <h3 class="card-title">Orden #{{ $order->id }}</h3>

                @if ($order->payment)
                    <div class="mt-4">
                        <h4>Detalles del Pago</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>ID del Pago:</strong> {{ $order->payment->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>ID del Pagador:</strong> {{ $order->payment->payer_id }}
                            </li>
                            <li class="list-group-item">
                                <strong>Correo del Pagador:</strong> {{ $order->payment->payer_email }}
                            </li>
                            <li class="list-group-item">
                                <strong>Monto:</strong> ${{ number_format($order->payment->amount, 2) }} {{ $order->payment->currency }}
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="alert alert-warning mt-4">
                        No hay información de pago disponible.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
