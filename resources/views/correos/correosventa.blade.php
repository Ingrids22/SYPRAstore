@extends('cliente/plantilla/app')

@section('Titulo', 'SYPRA')

@section('contenido')

<!DOCTYPE html>
<html>
<head>
    <title>Notificación de Venta</title>
</head>
<body>
    <h1>¡Nueva Venta Realizada!</h1>
    <p>Estimad@ {{ $order->customer->name }},</p>
    <p>Nos complace informarle que su pedido ha sido recibido exitosamente. A continuación, los detalles de su compra:</p>
    
    <h2>Detalles del Pedido</h2>
    <p><strong>Número de Pedido:</strong> {{ $order->id }}</p>
    <p><strong>Fecha:</strong> {{ $order->order_date }}</p>
    
    <h2>Productos</h2>
    <ul>
        @foreach($order->orderDetails as $detail)
            <li>{{ $detail->product->name }} - {{ $detail->quantity }} x ${{ $detail->price }}</li>
        @endforeach
    </ul>
    
    <p><strong>Total:</strong> ${{ $order->total }}</p>

    <p>Gracias por su compra.</p>
    <p>Atentamente,</p>
    <p>Tu Tienda</p>
</body>
</html>


@endsection