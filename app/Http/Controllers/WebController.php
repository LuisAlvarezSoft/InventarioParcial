<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class WebController extends Controller
{
    public function showAddProductForm()
    {
        $categories = Category::all();
        return view('add_product', compact('categories'));
    }

    public function showProductList(Request $request)
    {
        $categories = Category::all();
        $products = Product::when($request->category_id, function ($query, $categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();

        return view('list_products', compact('products', 'categories'));
    }

    public function showUpdateStockForm()
    {
        $products = Product::all();
        return view('update_stock', compact('products'));
    }

    public function showLowStock()
    {
        $products = Product::where('stock', '<', 10)->get();
        return view('low_stock', compact('products'));
    }
}
