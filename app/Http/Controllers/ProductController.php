<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'     => 'required',
            'product_id'       => 'required|unique:products',
            'price'            => 'required|numeric',
            'previous_price'   => 'nullable|numeric',
            'quantity'         => 'required|integer',
            'alert_quantity'   => 'required|integer',
            'images'           => 'required',
            'images.*'         => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::create($request->except('images'));

        // 🔥 Spatie multiple image upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $product
                    ->addMedia($image)
                    ->toMediaCollection('product_images');
            }
        }

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name'     => 'required',
            'product_id'       => 'required|unique:products,product_id,' . $product->id,
            'price'            => 'required|numeric',
            'previous_price'   => 'nullable|numeric',
            'quantity'         => 'required|integer',
            'alert_quantity'   => 'required|integer',
            'images.*'         => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product->update($request->except('images'));

        // 🔥 Replace images if new ones uploaded
        if ($request->hasFile('images')) {
            $product->clearMediaCollection('product_images');

            foreach ($request->file('images') as $image) {
                $product
                    ->addMedia($image)
                    ->toMediaCollection('product_images');
            }
        }

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
