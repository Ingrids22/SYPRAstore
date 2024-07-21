<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category'); // Incluir la relación de categorías

        if ($request->has('nombre')) {
            $query->where('name', 'like', '%' . $request->input('nombre') . '%');
        }

        if ($request->has('categories') && $request->input('categories') != '') {
            $query->where('category_id', $request->input('categories'));
        }

        $products = $query->get();
        $categories = Category::all(); // Obtener todas las categorías

        return view('cliente.catalogo', ['productos' => $products, 'categories' => $categories]);
    }

    public function create() // GET
    {
        return view('admin.products.create');
    }

    public function store(Request $request) // POST
    {
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'existence' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'stock_max' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
            'status' => 'required|string|in:activo,inactivo',
            'description' => 'nullable|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|'
        ]);

        $product = new Product();
        $product->fill($validatedData);
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = 'product_' . Str::uuid() . '.' . $image->extension();
                $path = $image->storeAs('images', $imageName, 'public');

                $img = new Image();
                $img->product_id = $product->id;
                $img->route = $path;
                $img->save();
            }
        }

        return redirect()->route('products.index');
    }

    public function show($id) // GET
    {
        $product = Product::with('images')->findOrFail($id);
        return view('admin.products.mostrar')->with('product', $product);
    }


    public function edit($id) // GET
    {
        $product = Product::find($id);
        return view('admin.products.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'existence' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'stock_max' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
            'status' => 'required|string|in:activo,inactivo',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $product->fill($validatedData);
        $product->save();

        if ($request->hasFile('images')) {
            // Eliminar las imágenes existentes si se cargan nuevas
            $oldImages = $product->images;
            foreach ($oldImages as $oldImage) {
                Storage::delete('public/' . $oldImage->route);
                $oldImage->delete();
            }

            // Guardar las nuevas imágenes
            foreach ($request->file('images') as $image) {
                $imageName = 'product_' . Str::uuid() . '.' . $image->extension();
                $path = $image->storeAs('images', $imageName, 'public');

                $img = new Image();
                $img->product_id = $product->id;
                $img->route = $path;
                $img->save();
            }
        }

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id) // DELETE
    {
        $product = Product::find($id);

        // Elimina las imágenes asociadas
        $oldImages = $product->images;
        foreach ($oldImages as $oldImage) {
            Storage::delete('public/' . $oldImage->route);
            $oldImage->delete();
        }

        $product->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request)
{
    $query = $request->input('nombre');
    
    // Buscar productos por nombre
    $productos = Product::where('name', 'like', "%{$query}%")->get();

    return view('cliente.catalogo', compact('productos'));
}

}
