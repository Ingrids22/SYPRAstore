@extends('cliente/plantilla/app')

@section('Titulo','SYPRA')

@section('contenido')
<head>
</head>

<table id="cart" class="table table-hover table-condensed">

    <thead>
        <tr>
            <th style="width:5%">Id</th>
            <th style="width:20%">Producto</th>
            <th style="width:20%">Name</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        <form action="{{ route('carrito.crear') }}" method="POST" style="display:inline;">
            @csrf

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="id">{{ $id }}</td>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('storage/' . $details['image']) }}" width="250
                                " class="img-responsive"/>
                            </div>
                        </div>
                    </td>
                    <td data-th="name">
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        <input type="hidden" name="price" value="{{ $details['price'] }}" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                    <input type="hidden" name="producto" value="{{ $id }}" />
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/catalogo') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
{{--                     <a href="{{ route('cliente.ordenes', ['id' => $id]) }}" class="btn btn-secondary"> To Watch Orders <i class="fa fa-angle-right"></i></a> --}}
                    <button type="submit" class="btn btn-success">Checkout</button>
                </td>
            </tr>
        </form>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">

  $(".update-cart").change(function (e) {
    e.preventDefault();

    var ele = $(this);
    var quantity = ele.val();
    var productId = ele.closest("tr").data("id");

    $.ajax({
        url: '{{ route('carrito.actualizar') }}',
        method: "POST",
        data: {
            _token: '{{ csrf_token() }}',
            id: productId,
            quantity: quantity
        },
        success: function (response) {
            window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});


    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('carrito.quitar') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
