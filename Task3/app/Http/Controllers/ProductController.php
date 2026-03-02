<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getAll();

        return view("products.index", ["products" => $products]);
    }

    public function available()
    {
        $available = Product::getAvailable();

        return view("products.index", ["products" => $available]);
    }

    public function create()
    {
        return view("products.create");
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        $product = [
            "name" => $validatedData['name'],
            "price" => $validatedData['price'],
            "is_available" => true
        ];

        Product::addItem($product);

        return redirect()->route('products.index')
            ->with('success', "Item {$validatedData['name']} with price of {$validatedData['price']} was added");
    }

    public function show($id)
    {
        $product = Product::findById($id);

        if (!$product) {
            abort(404, "Product not found");
        }

        return view("products.show", ["product" => $product]);
    }

    public function search(Request $request)
    {
        $name = $request->query("name");
        $product = Product::findByName($name);

        $products = $product ? [$product] : [];

        return view("products.index", ["products" => $products]);
    }

    public function destroy($id)
    {
        Product::deleteById($id);

        return redirect()->route('products.index')
            ->with('success', "Item was deleted");
    }
}
