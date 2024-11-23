<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 製品リストの表示
    public function index()
    {
        $products = Product::all();  // 全製品を取得
        return view('products.index', compact('products'));
    }

    // 検索機能
    public function search(Request $request)
    {
        $query = $request->input('search');
        $products = Product::where('product_number', 'like', '%' . $query . '%')->get();
        return response()->json($products);
    }
}
