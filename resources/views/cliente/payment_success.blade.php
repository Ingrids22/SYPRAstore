@extends('cliente.plantilla.app')

@section('Titulo', 'Ordenes')

@section('contenido')
<head>
    <title>Orden #{{ $order->id }}</title>
</head>
<div class="container">
    <h1>Pago realizado</h1>
    <p>Transaction ID: {{ $transactionId }}</p>
    <h2>Detalles de Orden:</h2>
    <p># de Orden: {{ $order->id }}</p>
    <p>Total: {{ $payment->amount }} {{ $payment->currency }}</p>
    <p>Estado del pedido: {{ $order->status }}</p>

    <h2>Dirección de Envío:</h2>
    <p>{{ $shipping_address['recipient_name'] }}</p>
    <p>{{ $shipping_address['line1'] }}</p>
    <p>{{ $shipping_address['line2'] ?? '' }}</p>
    <p>{{ $shipping_address['city'] }}, {{ $shipping_address['state'] }} {{ $shipping_address['postal_code'] }}</p>
    <p>{{ $shipping_address['country_code'] }}</p>

    <a href="{{ route('cliente.ordenescliente') }}" class="btn btn-sm btn-primary">Volver a órdenes</a>
</div>
@endsection
