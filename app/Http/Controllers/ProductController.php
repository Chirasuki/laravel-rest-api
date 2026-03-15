<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // POST api/products
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->serch . '%');
        }

        return Product::paginate(10);
    }

    // GET api/products
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string'
        ]);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    // GET api/products{id}
    public function show($id)
    {
        // return Product::findOrFail($id);
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
