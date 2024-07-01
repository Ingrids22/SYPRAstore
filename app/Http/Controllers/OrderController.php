<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
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

    public function agregarAlCarrito(Request $request)
    {
        $product = Product::find($request->product_id);
        $quantity = $request->quantity;

        // Lógica para agregar al carrito (puede ser almacenado en sesión o base de datos)
        // Aquí utilizamos la sesión como ejemplo
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$product->id])) {
            $carrito[$product->id]['cantidad'] += $quantity;
        } else {
            $carrito[$product->id] = [
                'product_id' => $product->id,
                'nombre' => $product->nombre,
                'precio' => $product->precio,
                'cantidad' => $quantity
            ];
        }

        session()->put('carrito', $carrito);

        return response()->json(['message' => 'Producto agregado al carrito']);
    }

    public function crearPedido(Request $request)
    {
        // Obtener el carrito de la sesión
        $carrito = session('carrito');
    
        // Verificar si el carrito está vacío o no existe
        if (is_null($carrito) || empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }
    
        DB::beginTransaction();
    
        try {
            // Calcular el total del pedido
            $total = array_reduce($carrito, function ($carry, $item) {
                return $carry + ($item['precio'] * $item['cantidad']);
            }, 0);
    
            // Crear el pedido
            $order = Order::create([
                'customer_id' => auth()->id(),
                'total' => $total,
                'fecha_orden' => now(),
                'status' => 'activo'
            ]);
    
            // Crear los detalles del pedido y actualizar el stock de los productos
            foreach ($carrito as $item) {
                $detalle = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'cantidad' => $item['cantidad'],
                    'precio' => $item['precio']
                ]);
    
                $product = Product::find($item['product_id']);
                if ($product->stock < $item['cantidad']) {
                    throw new \Exception('No hay suficiente stock para el producto: ' . $product->nombre);
                }
                $product->stock -= $item['cantidad'];
                $product->save();
            }
    
            DB::commit();
            session()->forget('carrito');
    
            return response()->json(['message' => 'Pedido creado exitosamente', 'order_id' => $order->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error al crear el pedido: ' . $e->getMessage()], 500);
        }
    }
}
