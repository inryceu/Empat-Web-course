<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return response()->json([
            'message' => 'Added product',
            'data' => $product
        ], 201);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return response()->json([
            'message' => 'Updated product',
            'data' => $product
        ], 200);
    }
}
