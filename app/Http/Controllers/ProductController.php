<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET api/products
    public function index(Request $request)
    {
        $query = Product::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Minimum price filter
        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        // Maximum price filter
        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sorting
        // Minimum to Maximum
        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        }
        // Maximum to Minimum
        if ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        return $query->paginate(10);
    }

    // POST api/products
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

    // GET api/products/{id}
    public function show(Product $product)
    {
        return response()->json($product);
    }

    // PUT api/products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string'
        ]);

        $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    // DELETE api/products/{id}
    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json([
            'message' => 'Product deleted success'
        ]);
    }
}
