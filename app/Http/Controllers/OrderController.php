<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        // Obtener todas las órdenes del cliente autenticado
        $orders = Order::where('id', auth()->id())->get();

        // Pasar las órdenes a la vista
        return view('cliente.ordenescliente', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:customers,id',
            'fecha_orden' => 'required|date',
            'status' => 'required|string|in:activo,inactivo',
        ]);

        $order = new Order();
        $order->fill($validatedData);
        $order->save();

        return redirect()->route('orders.index');
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.orders.mostrar')->with('order', $order);
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.orders.edit')->with('order', $order);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:customers,id',
            'fecha_orden' => 'required|date',
            'status' => 'required|string|in:activo,inactivo',
        ]);

        $order = Order::find($id);
        $order->fill($validatedData);
        $order->save();

        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('orders.index');
    }
    public function verOrdenes()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $customer_id = $user->id; // Obtener el ID del cliente desde el usuario autenticado
    
        // Obtener todas las órdenes del cliente actual, con los detalles de los productos y el nombre del cliente
        $orders = Order::where('customer_id', $customer_id)
            ->with(['orderDetails.product', 'customer'])
            ->get();
    
        return view('cliente.ordenescliente', compact('orders'));
    }
    
    
    public function crearPedido(Request $request)
{
    $user = Auth::user(); // Obtener el usuario autenticado
    $customer_id = $user->id;

    // Obtener los productos del request
    $productos = $request->input('productos', []);

    // Validar que productos no esté vacío
    if (empty($productos)) {
        return response()->json(['message' => 'No hay productos en el pedido'], 400);
    }

    DB::beginTransaction(); // Inicia una transacción

    try {
        $order = new Order();
        $order->customer_id = $customer_id;
        $order->total = array_sum(array_map(function($producto) {
            return $producto['quantity'] * $producto['price'];
        }, $productos));
        $order->fecha_orden = now();
        $order->status = 'activo';
        $order->save();

        foreach ($productos as $producto) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id; // Usa el ID de la orden recién creada
            $orderDetail->product_id = $producto['id'];
            $orderDetail->quantity = $producto['quantity'];
            $orderDetail->price = $producto['price'];
            $orderDetail->save();

            $product = Product::find($producto['id']);
            if ($product) {
                $product->existence -= $producto['quantity'];
                $product->save();
            }
        }

        DB::commit(); // Confirma la transacción

        $orders = Order::where('customer_id', $customer_id)->get();

        return view('cliente.ordenescliente', compact('orders'));

    } catch (\Exception $e) {
        DB::rollBack(); // Revierte la transacción en caso de error
        return response()->json(['message' => 'Error al crear el pedido: ' . $e->getMessage()], 500);
    }
}

    
}
