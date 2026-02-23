<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products = Product::getAll();

        return view("products.index", ["products" => $products]);
    }

    public function availableProducts()
    {
        $available = Product::getAvailable();

        return view("products.index", ["products" => $available]);
    }

    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|gt:0',
        ], [
            'name.required' => 'Поле "Назва товару" не може бути порожньою.',
            'price.required' => 'Поле "Ціна" є обов\'язковим.',
            'price.numeric' => 'Ціна має бути числовим значенням.',
            'price.gt' => 'Ціна повинна бути більшою за нуль.',
        ]);

        $product = [
            "name" => $validatedData['name'],
            "price" => $validatedData['price'],
            "is_available" => true
        ];

        Product::addItem($product);

        return "Item " . $validatedData['name'] . " with price of " . $validatedData['price'] . " was added";
    }

    public function findByName(Request $request)
    {
        $name = $request->input("name");

        if (!$name) $product = Product::getAll()[0];
        else $product = Product::findByName($name);

        if (!$product) abort(404, "Product not found");

        return view("products.show", ["product" => $product]);
    }

    public function deleteByName($name)
    {
        Product::deleteByName($name);

        return "Item " . $name . " was deleted";
    }

    public function showForm()
    {
        return view("products.create");
    }
}
