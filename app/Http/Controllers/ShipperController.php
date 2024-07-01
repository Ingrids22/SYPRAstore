<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShipperController extends Controller
{
    public function index() // GET
    {
        $shippers = Shipper::all();
        return view('admin.shippers.data')->with('shippers', $shippers);
    }

    public function create() // GET
    {
        return view('admin.shippers.create');
    }

    public function store(Request $request) // POST
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'tracking_number' => 'required|string|max:11',
            'phone' => 'required|string|regex:/^\d{10,20}$/',
            'parcel' => 'required|string|max:255',
            'shipping_date' => 'required|date',
            'arrival_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $shipper = new Shipper();
        $shipper->fill($validatedData);

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $imageName = 'shipper_' . time() . '.' . $extension;
            $path = $request->image->storeAs('images', $imageName, 'public');
            $shipper->image = $path;
        }

        $shipper->save();

        return redirect()->route('shippers.index');
    }

    public function show($id) // GET
    {
        $shipper = Shipper::find($id);
        return view('admin.shippers.show')->with('shipper', $shipper);
    }

    public function edit($id) // GET
    {
        $shipper = Shipper::find($id);
        return view('admin.shippers.edit')->with('shipper', $shipper);
    }

    public function update(Request $request, $id) // PUT/PATCH
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'tracking_number' => 'required|string|max:11',
            'phone' => 'required|string|regex:/^\d{10,20}$/',
            'parcel' => 'required|string|max:255',
            'shipping_date' => 'required|date',
            'arrival_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $shipper = Shipper::find($id);
        $shipper->fill($validatedData);

        if ($request->hasFile('image')) {
            if ($shipper->image) {
                Storage::delete('public/' . $shipper->image);
            }

            $extension = $request->image->extension();
            $imageName = 'shipper_' . time() . '.' . $extension;
            $path = $request->image->storeAs('images', $imageName, 'public');
            $shipper->image = $path;
        }

        $shipper->save();

        return redirect()->route('shippers.index');
    }

    public function destroy($id) // DELETE
    {
        $shipper = Shipper::find($id);

        if ($shipper->image) {
            Storage::delete('public/' . $shipper->image);
        }

        $shipper->delete();

        return redirect()->route('shippers.index');
    }
}
