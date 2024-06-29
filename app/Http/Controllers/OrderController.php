<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Obtener todas las órdenes del cliente autenticado
        $orders = Order::where('client_id', auth()->id())->get();
        
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
            'customer_id' => 'required|integer|exists:customers,id',
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
            'customer_id' => 'required|integer|exists:customers,id',
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
}
