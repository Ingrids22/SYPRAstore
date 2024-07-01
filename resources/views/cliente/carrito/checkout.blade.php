@extends('cliente/plantilla/app')

@section('Titulo','SYPRA')

@section('contenido')

<div class="container">
    <h1>Checkout</h1>
    <form action="{{ route('order.create') }}" method="POST">
        @csrf
        <div class="text-right">
            <button type="submit" class="btn btn-success">Confirmar Pedido</button>
        </div>
    </form>
</div>
@endsection


@endsection