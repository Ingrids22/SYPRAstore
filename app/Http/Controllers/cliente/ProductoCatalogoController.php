<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoCatalogoController extends Controller
{
    public function catalogo()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.route as image_route')
            ->get();

        return view('cliente.catalogo', ['productos' => $products, 'categories' => $categories]);
    }

    public function detalle($id)
    {
        $categories = DB::table('categories')->get();
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.route as image_route')
            ->where('products.id', $id)
            ->first();

        return view('cliente.detalle', ['product' => $product, 'categories' => $categories]);
    }

    public function filtro_categoria(Request $request)
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.route as image_route')
            ->where('categories.id', $request->categories)
            ->get();

        return view('cliente.catalogo', ['productos' => $products, 'categories' => $categories]);
    }

    public function agregarCarrito($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.route as image_route')
            ->where('products.id', $id)
            ->first();

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_route
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function actualizarCarrito(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function quitarCarrito(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function mostrarCarrito()
    {
        return view('cliente.carrito.cart');
    }

    public function vaciarCarrito()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart emptied successfully!');
    }

    public function procesopedido(Request $request){
        if (ProductoCatalogoController::getContent()->count() > 0) {
            // procesamiento
        } else {
            // redirect
            return redirect('/pagar_carrito');
        }
    }
    
    public function pagarCarrito()
    {
        // Implementar lógica de pago
    }

    public function products()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.route as image_route')
            ->get();

        return view('cliente.carrito.products', ['products' => $products, 'categories' => $categories]);
    }
}
