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
    public function __construct()
{
    $this->middleware('auth');
}

    public function showPaymentMethod($orderId)
    {
        $order = Order::find($orderId);
        
        if (!$order) {
            // Manejo de error si el pedido no se encuentra
            return redirect()->back()->with('error', 'Order not found.');
        }
        
        return view('cliente.payment', compact('order'));
    }
    public function index() // Método para mostrar los pedidos
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus pedidos.');
        }
        
        $user = Auth::user();
        $orders = $user->orders; // Suponiendo que la relación entre usuario y pedidos se llama 'orders'
        
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
            'order_date' => 'required|date',
            'status' => 'required|string|in:en_proceso,PAGADO',
        ]);

        $order = new Order();
        $order->fill($validatedData);
        $order->save();

        return redirect()->route('orders.index');
    }

    public function show($id)
    {
        $order = Order::with(['payment', 'customer', 'shipper'])->find($id);
    
        if (!$order) {
            abort(404, 'Order not found');
        }
    
        return view('cliente.order_detail', [
            'order' => $order,
            'shipping_address' => $order->shipper // Asumiendo que tienes la relación y la dirección de envío en shipper
        ]);
    }
    
    

    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|string|in:en_proceso,PAGADO',
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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error');
        }
    
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Usuario no encontrado.');
        }
    
        $customer_id = $user->id;
    
        $orders = Order::where('customer_id', $customer_id)
            ->with(['orderDetails.product', 'customer', 'shipper'])
            ->get();
    
        if ($orders->isEmpty()) {
            return view('cliente.ordenescliente')->with('message', 'No tienes órdenes.');
        }
    
        return view('cliente.ordenescliente', compact('orders'));
    }
    
    
    

    public function crearPedido(Request $request)
    {
        $user = Auth::user();
        $customer_id = $user->id;
    
        // Obtener los productos del request
        $productos = $request->input('productos', []);
    
        // Validar que productos no esté vacío
        if (empty($productos)) {
            return redirect()->back()->with('error', 'No hay productos en el pedido');
        }
    
        DB::beginTransaction();
    
        try {
            $order = new Order();
            $order->customer_id = $customer_id;
            $order->total = array_sum(array_map(function($producto) {
                return $producto['quantity'] * $producto['price'];
            }, $productos));
            $order->order_date = now();
            $order->status = 'en_proceso';
            $order->save();
    
            foreach ($productos as $producto) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
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
    
            // Eliminar productos del carrito en la sesión
            $request->session()->forget('cart');
    
            DB::commit();
    
            return redirect()->route('orders.index')->with('success', 'Pedido creado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
    }
    
    
    
}
