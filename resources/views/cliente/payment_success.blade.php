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
    <a href="{{ route('cliente.ordenescliente') }}" class="btn btn-sm btn-primary">Volver a órdenes</a>
</div>
@endsection
