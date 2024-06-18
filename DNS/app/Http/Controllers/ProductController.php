<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Подключаем модель Product

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Получаем все товары
        return view('admin', compact('products'));
    }

    public function getProduct(Request $request)
    {
        $articul = $request->articul;
        $product = Product::where('articul', $articul)->first();
        return response()->json($product);
    }

    public function addProduct(Request $request)
    {
        // Логика для добавления товара
        // Пример:
        // $product = new Product();
        // $product->Name = $request->Name;
        // $product->cost = $request->cost;
        // $product->articul = $request->articul;
        // $product->save();
        return response()->json('success');
    }

    public function editProduct(Request $request)
    {
        // Логика для изменения товара
        // Пример:
        // $product = Product::where('articul', $request->articul)->first();
        // $product->Name = $request->Name;
        // $product->cost = $request->cost;
        // $product->save();
        return response()->json('success');
    }

    public function deleteProduct(Request $request)
    {
        // Логика для удаления товара
        // Пример:
        // Product::where('articul', $request->articul)->delete();
        return response()->json('success');
    }
}
