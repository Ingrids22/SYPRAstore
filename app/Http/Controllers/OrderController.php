<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Obtener todas las órdenes del cliente autenticado
        $orders = Order::where('client_id', auth()->id())->get();
        
        // Pasar las órdenes a la vista
        return view('cliente.ordenescliente', compact('orders'));
    }
}
