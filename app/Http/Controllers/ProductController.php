<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $sections = Section::all();
        return view('products.index', compact('products', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'section_id' => 'required',
        ], [
            'product_name.required' => 'يجب إدخال إسم المنتج',
            'section_id.required' => 'يجب إدخال القسم',

        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->section_id = $request->section_id;
        $product->description = $request->description;
        $product->save();

        session()->flash('Add', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = Section::where('name', $request->section_name)->first()->id;
        $request->validate([
            'product_name' => 'required',
        ], [
            'product_name.required' => 'يجب إدخال إسم المنتج',

        ]);

        $product = Product::find($request->id);
        $product->update([
            'product_name' => $request->product_name,
            'section_id' => $id,
            'description' => $request->description,
        ]);
        $product->save();
        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        session()->flash('delete', 'تم الحذف بنجاح');
        return redirect()->back();
    }

}
