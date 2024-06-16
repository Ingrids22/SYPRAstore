<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;

class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // GET
    {
        $images = image::all();
        return view('admin.images.data')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // GET
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // POST
    {
        $image = new image();
        $image->category_id = $request->product_id;
        $image->supplier_id = $request->rute;
        
        $image->save();

        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id) // GET
    {
        $image = image::find($id);
        return view('admin.images.mostrar')->with('image', $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = image::find($id);
        return view('admin.images.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = image::find($id);
        
        $image->category_id = $request->product_id;
        $image->supplier_id = $request->rute;
        
        $image->save();

        return redirect()->route('images.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // GET
    {
        $image = image::find($id);
        $image->delete();

        return redirect()->route('images.index');
    }
}
