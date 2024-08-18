<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome', [
            'products'=> Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());

        Session::flash('success', 'Product added successfully');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('prodcuts', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */

    public function trash($id)
    {
        Product::Destroy($id);
        Session::Flash('success', 'Product trashed successfully');
        return redirect() -> route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::WithTrashed()->where('id',$id)->first();
        $product = forceDelete();
        Session::Flash('success', 'Product deleted successfully');
        return redirect()->route('products.trashed');
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->where('id',$id)->first();
        $product -> restore();
        Session::Flash('success','Product restored successfully');
        return redirect()->route('products.trashed');
    }
}
