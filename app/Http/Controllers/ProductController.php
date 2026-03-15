<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // POST api/products
    public function index()
    {
        return Product::all();
    }

    // GET api/products
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    // GET api/products{id}
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    // PUT api/products{id}
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return response()->json($product);
    }

    // DELETE api/products{id}
    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json([
            'message' => 'Product deleted success'
        ]);
    }
}
