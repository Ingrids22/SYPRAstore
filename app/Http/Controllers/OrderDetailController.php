<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        // Obtener todos los detalles del pedido
        $orderDetails = OrderDetail::all();

        // Pasar los detalles del pedido a la vista
        return view('admin.order_details.index', compact('orderDetails'));
    }

    public function show($id)
    {
        $orderDetail = OrderDetail::find($id);
        return view('admin.order_details.show', compact('orderDetail'));
    }

    public function create()
    {
        return view('admin.order_details.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        OrderDetail::create($validatedData);

        return redirect()->route('order_details.index');
    }

    public function edit($id)
    {
        $orderDetail = OrderDetail::find($id);
        return view('admin.order_details.edit', compact('orderDetail'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderDetail = OrderDetail::find($id);
        $orderDetail->fill($validatedData);
        $orderDetail->save();

        return redirect()->route('order_details.index');
    }

    public function destroy($id)
    {
        $orderDetail = OrderDetail::find($id);
        $orderDetail->delete();

        return redirect()->route('order_details.index');
    }
}
