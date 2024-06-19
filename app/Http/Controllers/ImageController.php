<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('admin.images.data')->with('images', $images);
    }

    public function create()
    {
        return view('admin.images.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'route' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajustar las reglas según tu necesidad
        ]);

        $image = new Image();
        $image->product_id = $validatedData['product_id'];

        if ($request->hasFile('route')) {
            $imageName = 'product_' . Str::uuid() . '.' . $request->file('route')->extension();
            $path = $request->file('route')->storeAs('images', $imageName, 'public');
            $image->route = $path;
        }

        $image->save();

        return redirect()->route('images.index');
    }

    public function show($id)
    {
        $image = Image::find($id);
        return view('admin.images.mostrar')->with('image', $image);
    }

    public function edit($id)
    {
        $image = Image::find($id);
        return view('admin.images.edit')->with('image', $image);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'route' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajustar las reglas según tu necesidad
        ]);

        $image = Image::find($id);
        $image->product_id = $validatedData['product_id'];

        if ($request->hasFile('route')) {
            Storage::delete('public/' . $image->route);

            $imageName = 'product_' . Str::uuid() . '.' . $request->file('route')->extension();
            $path = $request->file('route')->storeAs('images', $imageName, 'public');
            $image->route = $path;
        }

        $image->save();

        return redirect()->route('images.index');
    }

    public function destroy($id)
    {
        $image = Image::find($id);

        if ($image) {
            Storage::delete('public/' . $image->route);
            $image->delete();
        }

        return redirect()->route('images.index');
    }
}
