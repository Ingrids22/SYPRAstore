@extends('cliente/plantilla/app')

@section('Titulo', 'SYPRA')

@section('contenido')
<head>
</head>

<!-- Modal de error -->
<!-- Modal de error -->
@if(session('error'))
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('error') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endif

<table id="cart" class="table table-hover table-condensed">
    <!-- Resto del contenido del carrito -->

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
                                <img src="{{ asset('storage/' . $details['image']) }}" width="250" class="img-responsive"/>
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
                        <input type="number" name="productos[{{ $loop->index }}][quantity]" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        <input type="hidden" name="productos[{{ $loop->index }}][price]" value="{{ $details['price'] }}" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                    <input type="hidden" name="productos[{{ $loop->index }}][id]" value="{{ $id }}" />
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
                <button type="submit" class="btn btn-success">Checkout</button>
            </td>
        </tr>
        </form>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    @if(session('error'))
        $('#errorModal').modal('show');
    @endif
  });

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
