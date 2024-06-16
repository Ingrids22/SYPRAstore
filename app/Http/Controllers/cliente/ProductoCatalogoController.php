<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;    
use Illuminate\Support\Facades\DB;

class ProductoCatalogoController extends Controller
{
    public function catalogo()
    {
        // $categories = DB::table('categories')->get();
        $categories = Category::all();
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.rute as image_rute')
            ->get();

        return view('cliente.catalogo', ['productos' => $products, 'categories' => $categories]);
    }

    public function detalle($id)
    {
        $categories = DB::table('categories')->get();
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.rute as image_rute')
            ->where('products.id', $id)
            ->first();

        if (!$product) {
            return redirect()->route('catalogo')->with('error', 'Producto no encontrado');
        }

        return view('cliente.detalle', ['product' => $product, 'categories' => $categories]);
    }

    public function filtro_categoria(Request $request)
    {
        $request->validate([
            'categories' => 'required|exists:categories,id'
        ]);

        $categories = DB::table('categories')->get();
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.rute as image_rute')
            ->where('categories.id', $request->categories)
            ->get();

        return view('cliente.catalogo', ['productos' => $products, 'categories' => $categories]);
    }

    public function agregarCarrito($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'categories.name as category_name', 'images.rute as image_rute')
            ->where('products.id', $id)
            ->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_rute
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto añadido al carrito correctamente!');
    }

    public function actualizarCarrito(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Carrito actualizado correctamente');
            }
        }
    }

    public function quitarCarrito(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Producto eliminado correctamente');
            }
        }
    }

    public function mostrarCarrito()
    {
        return view('cliente.carrito.cart');
    }

    public function vaciarCarrito()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Carrito vaciado correctamente!');
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
            ->select('products.*', 'categories.name as category_name', 'images.rute as image_rute')
            ->get();

        return view('cliente.carrito.products', ['products' => $products, 'categories' => $categories]);
    }
}
