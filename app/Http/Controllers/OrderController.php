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

    public function verOrdenes($id)
{
    $user = Auth::user(); // Obtener el usuario autenticado
    $customer_id = $user->id; // Obtener el ID del cliente desde el usuario autenticado

    // Obtener todas las órdenes del cliente actual
    $orders = Order::where('customer_id', $customer_id)->get();
    $producto = $id;
    return view('cliente.ordenescliente', compact('orders'), compact('producto') );
}

    public function crearPedido(Request $request)
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $customer_id = $user->id;

        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $producto = $request->input('producto');

            $order = new Order();
            $order->customer_id = $customer_id;
            $order->total = $quantity;
            $order->fecha_orden = now();
            $order->status = 'activo';
            $order->save();

            // $details = session('cart')[$id];
            // dd($producto);

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $customer_id;
            $orderDetail->product_id = $producto;
            $orderDetail->quantity = $quantity;
            $orderDetail->price = $price;
            $orderDetail->save();

            $product = Product::find($producto);
            if ($product) {
                $product->existence -= $quantity;
                $product->save();
            }

            $orders = Order::where('customer_id', $customer_id)->get();

            return view('/cliente/ordenescliente', compact('orders'), compact('producto'));


            // return response()->json(['message' => 'Pedido creado exitosamente', 'order_id' => $order->id]);
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return response()->json(['message' => 'Error al crear el pedido: ' . $e->getMessage()], 500);
        // }
    }
}
